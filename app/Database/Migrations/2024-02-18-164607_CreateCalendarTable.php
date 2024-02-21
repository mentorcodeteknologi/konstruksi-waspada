<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCalendarTable extends Migration
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
            'nama_kegiatan'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'tanggal_mulai'   => [
                'type'           => 'DATE',
            ],
            'tanggal_selesai'   => [
                'type'           => 'DATE',
            ],
            'created_at'         => [
                'type'           => 'DATETIME',
            ],
            'updated_at'         => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('calendar');
    }

    public function down()
    {
        $this->forge->dropTable('calendar');
    }
}
