<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'email', 'password', 'role', 'encrypt', 'perusahaan',  'foto', 'status', 'created_at', 'updated_at'];


    // ============================= //
    // FUNCTION GET DATA BY ENCRYPT
    // ============================= //
    public function getDataByEncrypt($encrypt)
    {
        return $this->select('*')->where('encrypt', $encrypt)->get()->getRowArray();
    }
}
