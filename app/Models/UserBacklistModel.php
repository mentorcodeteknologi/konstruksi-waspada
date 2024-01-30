<?php

namespace App\Models;

use CodeIgniter\Model;

class UserBacklistModel extends Model
{
    protected $table            = 'user_backlist';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nik', 'nama', 'foto_ktp', 'no_hp', 'merek', 'type_alat', 'no_seri', 'surat_perjanjian', 'foto_alat', 'foto_serah_terima_alat', 'jenis_pelanggaran', 'mulai_rental', 'akhir_rental', 'bukti_laainnya', 'nominal_kerugian', 'id_user', 'created_at', 'updated_at'];
}
