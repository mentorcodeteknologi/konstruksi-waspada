<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableConfig extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'url'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'port'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'remark'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('socket');
    }

    public function down()
    {
        $this->forge->dropTable('socket');
    }
}
