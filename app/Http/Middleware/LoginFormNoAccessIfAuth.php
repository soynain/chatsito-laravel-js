<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class LoginFormNoAccessIfAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     /*Middleware para proteger el formulario de login, asi el
     usuario no puede iniciar sesión dos veces desde la misma computadora*/
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
        //    Log::info('yeah no me dejes entrar al login estando autenticado');
            return redirect()->route('panel-principal');
        }else if(!Auth::check()){
      //      Log::info('dali es un pendejo');
            return $next($request);
        }
    }
}
