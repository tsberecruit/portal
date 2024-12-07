<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
    //    if($request->user()->role !== $role){
    //       if($request->user()->role === 'company') {
    //           return redirect()->route('company.dashboard');
    //       }elseif($request->user()->role === 'candidate') {
    //           return redirect()->route('candidate.dashboard');
    //       }
    //    }
    if (!Auth::check() || $request->user()->role !== $role) {
        // Redirect to appropriate dashboard based on role (if authenticated)
        if (Auth::check()) {
            if ($request->user()->role === 'company') {
                return redirect()->route('company.dashboard');
            } else if ($request->user()->role === 'candidate') {
                return redirect()->route('candidate.dashboard');
            }
        }

        // Unauthenticated user, redirect to login
        return redirect()->route('login');
    }
        return $next($request);
    }
}
