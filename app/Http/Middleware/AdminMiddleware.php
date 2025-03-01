<?php

namespace App\Http\Middleware;

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

        // Check if the user is not logged in.
        if (!auth()->check()) {
            return redirect('/login')->with('message', 'Login to access the website info');
        }

        // Check if the logged-in user is not an admin.
        if (auth()->user()->user_type == 'user') {
            abort(404);
        }
        if (auth()->user()->user_type == 'admin') {
            return $next($request);
        }



    }
}
