<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use App\Models\AlatHilangModel;
use App\Helpers\Helpers;

class AlatHilangController extends BaseController
{

    // DEKLARASI MODEL
    protected $alatHilangModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->alatHilangModel = new AlatHilangModel();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $data = [
            'title'            => 'Alat Hilang',
            'subtitle'         => 'List Data Alat Hilang',
            'list_alat_hilang' => $this->alatHilangModel->findAll()
        ];
        return view('alat_hilang/index', $data);
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        $data = [
            'title'    => 'Alat Hilang',
            'subtitle' => 'Tambah Data Alat Hilang'
        ];
        return view('alat_hilang/create', $data);
    }


    // ========================= //
    // FUNCTION CREATE ALAT HILANG
    // ========================= //
    public function createAlatHilang()
    {
        $helper = new Helpers();

        // UPLOAD FOTO PROFILE
        $file = $this->request->getFile('foto');
        $foto = 'default.png';
        if ($file && $file->isValid()) {
            $foto = $file->getRandomName();
            $file->move('assets/backend/images/alat_hilang/', $foto);
        }

        $data = [
            'nama_alat'  => $this->request->getVar('nama_alat'),
            'jenis'      => $this->request->getVar('jenis'),
            'merk'       => $this->request->getVar('merk'),
            'warna'      => $this->request->getVar('warna'),
            'deskripsi'  => $this->request->getVar('deskripsi'),
            'foto'       => $foto,
            'slug'       => $helper->generateSlug(),
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->alatHilangModel->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('alat_hilang'));
    }


    // ========================= //
    // FUNCTION UPDATE
    // ========================= //
    public function update($slug)
    {
        $data = [
            'title'              => 'Alat Hilang',
            'subtitle'           => 'Edit Data Alat Hilang',
            'detail_alat_hilang' => $this->alatHilangModel->getDataBySlug($slug)
        ];
        return view('alat_hilang/update', $data);
    }


    // ========================= //
    // FUNCTION UPDATE USER
    // ========================= //
    public function updateAlatHilang($slug)
    {
        $userData = $this->alatHilangModel->getDataBySlug($slug);
        $file     = $this->request->getFile('foto');

        // Cek apakah ada file yang diupload
        if ($file == "") {
            $foto = $userData['foto'];
        } else {
            // Hapus foto lama
            if ($userData['foto'] != 'default.png') {
                unlink('assets/backend/images/alat_hilang/' . $userData['foto']);
            }
            $foto = $file->getRandomName();
            $file->move('assets/backend/images/alat_hilang/', $foto);
        }

        $data = [
            'nama_alat'  => $this->request->getVar('nama_alat'),
            'jenis'      => $this->request->getVar('jenis'),
            'merk'       => $this->request->getVar('merk'),
            'warna'      => $this->request->getVar('warna'),
            'deskripsi'  => $this->request->getVar('deskripsi'),
            'foto'       => $foto,
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->alatHilangModel->update($userData['id'], $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('alat_hilang'));
    }


    // ========================= //
    // FUNCTION DELETE
    // ========================= //
    public function delete($slug)
    {
        $userData = $this->alatHilangModel->getDataBySlug($slug);
        if ($userData['foto'] != 'default.png') {
            unlink('assets/backend/images/alat_hilang/' . $userData['foto']);
        }

        $this->alatHilangModel->delete($userData['id']);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('alat_hilang'));
    }
}
