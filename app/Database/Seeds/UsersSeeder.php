<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // DEKLARASI DATA
        $data = [
            [
                'nama'       => 'Administrator',
                'email'      => 'admin@gmail.com',
                'password'   => md5('admin'),
                'role'       => 'admin',
                'encrypt'    => 'ec1Y3szcasd',
                'created_at' => Time::now('Asia/Jakarta', 'en_US'),
                'updated_at' => Time::now('Asia/Jakarta', 'en_US')
            ],
            [
                'nama'       => 'User',
                'email'      => 'user@gmail.com',
                'password'   => md5('user'),
                'role'       => 'user',
                'encrypt'    => 'ecz1sTcZsY',
                'created_at' => Time::now('Asia/Jakarta', 'en_US'),
                'updated_at' => Time::now('Asia/Jakarta', 'en_US')
            ]
        ];

        // Insert to database
        $this->db->table('users')->insertBatch($data);
    }
}
