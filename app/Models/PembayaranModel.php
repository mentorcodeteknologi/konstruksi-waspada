<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'jumlah_pembayaran', 'bukti_pembayaran', 'slug', 'validasi_pembayaran'];

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


    // ========================= //
    // FUNCTION GET ALL PEMBAYARAN BY SLUG
    // ========================= //
    public function getDataBySlug($slug)
    {
        return $this->select('*')->where('slug', $slug)->get()->getRowArray();
    }

    // ========================= //
    // FUNCTION FIND ALL DATAS
    // ========================= //
    public function findAllDatas($id = null)
    {
        $builder = $this->db->table('pembayaran');
        $builder->select('pembayaran.*, users.nama as nama_user');
        $builder->join('users', 'users.id = pembayaran.id_user');
        if ($id != null) {
            $builder->where('pembayaran.id_user', $id);
        }
        return $builder->get()->getResultArray();
    }
}
