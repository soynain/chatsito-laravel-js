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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ChatSupervisor implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $salachatid,$mensajeParaDestinatario;
    /**
     * Create a new event instance.
     *
     * @return void
     */
   public function __construct($salachatid,$mensajeParaDestinatario)
    {
        $this->salachatid = DB::select('select idConversaciones from 
        amigosconversaciones where idConversaciones=?;', [$salachatid]);
        $this->mensajeParaDestinatario=$mensajeParaDestinatario;
   //     Log::info(json_encode($this->salachatid[0]->idConversaciones).'nanana');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('ChatListener.'.$this->salachatid[0]->idConversaciones);
    }
    public function broadcastWith()
    {
        return ['mensaje' => $this->mensajeParaDestinatario];
    }
}
