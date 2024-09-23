<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in and if they are an admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // If not an admin, redirect to a forbidden page or another route
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
