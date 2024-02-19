<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Helpers\Helpers;

class CategoryController extends BaseController
{


    // DEKLARASI MODEL
    protected $categoryModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $data = [
            'title'        => 'Kategori',
            'subtitle'     => 'List Data Kategori',
            'list_category' => $this->categoryModel->findAll()
        ];
        return view('category/index', $data);
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        $data = [
            'title'    => 'Kategori',
            'subtitle' => 'Tambah Data Kategori'
        ];
        return view('category/create', $data);
    }


    // ========================= //
    // FUNCTION CREATE category
    // ========================= //
    public function createCategory()
    {
        $data = [
            'category'          => $this->request->getVar('category'),
            'created_at'        => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'        => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->categoryModel->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('category'));
    }


    // ========================= //
    // FUNCTION UPDATE
    // ========================= //
    public function update($id)
    {
        $data = [
            'title'           => 'Kategori',
            'subtitle'        => 'Edit Data Kategori',
            'detail_category' => $this->categoryModel->getDataBySlug(base64_decode($id)),
        ];
        return view('category/update', $data);
    }


    // ========================= //
    // FUNCTION UPDATE USER
    // ========================= //
    public function updateCategory($id)
    {
        $categoryData = $this->categoryModel->getDataBySlug(base64_decode($id));

        $data = [
            'category'     => $this->request->getVar('category'),
            'created_at'        => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'        => Time::now('Asia/Jakarta', 'en_US')
        ];
        $this->categoryModel->update($categoryData['id'], $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('category'));
    }


    // ========================= //
    // FUNCTION DELETE
    // ========================= //
    public function delete($id)
    {
        $categoryData = $this->categoryModel->getDataBySlug(base64_decode($id));

        $this->categoryModel->delete($categoryData['id']);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('category'));
    }
}
