<?php

namespace App\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class ActivarStatusConexion implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $usuario;
 
    /**
     * Create a new event instance.
     *
     * @return void
     */
   
    

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
