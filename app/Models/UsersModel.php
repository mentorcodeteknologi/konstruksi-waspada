<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'id_card', 'no_hp', 'email', 'password', 'alamat', 'role', 'encrypt', 'perusahaan', 'jabatan', 'foto', 'status', 'created_at', 'updated_at', 'is_veryfied_email'];

    // ============================= //
    // FUNCTION GET DATA BY ENCRYPT
    // ============================= //
    public function getDataByEncrypt($encrypt)
    {
        return $this->select('*')->where('encrypt', $encrypt)->get()->getRowArray();
    }

    // ============================= //
    // FUNCTION CHECK LOGIN
    // ============================= //
    public function checkLogin($email, $password)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('email', $email);
        $user = $builder->get()->getRowArray();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
