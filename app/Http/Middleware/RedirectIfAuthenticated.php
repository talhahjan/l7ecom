<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
     
        if (Auth::guard($guard)->check()) {
            switch (Auth::user()->role->name) {
                case 'admin':
                case 'superadmin':
                    return redirect(RouteServiceProvider::Dashboard);
                    break;
                default:
                    return redirect(RouteServiceProvider::HOME);
                    break;
            }
        }
        return $next($request);
    }
}
