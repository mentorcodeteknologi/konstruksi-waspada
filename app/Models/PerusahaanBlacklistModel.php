<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanBlacklistModel extends Model
{
    protected $table            = 'perusahaan_blacklist';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['npwp', 'nama', 'foto_npwp', 'valid', 'nama_penanggung_jawab', 'no_hp', 'merk', 'type_alat', 'no_seri', 'surat_perjanjian', 'foto_alat', 'foto_serah_terima_alat', 'jenis_pelanggaran', 'mulai_rental', 'akhir_rental', 'bukti_lainnya', 'nominal_kerugian', 'keterangan', 'slug', 'id_user', 'created_at', 'updated_at'];

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


    // ============================ //
    // FUNCTION FIND ALL DATAS
    // ============================ //
    public function findAllDatas($valid = null)
    {
        $builder = $this->db->table('perusahaan_blacklist');
        $builder->select('perusahaan_blacklist.*, users.perusahaan');
        $builder->select("CEIL(DATEDIFF(perusahaan_blacklist.akhir_rental, perusahaan_blacklist.mulai_rental) / 30) AS durasi");
        $builder->join('users', 'users.id = perusahaan_blacklist.id_user');
        $builder->orderBy('perusahaan_blacklist.created_at', 'DESC');
        if ($valid != null) {
            $builder->where('perusahaan_blacklist.valid = 1');
        }
        return $builder->get()->getResultArray();
    }

    public function getDataBySlug($slug)
    {
        return $this->select('*')->where('slug', $slug)->get()->getRowArray();
    }
}
