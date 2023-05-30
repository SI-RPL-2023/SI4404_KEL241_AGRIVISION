<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            // if user is not logged in, redirect to login page
            return redirect('/login');
        }

        $user = Auth::user();

        // check if user has one of the required roles

            if ($user->role == 'admin') {
                return $next($request);
            }


        // if user does not have any of the required roles, redirect to home page
        return redirect('/');
    }

}
