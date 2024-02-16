<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PerusahaanBlacklist extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                       => [
                'type'                 => 'INT',
                'constraint'           => 11,
                'auto_increment'       => true,
            ],
            'npwp'                     => [
                'type'                 => 'VARCHAR',
                'constraint'           => 20,
            ],
            'nama'                     => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'foto_npwp'                 => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'nama_penanggung_jawab'    => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
                'null'                 => true,
            ],
            'no_hp'                    => [
                'type'                 => 'VARCHAR',
                'constraint'           => 20,
            ],
            'mrek'                     => [
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
                'null'                 => true,
            ],
            'foto_serah_terima_alat'   => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
                'null'                 => true,
            ],
            'jenis_pelanggaran'        => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'mulai_rental'             => [
                'type'                 => 'DATETIME',
            ],
            'akhir_rental'             => [
                'type'                 => 'DATETIME',
            ],
            'bukti_lainnya'            => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
                'null'                 => true,
            ],
            'nominal_kerugian'         => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'keterangan'               => [
                'type'                 => 'TEXT',
            ],
            'slug'                     => [
                'type'                 => 'VARCHAR',
                'constraint'           => 100,
            ],
            'id_user'                  => [
                'type'                 => 'INT',
                'constraint'           => 11,
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
        $this->forge->createTable('perusahaan_blacklist');
    }

    public function down()
    {
        $this->forge->dropTable('perusahaan_blacklist');
    }
}
