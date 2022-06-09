<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class ControladorLogin extends Controller
{
    public function authenticate(Request $request)
    {
        //  print_r($request->getContent('us_vbl')." cuerpo del request");
        $credentials = $request->validate([
            'usuario' => ['required'],
            'contra' => ['required'],
        ]);
        Log::info($credentials);
        Log::info(Auth::check());
        /*        $credencialesBdd = DB::select('select * from alta_producto where usuario=? and contra=?', [$credentials['us_vbl'], $credentials['pss_vbl']]);

        /*por como entiendo, al usar auth, una columna de tu bdd forzosamente
        debe llamarse "password", y no solo eso, al tratar de hacer
        attempt, si o si el apartado de contraseña debe estar hasheado
        con bcrypt, si no aun asi este bien, te redirigiria al index.*/
        if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->contra])) {

            //  Log::info("antes de iniciar sesión: ". $request->session()->all());
            $request->session()->regenerate();
            //  Log::info("Despues de iniciar sesión ". $request->session()->all());
            return  redirect()->intended('logueado');
        } else {
            return back()->withErrors(['contra'=>'Revise que sus credenciales estén correctas'])->onlyInput('contra');
        }

    }
}
