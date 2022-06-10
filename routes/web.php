<?php

use App\Http\Controllers\ControladorLogin;
use App\Http\Middleware\AuthBasicMiddle;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\LoginFormNoAccessIfAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


Route::prefix('/chat')->group(__DIR__.'\rutasChat\rutasChat.php');

Route::get('/', function () {
    return view('login');
})->middleware(LoginFormNoAccessIfAuth::class)
    ->name('login-form');

Route::post('/login', [ControladorLogin::class, 'authenticate'])->name('login.auth');

Route::get('/panel-principal', function () {
    Log::info(Auth::check());
    return view('logueado');
})->middleware(AuthBasicMiddle::class)
    ->name('panel-principal');

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login-form');
})->middleware(AuthBasicMiddle::class)
    ->name('close-session');
