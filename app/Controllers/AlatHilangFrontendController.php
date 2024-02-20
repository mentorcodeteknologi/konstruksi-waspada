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
            'list_alat_hilang' => $this->alatHilangModel->getDataValidAlatHilang()
        ];
        return view('alat_hilang_frontend/index', $data);
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
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('alat_hilang/detail'));
    }
}
