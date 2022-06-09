<?php

use App\Http\Controllers\ControladorLogin;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Route::prefix('/chat')->group(__DIR__.'/routes/chatroutes/chatroutes.php');

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [ControladorLogin::class,'authenticate'])->name('login.auth');
