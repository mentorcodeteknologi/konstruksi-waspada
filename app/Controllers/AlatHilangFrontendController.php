<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Helpers\Helpers;
use App\Models\AlatHilangModel;
use CodeIgniter\I18n\Time;

class AlatHilangFrontendController extends BaseController
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
            'title' => 'Alat Hilang',
            'list_alat_hilang' => $this->alatHilangModel->getDataValidAlatHilang(),
            'footerPopularArtikel' => $this->getPopularArticles(5),
            'footerRecentArtikel' => $this->getRecentArticles(5),
        ];
        return view('new_ui_frontend/alat_hilang_frontend_new/index', $data);
    }

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
        session()->setFlashdata('success', 'Data Berhasil Disimpan, menunggu validasi admin');
        return redirect()->to(base_url('alat_hilang/detail'));
    }

    public function validation($slug)
    {
        $userData = $this->alatHilangModel->getDataBySlug($slug);
        $data = ['valid' => 1];

        $this->alatHilangModel->update($userData['id'], $data);
        session()->setFlashdata('success', 'Data Berhasil Divalidasi');
        return redirect()->to(base_url('alat_hilang/detail'));
    }
}
