<?php

use App\Events\ActivarStatusConexion;
use App\Events\ChatSupervisor;
use App\Http\Controllers\MessageSenderController;
use App\Http\Controllers\OpenChatController;
use App\Http\Controllers\QuerysPanelPrincipalController;
use App\Http\Middleware\AuthBasicMiddle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/panel-principal', [QuerysPanelPrincipalController::class, 'consultasPanelPrincipal'])
    ->middleware(AuthBasicMiddle::class)
    ->name('panel-principal');

Route::get('/chat/{destinatario}', [OpenChatController::class, 'OpenChatHistory'])
    ->middleware(AuthBasicMiddle::class);

Route::post('/send-message', [MessageSenderController::class, 'SendMessage'])
    ->middleware(AuthBasicMiddle::class);

Route::get('/profile/{usuario}',function($usuario){
    $datosusuario=DB::select('SELECT datos.nombres,datos.apellidoPaterno,datos.apellidoMaterno,
    datos.fechaNac,datos.estadoCivil
    FROM usuarioscredenciales INNER JOIN usuarios as datos
    ON datos.idUsuario=usuarioscredenciales.id 
    WHERE usuarioscredenciales.usuario=?',[$usuario]);
    return view('perfil-usuario')->with(array('datosusuario'=>$datosusuario));
})->middleware(AuthBasicMiddle::class);
