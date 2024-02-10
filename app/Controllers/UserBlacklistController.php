<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\UserBlacklistModel;
use App\Helpers\Helpers;

class UserBlacklistController extends BaseController
{

    // DEKLARASI MODEL
    protected $userBlacklistModel;

    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->userBlacklistModel = new UserBlacklistModel();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $data = [
            'title'              => 'User Blacklist',
            'subtitle'           => 'List Data User Blacklist',
            'list_user_blacklist' => $this->userBlacklistModel->findAll()
        ];
        return view('user_blacklist/index', $data);
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        $data = [
            'title'    => 'User Blacklist',
            'subtitle' => 'Tambah Data User Blacklist'
        ];
        return view('user_blacklist/create', $data);
    }


    // ============================= //
    // FUNCTION CREATE USER Blacklist
    // ============================= //
    public function createUserBlacklist()
    {
        $helper = new Helpers();
        $slug   = $helper->generateSlug();
        $path   = 'assets/backend/images/user_blacklist/' . $slug . "/";

        // CEK FOLDER USER BLACKLIST
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // UPLOAD FOTO KTP
        $fileKtp = $this->request->getFile('foto_ktp');
        $fotoKtp = $fileKtp->getRandomName();
        $fileKtp->move($path, $fotoKtp);

        // UPLOAD SURAT PERJANJIAN
        $fileSuratPerjanjian = $this->request->getFile('surat_perjanjian');
        $suratPerjanjian     = $fileSuratPerjanjian->getRandomName();
        $fileSuratPerjanjian->move('assets/backend/images/user_blacklist/' . $slug . "/", $suratPerjanjian);

        // UPLOAD FOTO ALAT
        $fileFotoAlat = $this->request->getFile('foto_alat');
        $fotoAlat     = $fileFotoAlat->getRandomName();
        $fileFotoAlat->move('assets/backend/images/user_blacklist/' . $slug . "/", $fotoAlat);

        // UPLOAD FOTO SERAH TERIMA ALAT
        $fileFotoSerahTerimaAlat = $this->request->getFile('foto_serah_terima_alat');
        $fotoSerahTerimaAlat     = $fileFotoSerahTerimaAlat->getRandomName();
        $fileFotoSerahTerimaAlat->move('assets/backend/images/user_blacklist/' . $slug . "/", $fotoSerahTerimaAlat);

        $data = [
            'nik'                    => $this->request->getVar('nik'),
            'nama'                   => $this->request->getVar('nama'),
            'foto_ktp'               => $fotoKtp,
            'no_hp'                  => $this->request->getVar('no_hp'),
            'merk'                   => $this->request->getVar('merek'),
            'type_alat'              => $this->request->getVar('type_alat'),
            'no_seri'                => $this->request->getVar('no_seri'),
            'surat_perjanjian'       => $suratPerjanjian,
            'foto_alat'              => $fotoAlat,
            'foto_serah_terima_alat' => $fotoSerahTerimaAlat,
            'jenis_pelanggaran'      => $this->request->getVar('jenis_pelanggaran'),
            'slug'                   => $slug,
            'created_at'             => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'             => Time::now('Asia/Jakarta', 'en_US')
        ];

        // UPLOAD BUKTI LAINNYA OPTIONAL
        $fileBuktiLainnya = $this->request->getFile('bukti_lainnya');
        if ($fileBuktiLainnya) {
            $buktiLainnya = $fileBuktiLainnya->getRandomName();
            $fileBuktiLainnya->move('assets/backend/images/user_blacklist/' . $slug . "/", $buktiLainnya);
            $data['bukti_lainnya'] = $buktiLainnya;
        }

        $this->userBlacklistModel->insert($data);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(base_url('user_blacklist'));
    }


    // ========================= //
    // FUNCTION EDIT
    // ========================= //
    public function edit($slug)
    {
        $data = [
            'title'         => 'User Blacklist',
            'subtitle'      => 'Edit Data User Blacklist',
            'user_blacklist' => $this->userBlacklistModel->getDataBySlug($slug)
        ];
        return view('user_blacklist/edit', $data);
    }


    // ============================= //
    // FUNCTION UPDATE USER Blacklist
    // ============================= //
    public function updateUserBlacklist($slug)
    {
        $helper = new Helpers();
        $datas  = $this->userBlacklistModel->getDataBySlug($slug);

        $data = [
            'nik'                      => $this->request->getVar('nik'),
            'nama'                     => $this->request->getVar('nama'),
            'foto_ktp'                 => $this->request->getVar('foto_ktp'),
            'no_hp'                    => $this->request->getVar('no_hp'),
            'merek'                    => $this->request->getVar('merek'),
            'type_alat'                => $this->request->getVar('type_alat'),
            'no_seri'                  => $this->request->getVar('no_seri'),
            'surat_perjanjian'         => $this->request->getVar('surat_perjanjian'),
            'foto_alat'                => $this->request->getVar('foto_alat'),
            'foto_serah_terima_alat'   => $this->request->getVar('foto_serah_terima_alat'),
            'jenis_pelanggaran'        => $this->request->getVar('jenis_pelanggaran'),
            'slug'                     => $helper->generateSlug(),
            'updated_at'               => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->userBlacklistModel->update($datas['id'], $data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to(base_url('user_blacklist'));
    }


    // ========================= //
    // FUNCTION DELETE
    // ========================= //
    public function delete($slug)
    {
        $helper = new Helpers();
        $datas  = $this->userBlacklistModel->getDataBySlug($slug);

        // HAPUS FOLDER
        $path = 'assets/backend/images/user_blacklist/' . $slug . "/";
        if (file_exists($path)) {
            $helper->deleteDir($path);
        }
        $this->userBlacklistModel->delete($datas['id']);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('user_blacklist'));
    }
}
