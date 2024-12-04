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
        // Vérifie si l'utilisateur est authentifié et a un rôle "admin"
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Autorise la requête
        }

        // Sinon, redirige vers une page d'erreur ou une autre route
        return redirect('/')->with('error', 'Access denied.');
    
    }
}
