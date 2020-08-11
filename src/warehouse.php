<?php
namespace inventario;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class warehouse implements MessageComponentInterface {

    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) 
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "Nueva conexión! ID: ({$conn->resourceId}), "." Con IP: {$conn->remoteAddress}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Conectado: %d , Enviando mensaje "%s" a %d otra conexion%s' . "\n",
        $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');
        //require_once ('./../models/warehouse.php');
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                // El remitente no es el receptor, envíe a cada cliente conectado
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) 
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) 
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}