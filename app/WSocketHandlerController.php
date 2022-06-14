<?php

namespace App;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WSocketHandlerController implements MessageComponentInterface
{
    protected $clients;
    private $subscriptions;
    private $users;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->subscriptions = [];
        $this->users = [];
    }
    public function onOpen(ConnectionInterface $connection)
    {
        /*Solución que encontré en github para persistir una conexión
        y leer los mensajes recibidos del frontend*/
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));
        $connection->socketId = $socketId;
        $connection->app = new \stdClass();
        $connection->app->id = 'my_app';
        $this->clients->attach($connection);
    }
    
    public function onClose(ConnectionInterface $connection)
    {
        // TODO: Implement onClose() method.
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        /* se realiza una consulta sql y esta es enviada al front
        y por medio del array de conexiones, podemos buscar
        varios o un usuario en particular*/
        $consulta=DB::select('select * from usuarios;');
       // Log::info($consulta);
        $numRecv = count($this->clients);
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $connection->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($connection !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send(json_encode($consulta));
            }
        }

    }
}
