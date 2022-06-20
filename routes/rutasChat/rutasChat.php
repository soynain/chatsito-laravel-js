<?php

use App\Events\ActivarStatusConexion;
use App\Http\Controllers\QuerysPanelPrincipalController;
use App\Http\Middleware\AuthBasicMiddle;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;




Route::get('/panel-principal', [QuerysPanelPrincipalController::class, 'consultasPanelPrincipal'])
    ->middleware(AuthBasicMiddle::class)
    ->name('panel-principal');

Route::post('/consulta-conectados',function(){
    Log::info('faraon love shady');
    ActivarStatusConexion::dispatch();
    return response()->json(['response'=>'ok'],200);
})->middleware(AuthBasicMiddle::class);
