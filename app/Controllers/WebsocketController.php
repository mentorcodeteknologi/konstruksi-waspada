<?php
// app\Controllers\WebSocketController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\WebSocketServer;

class WebSocketController extends Controller {
    public function index() {
        if (!is_cli()) {
            echo 'Forbidden Access';
            die;
        }
        $server = new \Ratchet\WebSocket\WsServer(new WebSocketServer());
        $app = new \Ratchet\Http\HttpServer($server);
        \Ratchet\Server\IoServer::factory($app, 8081)->run();
    }
}
