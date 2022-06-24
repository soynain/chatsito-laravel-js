<?php

namespace App\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


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
        /*Aqui se pasa por parametro la sala id del chat entre dos contactos
        y el mensaje a transmitir*/
        $this->salachatid = $salachatid;
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
        return new PrivateChannel('ChatListener.'.$this->salachatid);
    }
    public function broadcastWith()
    {
        /*Aquí podemos usar este método para enviar al destinatario con ajax
        el mensaje a su chat en tiempo real*/
        return ['mensaje' => $this->mensajeParaDestinatario];
    }
}
