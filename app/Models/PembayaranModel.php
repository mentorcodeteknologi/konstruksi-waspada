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
    protected $allowedFields    = ['id_user', 'jumlah_pembayaran', 'bukti_pembayaran', 'slug', 'validasi_pembayaran', 'start_date', 'end_date', 'created_at', 'updated_at'];

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


    // ========================================== //
    // FUNCTION GET EXPIRED PEMBAYARAN BY ID USER
    // ========================================== //
    public function getExpiredPembayaran($idUser)
    {
        $builder = $this->db->table('pembayaran');
        $builder->select('end_date');
        $builder->where('id_user', $idUser);
        $builder->where('end_date <', date('Y-m-d H:i:s'));
        $builder->orderBy('created_at', 'DESC');
        $builder->limit(1);
        return $builder->get()->getRowArray();
    }
}
