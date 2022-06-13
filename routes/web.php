<?php

use App\Http\Controllers\ControladorLogin;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\WSocketHandlerController;
use App\Http\Middleware\AuthBasicMiddle;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\LoginFormNoAccessIfAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;

Route::prefix('/v1')->group(__DIR__ . '\rutasChat\rutasChat.php');

Route::get('/', function () {return view('login');})->middleware(LoginFormNoAccessIfAuth::class)->name('login-form');

Route::post('/login', [ControladorLogin::class, 'authenticate'])->name('login.auth');
Route::get('/logout', [LogoutController::class, 'closeSession'])->middleware(AuthBasicMiddle::class)->name('close-session');
WebSocketsRouter::webSocket('/my-websocket', WSocketHandlerController::class);