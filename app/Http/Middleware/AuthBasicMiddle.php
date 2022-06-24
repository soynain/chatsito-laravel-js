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

        /*otra cosa importante, si ejecutas el server, y no cierras la sesión
        de alguna manera la sesión queda persistida en memoria, debes cerrarla*/
        if(Auth::check()){
       //     Log::info('caray el panel funciona');
            return $next($request);
        }else if(!Auth::check()){
       //     Log::info('chale no estoy autenticado, no puedo acceder al panel');
            return redirect()->route('login-form');
        }
    }
}
