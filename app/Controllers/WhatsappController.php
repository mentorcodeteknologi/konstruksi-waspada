<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\UserBacklistModel;
use App\Helpers\Helpers;

class WhatsappController extends BaseController
{

    // DEKLARASI MODEL
    // protected $userBacklistModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $data = [
            'title'              => 'Whatsapp Scan QR',
            'subtitle'           => 'Whatsapp Scan QR',
        ];
        return view('whatsapp/index', $data);
    }


    // // ========================= //
    // // FUNCTION CREATE
    // // ========================= //
    // public function create()
    // {
    //     $data = [
    //         'title'    => 'User Backlist',
    //         'subtitle' => 'Tambah Data User Backlist'
    //     ];
    //     return view('user_backlist/create', $data);
    // }


    // // ============================= //
    // // FUNCTION CREATE USER BACKLIST
    // // ============================= //
    // public function createUserBacklist()
    // {
    //     $helper = new Helpers();

    //     $data = [
    //         'nik'                      => $this->request->getVar('nik'),
    //         'nama'                     => $this->request->getVar('nama'),
    //         'foto_ktp'                 => $this->request->getVar('foto_ktp'),
    //         'no_hp'                    => $this->request->getVar('no_hp'),
    //         'merk'                    => $this->request->getVar('merk'),
    //         'type_alat'                => $this->request->getVar('type_alat'),
    //         'no_seri'                  => $this->request->getVar('no_seri'),
    //         'surat_perjanjian'         => $this->request->getVar('surat_perjanjian'),
    //         'foto_alat'                => $this->request->getVar('foto_alat'),
    //         'foto_serah_terima_alat'   => $this->request->getVar('foto_serah_terima_alat'),
    //         'jenis_pelanggaran'        => $this->request->getVar('jenis_pelanggaran'),
    //         'slug'                     => $helper->generateSlug(),
    //         'created_at'               => Time::now('Asia/Jakarta', 'en_US'),
    //         'updated_at'               => Time::now('Asia/Jakarta', 'en_US')
    //     ];

    //     $this->userBacklistModel->insert($data);
    //     session()->setFlashdata('pesan', 'Data berhasil disimpan');
    //     return redirect()->to(base_url('user_backlist'));
    // }


    // // ========================= //
    // // FUNCTION EDIT
    // // ========================= //
    // public function edit($slug)
    // {
    //     $data = [
    //         'title'         => 'User Backlist',
    //         'subtitle'      => 'Edit Data User Backlist',
    //         'user_backlist' => $this->userBacklistModel->getDataBySlug($slug)
    //     ];
    //     return view('user_backlist/edit', $data);
    // }


    // // ============================= //
    // // FUNCTION UPDATE USER BACKLIST
    // // ============================= //
    // public function updateUserBacklist($slug)
    // {
    //     $helper = new Helpers();
    //     $datas  = $this->userBacklistModel->getDataBySlug($slug);

    //     $data = [
    //         'nik'                      => $this->request->getVar('nik'),
    //         'nama'                     => $this->request->getVar('nama'),
    //         'foto_ktp'                 => $this->request->getVar('foto_ktp'),
    //         'no_hp'                    => $this->request->getVar('no_hp'),
    //         'merk'                    => $this->request->getVar('merk'),
    //         'type_alat'                => $this->request->getVar('type_alat'),
    //         'no_seri'                  => $this->request->getVar('no_seri'),
    //         'surat_perjanjian'         => $this->request->getVar('surat_perjanjian'),
    //         'foto_alat'                => $this->request->getVar('foto_alat'),
    //         'foto_serah_terima_alat'   => $this->request->getVar('foto_serah_terima_alat'),
    //         'jenis_pelanggaran'        => $this->request->getVar('jenis_pelanggaran'),
    //         'slug'                     => $helper->generateSlug(),
    //         'updated_at'               => Time::now('Asia/Jakarta', 'en_US')
    //     ];

    //     $this->userBacklistModel->update($datas['id'], $data);
    //     session()->setFlashdata('pesan', 'Data berhasil diupdate');
    //     return redirect()->to(base_url('user_backlist'));
    // }


    // // ========================= //
    // // FUNCTION DELETE
    // // ========================= //
    // public function delete($slug)
    // {
    //     $datas = $this->userBacklistModel->getDataBySlug($slug);
    //     $this->userBacklistModel->delete($datas['id']);
    //     session()->setFlashdata('pesan', 'Data berhasil dihapus');
    //     return redirect()->to(base_url('user_backlist'));
    // }
}
