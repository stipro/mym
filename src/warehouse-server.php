<?php
use Ratchet\Server\IoServer;
use inventario\warehouse;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require 'vendor/autoload.php';

$server = IoServer::factory(
  new HttpServer(
      new WsServer(
          new warehouse()
      )
  ),
  8080
);

$server->run();

