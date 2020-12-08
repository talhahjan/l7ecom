<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        switch (Auth::user()->role->name) {
            case 'customer':
                return redirect('home');
                break;
            default:
                return $next($request);
                break;
        }
    }
}
