<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Check if user has student role
        if (auth()->user()->role !== 'student') {
            abort(403, 'Unauthorized access.'); // Return 403 Forbidden
        }

        return $next($request);
    }
}