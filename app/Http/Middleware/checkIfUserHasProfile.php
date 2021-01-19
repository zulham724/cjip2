<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkIfUserHasProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(!Auth::guard('investor')->check()){
            return abort(404);
        }
        // if(Auth::guard('investor')->check() && Auth::guard('investor')->user()->load('profile')->profile == null){
        //     return redirect("/panel-investor#/");
        // }
        return $next($request);
    }
}
