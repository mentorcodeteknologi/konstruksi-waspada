<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Helpers\Helpers;

class ArtikelController extends BaseController
{


    // DEKLARASI MODEL
    protected $artikelModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $data = [
            'title'        => 'Artikel',
            'subtitle'     => 'List Data Artikel',
            'list_artikel' => $this->artikelModel->findAll()
        ];
        return view('artikel/index', $data);
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        $data = [
            'title'    => 'Artikel',
            'subtitle' => 'Tambah Data Artikel'
        ];
        return view('artikel/create', $data);
    }


    // ========================= //
    // FUNCTION CREATE ARTIKEL
    // ========================= //
    public function createArtikel()
    {
        $helper = new Helpers();

        // UPLOAD GAMBAR
        $file = $this->request->getFile('gambar');
        $foto = 'default.png';
        if ($file && $file->isValid()) {
            $foto = $file->getRandomName();
            $file->move('assets/backend/images/artikel/', $foto);
        }

        $data = [
            'judul'      => $this->request->getVar('judul'),
            'isi'        => $this->request->getVar('isi'),
            'url'        => $this->request->getVar('url'),
            'deskripsi'  => $this->request->getVar('deskripsi'),
            'gambar'     => $foto,
            'slug'       => $helper->generateSlug(),
            'penulis'    => $this->request->getVar('penulis'),
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->artikelModel->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('artikel'));
    }


    // ========================= //
    // FUNCTION UPDATE
    // ========================= //
    public function update($slug)
    {
        $data = [
            'title'          => 'Artikel',
            'subtitle'       => 'Edit Data Artikel',
            'detail_artikel' => $this->artikelModel->getDataBySlug($slug)
        ];
        return view('artikel/update', $data);
    }


    // ========================= //
    // FUNCTION UPDATE USER
    // ========================= //
    public function updateArtikel($slug)
    {
        $artikelData = $this->artikelModel->getDataBySlug($slug);
        $file        = $this->request->getFile('gambar');

        // Cek apakah ada file yang diupload
        if ($file == "") {
            $foto = $artikelData['gambar'];
        } else {
            // Hapus gambar lama
            unlink('assets/backend/images/artikel/' . $artikelData['gambar']);
            $foto = $file->getRandomName();
            $file->move('assets/backend/images/artikel/', $foto);
        }

        $data = [
            'judul'      => $this->request->getVar('judul'),
            'isi'        => $this->request->getVar('isi'),
            'url'        => $this->request->getVar('url'),
            'deskripsi'  => $this->request->getVar('deskripsi'),
            'gambar'     => $foto,
            'penulis'    => $this->request->getVar('penulis'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->artikelModel->update($artikelData['id'], $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('artikel'));
    }


    // ========================= //
    // FUNCTION DELETE
    // ========================= //
    public function delete($slug)
    {
        $artikelData = $this->artikelModel->getDataBySlug($slug);

        // Hapus gambar
        if ($artikelData['gambar'] != 'default.png') {
            unlink('assets/backend/images/artikel/' . $artikelData['gambar']);
        }

        $this->artikelModel->delete($artikelData['id']);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('artikel'));
    }
}
