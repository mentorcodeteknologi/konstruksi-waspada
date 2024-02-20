<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use App\Models\UsersModel;
use App\Helpers\Helpers;

class PembayaranController extends BaseController
{

    // DEKLARASI MODEL
    protected $pembayaranModel;
    protected $usersModel;

    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->usersModel      = new UsersModel();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $session = session();
        if ($session->get('role') != "admin") {
            $listData = $this->pembayaranModel->findAllDatas($session->get('id'));
        } else {
            $listData = $this->pembayaranModel->findAllDatas();
        }

        $data = [
            'title'           => 'Pembayaran',
            'subtitle'        => 'List Data Pembayaran',
            'list_pembayaran' => $listData
        ];
        return view('pembayaran/index', $data);
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        $data = [
            'title'    => 'Pembayaran',
            'subtitle' => 'Tambah Data Pembayaran'
        ];
        return view('pembayaran/create', $data);
    }


    // ============================= //
    // FUNCTION CREATE PEMBAYARAN
    // ============================= //
    public function createPembayaran()
    {
        $helper  = new Helpers();
        $session = session();

        // CEK FOLDER PEMBAYARAN
        $path = 'assets/backend/images/pembayaran/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // UPLOAD FOTO PROFILE
        $file = $this->request->getFile('bukti_pembayaran');
        if ($file && $file->isValid()) {
            $buktiPembayaran = $file->getRandomName() . '-' . $session->get('encrypt');
            $file->move($path, $buktiPembayaran);
        }

        $data = [
            'id_user'                => $session->get('id'),
            'jumlah_pembayaran'      => $this->request->getVar('jumlah_pembayaran'),
            'bukti_pembayaran'       => $buktiPembayaran,
            'slug'                   => $helper->generateSlug(),
            'created_at'             => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'             => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->pembayaranModel->insert($data);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(base_url('pembayaran'));
    }


    // ========================= //
    // FUNCTION UPDATE
    // ========================= //
    public function validasiPembayaran($slug)
    {
        $datas  = $this->pembayaranModel->getDataBySlug($slug);
        $update = [
            'validasi_pembayaran' => 1,
            'updated_at'          => Time::now('Asia/Jakarta', 'en_US')
        ];

        // UPDATE DATA ON TABLE PEMBAYARAN
        $this->pembayaranModel->update($datas['id'], $update);

        // UPDATE DATA ON TABLE USERS
        $this->usersModel->update($datas['id_user'], ['status' => "active"]);
        session()->setFlashdata('pesan', 'Data berhasil divalidasi');
        return redirect()->to(base_url('pembayaran'));
    }
}
