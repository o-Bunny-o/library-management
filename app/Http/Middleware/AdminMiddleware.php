<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in and has an admin role
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Allow the request to proceed
            return $next($request);
        }

        // Redirect non-admins to the home page with an error
        return redirect('/')->with('error', 'Unauthorized access');
    }
}
