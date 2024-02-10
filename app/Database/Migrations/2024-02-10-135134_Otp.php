<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Otp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'otp' => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'type' => [
                'type'           => 'ENUM',
                'constraint'     => ['email', 'whatsapp']
            ],
            'expired_at'         => [
                'type'           => 'DATETIME',
            ],
            'created_at'         => [
                'type'           => 'DATETIME',
            ],
            'updated_at'         => [
                'type'           => 'DATETIME',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('otp');
    }

    public function down()
    {
        //
    }
}
