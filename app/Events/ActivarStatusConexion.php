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
        
        $this->usuario=DB::select('select * from usuarioscredenciales where usuario=?',[Auth::user()->usuario]);
        Log::info(json_encode($this->usuario[0]->usuario)." añeñe");
    }
    

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('tablon');
    }

  /*  public function broadcastWith(){
        return ['usuario'=>$this->usuario[0]->usuario];
    }*/

    
 /*   public function broadcastAs(){
        return 'server.created';
    }*/
}
