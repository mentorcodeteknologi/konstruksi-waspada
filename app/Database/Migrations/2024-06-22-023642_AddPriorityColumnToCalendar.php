<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPriorityColumnToCalendar extends Migration
{
    public function up()
    {
        $fields = [
            'priority' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,  // Jika kolom ini dapat bernilai null
            ],
        ];

        $this->forge->addColumn('calendar', $fields);
    }

    public function down()
    {
        // Untuk menghapus kolom jika migration di-rollback
        $this->forge->dropColumn('calendar', 'new_column');
    }
}
