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
            'valid'              => [
                'type'           => 'BOOLEAN',
                'default'        => false
            ],
            'id_user'            => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'merk'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'type_alat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'serial_number'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'foto'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'pembelian_dari'     => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'tanggal_kehilangan' => [
                'type'           => 'DATE'
            ],
            'surat_kepemilikian' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'lokasi_kehilangan'  => [
                'type'           => 'TEXT',
            ],
            'kronologi'          => [
                'type'           => 'TEXT'
            ],
            'nominal_kerugian'    => [
                'type'           => 'INT',
                'constraint'     => 50
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
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('alat_hilang');
    }

    public function down()
    {
        $this->forge->dropTable('alat_hilang');
    }
}
