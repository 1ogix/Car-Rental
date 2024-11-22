<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated and their role matches
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        // Abort with a 403 Unauthorized error if roles do not match
        abort(403, 'Unauthorized access.');
    }
}
