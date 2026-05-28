<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware: ForceHttpsInProduction
 *
 * Enforces HTTPS-only access when APP_ENV=production.
 * Redirects any plain HTTP request to its HTTPS equivalent
 * with a 301 permanent redirect. This satisfies the security
 * requirement: "HTTPS-only di production, secure cookie flag aktif."
 */
class ForceHttpsInProduction
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (app()->isProduction() && ! $request->isSecure()) {
            return redirect()->secure($request->getRequestUri(), 301);
        }

        return $next($request);
    }
}
