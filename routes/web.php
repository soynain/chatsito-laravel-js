<?php

use App\Http\Controllers\ControladorLogin;
use App\Http\Middleware\AuthBasicMiddle;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


//Route::prefix('/chat')->group(__DIR__.'/routes/chatroutes/chatroutes.php');

Route::get('/', function () {
    return view('login');
})->name('login-form');

Route::post('/login', [ControladorLogin::class,'authenticate'])->name('login.auth');

Route::get('/logueado',function(){
    Log::info(Auth::check());
    return view('logueado');
})->middleware(AuthBasicMiddle::class);

Route::get('/logout',function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login-form');
})->middleware(AuthBasicMiddle::class)->name('close-session');
