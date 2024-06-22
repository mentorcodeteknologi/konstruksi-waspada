<?php

namespace App\Models;

use CodeIgniter\Model;

class CalendarModel extends Model
{
    protected $table            = 'calendar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_user', 'nama_kegiatan', 'tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at', 'priority'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    // ============================= //
    // FUNCTION GET DATA BY SLUG
    // ============================= //
    public function getDataBySlug($id)
    {
        return $this->select('*')->where('id', $id)->get()->getRowArray();
    }
}
