<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ActivarStatusConexion implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $usuario;
 
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*Consultamos el nombre de usuario propio del usuario
        que se une al canal, no hacen falta parametros, creo este bloque tambien es inecesario*/
        $this->usuario=DB::select('select * from usuarioscredenciales where usuario=?',[Auth::user()->usuario]);
   //     Log::info(json_encode($this->usuario[0]->usuario)." añeñe");
    }
    

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        /*aqui solo se declara el nombre del canal porque al no pasar
        un id real de un socket que en si es global, no se valida
        y por lo tanto el id que pasamos solo es de identificacion,
        y con el authorizer retornamos el nombre de usuario a laravel echo*/
        return new PresenceChannel('tablon');
    }

  /*  public function broadcastWith(){
        return ['usuario'=>$this->usuario[0]->usuario];
    }*/

    
 /*   public function broadcastAs(){
        return 'server.created';
    }*/
}
