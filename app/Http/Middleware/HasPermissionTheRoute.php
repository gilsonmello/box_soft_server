<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class HasPermissionTheRoute
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
        if(Auth::user()) {
            Cookie::queue("user_name", Auth::user()->name);
            Cookie::queue("user_email", Auth::user()->email);
        }

        if(Auth::guest()) {
            return redirect()->route('mobile.auth.index');
        }
        return $next($request);
    }
}
