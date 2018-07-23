<?php

namespace App\Http\Middleware;

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
//        if (Auth::guard($guard)->check()) {
//            return redirect('/home');
//        }
//        dd(Auth::guard($guard)->check());
        if (Auth::guard($guard)->check()) {

            session()->flash('success','你已成功登录，无需再次登录');
            return redirect(url()->previous());
        }
        return $next($request);
    }
}
