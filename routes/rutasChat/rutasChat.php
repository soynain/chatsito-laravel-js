<?php

use App\Http\Controllers\QuerysPanelPrincipalController;
use App\Http\Middleware\AuthBasicMiddle;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



Route::get('/panel-principal', [QuerysPanelPrincipalController::class, 'consultasPanelPrincipal'])
    ->middleware(AuthBasicMiddle::class)
    ->name('panel-principal');
