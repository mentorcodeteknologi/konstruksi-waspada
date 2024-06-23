<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsVerifyOTP extends Migration
{
    public function up()
    {
        $fields = [
            'is_veryfied_otp'  => [
                'type'           => 'BOOLEAN',
                'default'        => false
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        // Untuk menghapus kolom jika migration di-rollback
        $this->forge->dropColumn('users', 'new_column');
    }
}
