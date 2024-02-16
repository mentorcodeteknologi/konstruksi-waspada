<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'nama'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'id_card'            => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'no_hp'              => [
                'type'           => 'VARCHAR',
                'constraint'     => 15,
            ],
            'email'              => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'password'           => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'alamat'             => [
                'type'           => 'TEXT',
            ],
            'role'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'encrypt'            => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'not null'       => true,
            ],
            'perusahaan'         => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => true,
            ],
            'jabatan'            => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => true,
            ],
            'foto'               => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'default'        => 'default.png'
            ],
            'status'             => [
                'type'           => 'ENUM',
                'constraint'     => ['active', 'nonactive'],
                'default'        => 'nonactive'
            ],
            'is_veryfied_email'  => [
                'type'           => 'BOOLEAN',
                'default'        => false
            ],
            'created_at'         => [
                'type'           => 'DATETIME',
            ],
            'updated_at'         => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
