<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Prophecy\Util\StringUtil;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

/*Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});*/
Broadcast::channel('tablon.{id}', function ($user,$usuario) {
    $nombreamigo=Auth::user()->usuario;
    /*al unirse, el broadcast encola la variable en laravel echo con los
    demas usuarios*/
    return $nombreamigo;
});

