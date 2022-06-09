<?php

use App\Http\Controllers\ControladorLogin;
use App\Http\Middleware\AuthBasicMiddle;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Route::prefix('/chat')->group(__DIR__.'/routes/chatroutes/chatroutes.php');

Route::get('/', function () {
    return view('login');
})->name('login-form');

Route::post('/login', [ControladorLogin::class,'authenticate'])->name('login.auth');

Route::get('/logueado',function(){
    return view('logueado');
})->middleware(AuthBasicMiddle::class);
