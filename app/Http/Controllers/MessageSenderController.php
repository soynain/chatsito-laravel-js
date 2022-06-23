<?php

namespace App\Http\Controllers;

use App\Events\ChatSupervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageSenderController extends Controller
{
    public function SendMessage(Request $request)
    {
        //   $time_start = microtime(true);
        $ajaxBody = json_decode($request->getContent());
        $idDestinatario = DB::select('select distinct(fkIdDestinatario) as idDestinatario from historialmensajesamigos 
        where fkIdDestinatario!=? and fkConversacionSala=? limit 1;', [$request->idRemitente, $request->idConversaciones]);
        /*Si pruebas a imprimir la primera consola. verás que la forma en que extrar la consulta fue rara,
        ponia un objeto en el index 0 y era inaccesible segun yo, entonces lo paso a json la posición 0
        que albergaba un objeto y después lo decoficaba a arreglo para convertirlo
        en objeto stdClass y acceder a la propiedad idDestinatario*/
        $idDestinatarioDecodificado = json_decode(json_encode($idDestinatario[0]))->idDestinatario;
        DB::insert(
            'INSERT INTO historialmensajesamigos VALUES (null,?,now(),?,?,?)',
            [$ajaxBody->mensaje, $ajaxBody->idConversaciones, $ajaxBody->idRemitente, $idDestinatarioDecodificado]
        );
        $lastId = DB::getPdo()->lastInsertId();
        //  ChatSupervisor::dispatch($ajaxBody->idConversaciones,$ajaxBody->mensajeParaDestinatario);
        broadcast(new ChatSupervisor($ajaxBody->idConversaciones,$ajaxBody->mensaje))->toOthers();
        /*  $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);
        Log::info(json_encode($lastId));
        Log::info('tiempo de insercion: ' . json_encode($execution_time));*/
        return response()->json(['response' => 'ok'], 200);
    }
}
