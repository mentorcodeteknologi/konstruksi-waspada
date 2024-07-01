<?php

namespace App\Models;

use CodeIgniter\Model;

class UserBlacklistModel extends Model
{
    protected $table            = 'user_blacklist';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nik', 'nama', 'foto_ktp', 'no_hp', 'valid', 'merk', 'type_alat', 'no_seri', 'surat_perjanjian', 'foto_alat', 'foto_serah_terima_alat', 'jenis_pelanggaran', 'mulai_rental', 'akhir_rental', 'bukti_lainnya', 'nominal_kerugian', 'keterangan', 'slug', 'id_user', 'created_at', 'updated_at'];

    // ============================= //
    // FUNCTION GET DATA BY SLUG
    // ============================= //
    public function getDataBySlug($slug)
    {
        return $this->select('*')->where('slug', $slug)->get()->getRowArray();
    }

    // ============================= //
    // FUNCTION FIND ALL DATAS
    // ============================= //
    public function findAllDatas($valid = null)
    {
        $builder = $this->db->table('user_blacklist');
        $builder->select('user_blacklist.foto_serah_terima_alat, user_blacklist.nik, user_blacklist.nama, user_blacklist.valid, user_blacklist.merk, user_blacklist.slug, user_blacklist.type_alat, user_blacklist.no_seri, user_blacklist.keterangan, user_blacklist.nominal_kerugian, user_blacklist.jenis_pelanggaran, user_blacklist.created_at, user_blacklist.updated_at, users.perusahaan');

        // Menghitung durasi rental dalam bulan dan membulatkannya ke atas
        $builder->select("CEIL(DATEDIFF(user_blacklist.akhir_rental, user_blacklist.mulai_rental) / 30) AS durasi");

        $builder->join('users', 'users.id = user_blacklist.id_user');
        $builder->orderBy('user_blacklist.updated_at', 'DESC');
        if ($valid != null) {
            $builder->where('user_blacklist.valid = 1');
        }
        return $builder->get()->getResultArray();
    }
}
