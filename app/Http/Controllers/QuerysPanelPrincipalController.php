<?php

namespace App\Http\Controllers;

use App\Events\ActivarStatusConexion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class QuerysPanelPrincipalController extends Controller
{
    public function consultasPanelPrincipal(){
        $usuario=Auth::user()->usuario;
        /*Consulta para obtener los amigos de una persona, de acuerdo a mi base de datos
        una persona puede recibir o mandar solicitudes de amistad (limitaciones de una
        BDD relacional jaja), entonces hago dos consultas con los amigos que me mandaron solicitud
        y los amigos a quienes yo mande solicitud y los uno con una UNION*/
        $contactoschatvar = DB::select('SELECT usuarioamigo.usuario AS amigosAQuienesMandeSoli FROM usuarios AS usuarioPropio INNER JOIN 
        usuarioscredenciales AS credencialesext ON usuarioPropio.idUsuario=credencialesext.id
        INNER JOIN usuariossolicitudesamistad AS amigosHechos ON usuarioPropio.idUsuario=amigosHechos.fkIdUsuario
        INNER JOIN usuarioscredenciales as usuarioamigo on amigosHechos.Usuarios_idUsuario=usuarioamigo.id
        WHERE credencialesext.usuario=? AND amigosHechos.estatus=?
        UNION
        SELECT usuarioamigo.usuario AS amigosQueMeMandaronSoli FROM usuarios 
        AS usuarioPropio INNER JOIN usuarioscredenciales AS credencialesext ON usuarioPropio.idUsuario=credencialesext.id
        INNER JOIN
        usuariossolicitudesamistad AS amigosSolicitantes ON usuarioPropio.idUsuario=amigosSolicitantes.Usuarios_idUsuario
        INNER JOIN 
        usuarioscredenciales AS usuarioamigo ON amigosSolicitantes.fkIdUsuario=usuarioamigo.id
        WHERE credencialesext.usuario=? AND amigosSolicitantes.estatus=?;', [$usuario, 'ACEPTADO', $usuario, 'ACEPTADO']);
        return view('panel-principal')->with(array('contactoschatvar'=>$contactoschatvar));
    }
}
