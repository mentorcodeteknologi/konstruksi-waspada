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
            'list_alat_hilang' => $this->alatHilangModel->findAllDatas()
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
        $helper  = new Helpers();
        $session = session();
        $path    = 'assets/backend/images/alat_hilang/';

        // UPLOAD FOTO PROFILE
        $file = $this->request->getFile('foto');
        $foto = 'default.png';
        if ($file && $file->isValid()) {
            $foto = $file->getRandomName();
            $file->move($path, $foto);
        }

        // SURAT KEPEMILIKIAN
        $suratKepemilikian = $this->request->getFile('surat_kepemilikian');
        if ($suratKepemilikian && $suratKepemilikian->isValid()) {
            $surat = $suratKepemilikian->getRandomName();
            $suratKepemilikian->move($path, $surat);
        }

        $data = [
            'id_user'            => $session->get('id'),
            'type_alat'          => $this->request->getVar('type_alat'),
            'merk'               => $this->request->getVar('merk'),
            'serial_number'      => $this->request->getVar('serial_number'),
            'foto'               => $foto,
            'pembelian_dari'     => $this->request->getVar('pembelian_dari'),
            'tanggal_kehilangan' => $this->request->getVar('tanggal_kehilangan'),
            'surat_kepemilikian' => $surat,
            'lokasi_kehilangan'  => $this->request->getVar('lokasi_kehilangan'),
            'kronologi'          => $this->request->getVar('kronologi'),
            'nominal_kerugian'   => $this->request->getVar('nominal_kerugian'),
            'slug'               => $helper->generateSlug(),
            'created_at'         => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'         => Time::now('Asia/Jakarta', 'en_US')
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

        $suratKepemilikian = $this->request->getFile('surat_kepemilikian');
        if ($suratKepemilikian == "") {
            $surat = $userData['surat_kepemilikian'];
        } else {
            unlink('assets/backend/images/alat_hilang/' . $userData['surat_kepemilikian']);
            $surat = $suratKepemilikian->getRandomName();
            $suratKepemilikian->move('assets/backend/images/alat_hilang/', $surat);
        }

        $data = [
            'type_alat'          => $this->request->getVar('type_alat'),
            'merk'               => $this->request->getVar('merk'),
            'serial_number'      => $this->request->getVar('serial_number'),
            'foto'               => $foto,
            'pembelian_dari'     => $this->request->getVar('pembelian_dari'),
            'tanggal_kehilangan' => $this->request->getVar('tanggal_kehilangan'),
            'surat_kepemilikian' => $surat,
            'lokasi_kehilangan'  => $this->request->getVar('lokasi_kehilangan'),
            'kronologi'          => $this->request->getVar('kronologi'),
            'nominal_kerugian'   => $this->request->getVar('nominal_kerugian'),
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
        unlink('assets/backend/images/alat_hilang/' . $userData['foto']);
        unlink('assets/backend/images/alat_hilang/' . $userData['surat_kepemilikian']);

        $this->alatHilangModel->delete($userData['id']);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('alat_hilang'));
    }

    // ========================= //
    // FUNCTION VALIDASI
    // ========================= //
    public function validation($slug)
    {
        $userData = $this->alatHilangModel->getDataBySlug($slug);
        $data = [
            'valid' => 1
        ];

        $this->alatHilangModel->update($userData['id'], $data);
        session()->setFlashdata('pesan', 'Data Berhasil Divalidasi');
        return redirect()->to(base_url('alat_hilang'));
    }
}
