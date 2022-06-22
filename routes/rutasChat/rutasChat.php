<?php

use App\Events\ActivarStatusConexion;
use App\Events\ChatSupervisor;
use App\Http\Controllers\QuerysPanelPrincipalController;
use App\Http\Middleware\AuthBasicMiddle;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Route::get('/panel-principal', [QuerysPanelPrincipalController::class, 'consultasPanelPrincipal'])
    ->middleware(AuthBasicMiddle::class)
    ->name('panel-principal');

Route::get('/chat/{destinatario}', function ($destinatario) {
    Log::info($destinatario);
    if ($destinatario !== null) {
        $remitente = Auth::user()->usuario;
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
        ORDER BY mensajes.fechaHoraEnvio ASC;', [$remitente, $destinatario,$destinatario,$remitente]);
    }
    return view('chat-window')->with(array('mensajesdetalleslista' => $listamensajes));
})->middleware(AuthBasicMiddle::class);

Route::post('/consulta-conectados', function () {
    Log::info('faraon love shady');
    ChatSupervisor::dispatch();
    return response()->json(['response' => 'ok'], 200);
})->middleware(AuthBasicMiddle::class);
