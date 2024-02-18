<?php // app\Libraries\WebSocketServer.php

namespace App\Libraries;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketServer implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Tambahkan koneksi baru ke daftar klien
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Pisahkan pesan berdasarkan tanda "-"
        $split = explode('-', $msg);

        // Konversi pesan ke dalam format JSON
        $jsonData = json_encode([
            'message' => $split[0],
            'code' => $split[1]
        ]);

        // Kirim pesan JSON ke semua klien yang terhubung
        foreach ($this->clients as $client) {
            // Jangan kirim pesan kembali ke pengirim
            if ($client !== $from) {
                $client->send($jsonData);
            }
        }

        // Output untuk melihat pesan yang diterima dari klien
        echo "Received message from client: $msg\n";
    }

    public function onClose(ConnectionInterface $conn)
    {
        // Hapus koneksi yang ditutup dari daftar klien
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
