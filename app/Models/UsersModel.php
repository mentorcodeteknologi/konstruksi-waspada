<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'id_card', 'no_hp', 'email', 'password', 'alamat', 'role', 'encrypt', 'perusahaan', 'jabatan', 'foto', 'status', 'created_at', 'updated_at', 'is_veryfied_email', 'is_veryfied_otp'];

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

    // ========================================== //
    // FUNCTION CHECK EMAIL EXIST OR NO HP EXIST
    // ========================================== //
    public function checkExist($email, $no_hp)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('email', $email);
        $builder->orWhere('no_hp', $no_hp);
        return $builder->get()->getRowArray();
    }


    // ========================================== //
    // FUNCTION CHECK EMAIL EXIST
    // ========================================== //
    public function checkEmailExist($email)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('email', $email);
        return $builder->get()->getRowArray();
    }


    // ========================================== //
    // FUNCTION CHECK NO HP EXIST
    // ========================================== //
    public function checkNoHpExist($no_hp)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('no_hp', $no_hp);
        return $builder->get()->getRowArray();
    }



    // ========================================== //
    // FUNCTION CHECK STATUS ACTIVE USER
    // ========================================== //
    public function updateStatusActive($encrypt)
    {
        $builder = $this->db->table('users');
        $builder->set('status', 'active');
        $builder->where('encrypt', $encrypt);
        return $builder->update();
    }
}
