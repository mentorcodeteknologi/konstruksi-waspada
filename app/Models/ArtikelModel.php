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
    protected $allowedFields    = ['judul', 'isi', 'gambar', 'url', 'deskripsi', 'slug', 'penulis', 'id_categories', 'likes', 'views', 'created_at', 'updated_at'];

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
        $builder->select('artikel.*, categories.category as category_name, users.nama author');
        $builder->join('categories', 'categories.id = artikel.id_categories');
        $builder->join('users', 'artikel.penulis = users.id');
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
        $builder->select('artikel.*, categories.category as category_name, users.nama author');
        $builder->join('categories', 'categories.id = artikel.id_categories');
        $builder->join('users', 'artikel.penulis = users.id');
        $builder->where('artikel.slug', $slug);
        $this->updatePopularity($slug, 'views');
        return $builder->get()->getRowArray();
    }

    // ============================= //
    // FUNCTION GET ARTIKEL DI FRONTEND
    // ============================= //
    public function getOrderArticle($col, $sort, $limit = 10)
    {
        return $this->select('*')
            ->orderBy($col, $sort)
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    // ============================= //
    // FUNCTION UPDATE VIEWS & LIKES
    // ============================= //
    public function updatePopularity($slug, $col, $separator = null, $count = false)
    {
        $artikel = $this->where('slug', $slug)->get()->getRowArray();
        $update = [
            $col => $separator ? $artikel[$col] - 1 : $artikel[$col] + 1,
        ];
        if ($count) {
            $this->update($artikel['id'], $update);
            return $this->select($col)->where('slug', $slug)->get()->getRowArray();
        } else {
            return $this->update($artikel['id'], $update);
        }
    }

    public function getPopularArticles($limit = 5)
    {
        $this->select('*');
        $this->orderBy('views', 'desc');
        $this->limit($limit);
        $query = $this->get();
        return $query->getResultArray();
    }
}
