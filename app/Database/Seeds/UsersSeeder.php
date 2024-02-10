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
            'nama'       => 'admin',
            'email'      => 'admin@gmial.com',
            'password'   => password_hash('admin', PASSWORD_DEFAULT),
            'role'       => 'admin',
            'foto'       => 'default.png',
            'ecrypt'     => 'ec1ptA1Dm1n',
            'status'     => 'active',
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];

        // Insert to database
        $this->db->table('users')->insert($data);
    }
}
