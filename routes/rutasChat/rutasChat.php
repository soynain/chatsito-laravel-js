<?php

use App\Http\Controllers\ControladorLogin;
use App\Http\Middleware\AuthBasicMiddle;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\LoginFormNoAccessIfAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


//Route::prefix('/chat')->group(__DIR__.'/routes/chatroutes/chatroutes.php');

Route::get('/home', function () {
    return view('pruebaRutaFolder');
})->middleware(AuthBasicMiddle::class)
    ->name('ruta-prueba');
