<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserBacklist extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                       => [
                'type'                 => 'INT',
                'constraint'           => 11,
                'auto_increment'       => true,
            ],
            'nik'                      => [
                'type'                 => 'VARCHAR',
                'constraint'           => 20,
            ],
            'nama'                     => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'foto_ktp'                 => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'no_hp'                    => [
                'type'                 => 'VARCHAR',
                'constraint'           => 20,
            ],
            'merek'                    => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'type_alat'                => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'no_seri'                  => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'surat_perjanjian'         => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'foto_alat'                => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'foto_serah_terima_alat'   => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'jenis_pelanggaran'        => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'mulai_rental'             => [
                'type'                 => 'DATE',
            ],
            'akhir_rental'             => [
                'type'                 => 'DATE',
            ],
            'bukti_lainnya'            => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'nominal_kerugian'         => [
                'type'                 => 'INT',
                'constraint'           => 20,
            ],
            'id_user'                   => [
                'type'                 => 'INT',
                'constraint'           => 11,
            ],
            'slug'                     => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'created_at'               => [
                'type'                 => 'DATETIME',
            ],
            'updated_at'               => [
                'type'                 => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_backlist');
    }

    public function down()
    {
        $this->forge->dropTable('user_backlist');
    }
}
