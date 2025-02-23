<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
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
       
    //    dd(session()->all(), 321, Auth::check(), $request->all());
         // Check if the user is authenticated and an admin
         if (Auth::check() && Auth::user()->is_admin) {
            
            return $next($request);
        }

        // Redirect to a different page if not an admin
        return redirect('/')->with('error', 'You do not have admin access.');
        // return $next($request);
    }
}

