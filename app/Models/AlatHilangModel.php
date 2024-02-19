<?php

namespace App\Models;

use CodeIgniter\Model;

class AlatHilangModel extends Model
{
    protected $table            = 'alat_hilang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'merk', 'type_alat', 'serial_number', 'foto', 'pembelian_dari', 'tanggal_kehilangan', 'surat_kepemilikian', 'lokasi_kehilangan', 'kronologi', 'nominal_kerugian', 'slug', 'created_at', 'updated_at'];

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

    public function getDataBySlug($slug)
    {
        return $this->select('*')->where('slug', $slug)->get()->getRowArray();
    }


    // ========================= //
    // FUNCTION FIND ALL DATAS
    // ========================= //
    public function findAllDatas($id = null)
    {
        $builder = $this->db->table('alat_hilang');
        $builder->select('alamat_hilang.*, users.id_card, users.no_hp, users.nama');
        $builder->join('users', 'users.id = alat_hilang.id_user');
        if ($id != null) {
            $builder->where('alat_hilang.id', $id);
        }
        return $builder->get()->getResultArray();
    }
}
