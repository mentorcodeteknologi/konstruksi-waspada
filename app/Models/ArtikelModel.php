<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'isi', 'gambar', 'url', 'deskripsi', 'slug', 'penulis', 'id_categories', 'created_at', 'updated_at'];

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
    // FUNCTION FIND ALL DATA
    // ============================= //
    public function findAllData($slug = null)
    {
        $builder = $this->db->table('artikel');
        $builder->select('artikel.*, categories.category as category_name');
        $builder->join('categories', 'categories.id = artikel.id_categories');
        if ($slug != null) {
            $builder->where('artikel.slug', $slug);
            return $builder->get()->getRowArray();
        }
        return $builder->get()->getResultArray();
    }

    // ============================= //
    // FUNCTION GET DATA BY SLUG
    // ============================= //
    public function getDataBySlug($slug)
    {
        $builder = $this->db->table('artikel');
        $builder->select('artikel.*, categories.category as category_name');
        $builder->join('categories', 'categories.id = artikel.id_categories');
        $builder->where('artikel.slug', $slug);
        return $builder->get()->getRowArray();
    }

    // ============================= //
    // FUNCTION GET ARTIKEL DI FRONTEND
    // ============================= //
    public function getRecentArticles($limit = 10)
    {
        return $this->select('*')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
}
