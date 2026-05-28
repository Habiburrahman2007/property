<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware: SanitizeStringInputs
 *
 * Strips HTML tags and trims whitespace from all string inputs
 * to prevent XSS injection via user-submitted data.
 *
 * SQL injection is already prevented by Laravel's Eloquent
 * parameterized queries. This middleware handles the XSS vector.
 *
 * Fields explicitly excluded from sanitization:
 *   - password, password_confirmation (must not be modified)
 *   - _token (CSRF token, structural integrity required)
 *   - maps_link (URL, angle brackets have no meaning here but
 *     strip_tags is still safe for URLs)
 */
class SanitizeStringInputs
{
    /**
     * Input keys that must NOT be sanitized.
     */
    protected array $except = [
        'password',
        'password_confirmation',
        '_token',
        '_method',
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $input = $request->all();

        array_walk_recursive($input, function (&$value, $key) {
            // Skip protected fields and non-string values
            if (in_array($key, $this->except) || ! is_string($value)) {
                return;
            }

            // Strip HTML tags to neutralize XSS payloads, then trim whitespace
            $value = trim(strip_tags($value));
        });

        $request->merge($input);

        return $next($request);
    }
}
