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
        /*Me doy cuenta de que esta consulta es inutil porque es por parametro,
        no quiero moverle aqui por ahora, pero pienso ahorita que domino mas esto
        que en channels.php el authorizer no pasa ningun parametro a este contructor
        y solo se trigerea con el ajax*/
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
        /*En este caso al tener que crear varias salas bidireccionalespor cada amigos que tenemos,
        debemos crearlos basandonos en el ID de la conversacion, el método nos lo dice:
        "quiero que transmitas en el canal ChatListener en la 'frecuencia' {idSalaChat}"*/
        return new PrivateChannel('ChatListener.'.$this->salachatid[0]->idConversaciones);
    }
    public function broadcastWith()
    {
        /*Aquí podemos usar este método para enviar al destinatario con ajax
        el mensaje a su chat en tiempo real*/
        return ['mensaje' => $this->mensajeParaDestinatario];
    }
}
