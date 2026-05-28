<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware: AdminAuthenticate
 *
 * Verifies that the user has an active admin/superadmin session.
 * Otherwise redirects to the login screen with an feedback error.
 */
class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('admin_user')) {
            return redirect('/agent/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses portal.');
        }

        return $next($request);
    }
}
