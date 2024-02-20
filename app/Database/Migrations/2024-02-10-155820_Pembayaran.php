<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'id_user'            => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'jumlah_pembayaran'  => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'bukti_pembayaran'   => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'slug'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'validasi_pembayaran' => [
                'type'            => 'BOOLEAN',
                'null'            => true
            ],
            'start_date'          => [
                'type'            => 'DATE'
            ],
            'end_date'            => [
                'type'            => 'DATE'
            ],
            'created_at'          => [
                'type'            => 'DATETIME'
            ],
            'updated_at'          => [
                'type'            => 'DATETIME'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
