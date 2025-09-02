<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && $request->routeIs('login')) {
            return redirect()->route('admin.dashboard');
        }

        if (!Auth::check() && $request->routeIs('admin.dashboard')) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
