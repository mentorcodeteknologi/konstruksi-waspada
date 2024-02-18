<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'isi'            => [
                'type'       => 'TEXT',
            ],
            'gambar'         => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'url'            => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'slug'           => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'penulis'        => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at'     => [
                'type'       => 'DATETIME',
            ],
            'updated_at'     => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('artikel');
    }

    public function down()
    {
        $this->forge->dropTable('artikel');
    }
}
