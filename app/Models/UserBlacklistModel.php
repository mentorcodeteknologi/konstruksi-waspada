<?php

namespace App\Models;

use CodeIgniter\Model;

class UserBlacklistModel extends Model
{
    protected $table            = 'user_blacklist';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nik', 'nama', 'foto_ktp', 'no_hp', 'merk', 'type_alat', 'no_seri', 'surat_perjanjian', 'foto_alat', 'foto_serah_terima_alat', 'jenis_pelanggaran', 'mulai_rental', 'akhir_rental', 'bukti_lainnya', 'nominal_kerugian', 'keterangan', 'slug', 'id_user', 'created_at', 'updated_at'];

    // ============================= //
    // FUNCTION GET DATA BY SLUG
    // ============================= //
    public function getDataBySlug($slug)
    {
        return $this->select('*')->where('slug', $slug)->get()->getRowArray();
    }
}
