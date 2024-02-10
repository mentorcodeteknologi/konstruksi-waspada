<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlatHilang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'nama_alat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'merk'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'deskripsi'          => [
                'type'           => 'TEXT'
            ],
            'foto'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'slug'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'created_at'         => [
                'type'           => 'DATETIME',
            ],
            'updated_at'         => [
                'type'           => 'DATETIME',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('alat_hilang');
    }

    public function down()
    {
        $this->forge->dropTable('alat_hilang');
    }
}
