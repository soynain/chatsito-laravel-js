<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OpenChatController extends Controller
{
    public function OpenChatHistory($destinatario)
    {
        //Log::info($destinatario);
        if ($destinatario !== null) {
            $remitente = Auth::user()->usuario;
            /*Consulta para extraer el nombre de usuario del remitente y destinatario, asi
            como sus id's y mensajes, lo hice asi porque te ahorras el tener que almacenar
            constantemente el nombre de usuario varias veces por fila, entonces solo almacenas
            el foreign key que es un entero de tamaño menor a un char*/
            $listamensajes = DB::select('SELECT usuarioremitente.usuario AS remitente,
            usuariodestinatario.usuario AS destinatario,mensajes.mensaje,mensajes.fechaHoraEnvio,
            amigosconversaciones.idConversaciones,usuarioremitente.id AS idRemitente,
            usuariodestinatario.id AS idDestinatario FROM usuarios 
            INNER JOIN usuariossolicitudesamistad ON usuariossolicitudesamistad.fkIdUsuario=usuarios.idUsuario
            INNER JOIN amigosconversaciones ON usuariossolicitudesamistad.idSolicitud=amigosconversaciones.fkIdSolicitud
            INNER JOIN historialmensajesamigos AS mensajes
            ON mensajes.fkConversacionSala=amigosconversaciones.idConversaciones
            INNER JOIN usuarios AS remitente ON remitente.idUsuario=mensajes.fkIdRemitente
            INNER JOIN usuarios AS destinatario ON destinatario.idUsuario=mensajes.fkIdDestinatario
            INNER JOIN usuarioscredenciales AS usuarioremitente ON usuarioremitente.id=remitente.idUsuario
            INNER JOIN usuarioscredenciales AS usuariodestinatario ON usuariodestinatario.id=destinatario.idUsuario
            WHERE usuarioremitente.usuario=? AND usuariodestinatario.usuario=?
            OR usuarioremitente.usuario=? AND usuariodestinatario.usuario=?
            ORDER BY mensajes.fechaHoraEnvio ASC;', [$remitente, $destinatario, $destinatario, $remitente]);
            return view('chat-window')->with(array('mensajesdetalleslista' => $listamensajes));
        } else {
            return redirect()->intended('v1/panel-principal');
        }
    }
}
