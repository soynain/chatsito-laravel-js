<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ControladorLogin extends Controller
{
    public function authenticate(Request $request)
    {
        //  print_r($request->getContent('us_vbl')." cuerpo del request");
        $credentials = $request->validate([
            'us_vbl' => ['required'],
            'pss_vbl' => ['required'],
        ]);
        $credencialesBdd = DB::select('select * from alta_producto where usuario=? and contra=?', [$credentials['us_vbl'], $credentials['pss_vbl']]);
        //   print_r($credentials);
        if (count($credencialesBdd) > 0) {
            $request->session()->regenerate();
            return $request->session()->all();
        }else{
            return 'no sale la consulta';
        }

        /*  if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return 'sesion correcta';
        }*/

        /*  return back()->withErrors([
            'us_vbl' => 'The provided credentials do not match our records.',
        ])->onlyInput('us_vbl');*/
    }
}
