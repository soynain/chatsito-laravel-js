<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthBasicMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     /**/
    public function handle(Request $request, Closure $next)
    {
        /*si lo cambias al else default, por alguna razon mágica no funciona jajaja*/ 
        if(!Auth::check()){
            return redirect()->route('login-form');
        }else if(Auth::check()){
            return $next($request);
        }
    }
}
