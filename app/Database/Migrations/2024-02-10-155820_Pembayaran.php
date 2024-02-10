<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran'      => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'id_user'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true
            ],
            'jumlah_pembayaran'  => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'bukti_pembayaran'   => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ]
        ]);
        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
