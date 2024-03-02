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
                'nama'                => 'admin',
                'id_card'             => '1234567890',
                'no_hp'               => '6281234567890',
                'email'               => 'admin@gmail.com',
                'password'            => password_hash('admin', PASSWORD_DEFAULT),
                'alamat'              => 'Jl. Admin No. 1, Jakarta',
                'role'                => 'admin',
                'encrypt'             => 'ec1ptA1Dm1n12e',
                'is_veryfied_email'   => 1,
                'perusahaan'          => 'PT. Admin',
                'jabatan'             => 'Admin',
                'foto'                => 'default.png',
                'status'              => 'active',
                'created_at'          => Time::now(),
                'updated_at'          => Time::now()
            ],
            [
                'nama'              => 'user',
                'id_card'           => '0987654321',
                'no_hp'             => '6289876543210',
                'email'             => 'user@gmail.com',
                'password'          => password_hash('user', PASSWORD_DEFAULT),
                'alamat'            => 'Jl. User No. 1, Jakarta',
                'role'              => 'users',
                'encrypt'           => '3ncryptU53r123',
                'is_veryfied_email' => 1,
                'perusahaan'        => 'PT. User',
                'jabatan'           => 'User',
                'foto'              => 'default.png',
                'status'            => 'active',
                'created_at'        => Time::now(),
                'updated_at'        => Time::now()
            ]
        ];

        // Insert to database
        $this->db->table('users')->insertBatch($data);
    }
}
