<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\Helpers;
use App\Models\PerusahaanBlacklistModel;
use App\Models\UserBlacklistModel;
use CodeIgniter\I18n\Time;

class UserBlacklistFrontendController extends BaseController
{
    // Deklarasi Model
    protected $userBlacklistModel;
    protected $perusahaanBlacklistModel;

    // Function Construct
    public function __construct()
    {
        $this->userBlacklistModel = new UserBlacklistModel();
        $this->perusahaanBlacklistModel = new PerusahaanBlacklistModel();
    }

    // User Blacklist Front End
    public function index()
    {
        $data = [
            'title' => 'User Blacklist',
            'list_user_blacklist' =>  $this->userBlacklistModel->findAllDatas(true),
            'list_perusahan_blacklist' => $this->perusahaanBlacklistModel->findAllDatas(true),
            'footerPopularArtikel' => $this->getPopularArticles(5),
            'footerRecentArtikel' => $this->getRecentArticles(5),
        ];
        return view('user_blacklist_frontend/index', $data);
    }

    // FUNCTION CREATE USER PERUSAHAAN BLACKLIST
    public function createPerusahaanBlacklist()
    {
        $session = session();
        $helper = new Helpers();
        $slug   = $helper->generateSlug();
        $path   = 'assets/backend/images/perusahaan_blacklist/' . $slug . "/";

        // CEK FOLDER PERUSAHAAN BLACKLIST
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // UPLOAD FOTO KTP
        $fileKtp = $this->request->getFile('foto_npwp');
        $fotoKtp = $fileKtp->getRandomName();
        $fileKtp->move($path, $fotoKtp);

        // UPLOAD SURAT PERJANJIAN
        $fileSuratPerjanjian = $this->request->getFile('surat_perjanjian');
        $suratPerjanjian     = $fileSuratPerjanjian->getRandomName();
        $fileSuratPerjanjian->move($path, $suratPerjanjian);

        // UPLOAD FOTO ALAT
        $fileFotoAlat = $this->request->getFile('foto_alat');
        $fotoAlat     = $fileFotoAlat->getRandomName();
        $fileFotoAlat->move($path, $fotoAlat);

        // UPLOAD FOTO SERAH TERIMA ALAT
        $fileFotoSerahTerimaAlat = $this->request->getFile('foto_serah_terima_alat');
        $fotoSerahTerimaAlat     = $fileFotoSerahTerimaAlat->getRandomName();
        $fileFotoSerahTerimaAlat->move($path, $fotoSerahTerimaAlat);

        $data = [
            'nik'                    => $this->request->getVar('nik'),
            'nama'                   => $this->request->getVar('nama'),
            'nama_penanggung_jawab'  => $this->request->getVar('nama_penanggung_jawab'),
            'foto_ktp'               => $fotoKtp,
            'no_hp'                  => $this->request->getVar('no_hp'),
            'merk'                   => $this->request->getVar('merk'),
            'type_alat'              => $this->request->getVar('type_alat'),
            'no_seri'                => $this->request->getVar('no_seri'),
            'surat_perjanjian'       => $suratPerjanjian,
            'foto_alat'              => $fotoAlat,
            'foto_serah_terima_alat' => $fotoSerahTerimaAlat,
            'jenis_pelanggaran'      => $this->request->getVar('jenis_pelanggaran'),
            'mulai_rental'           => $this->request->getVar('mulai_rental'),
            'akhir_rental'           => $this->request->getVar('akhir_rental'),
            'nominal_kerugian'       => $this->request->getVar('nominal_kerugian'),
            'keterangan'             => $this->request->getVar('keterangan'),
            'slug'                   => $slug,
            'id_user'                => $session->get('id'),
            'created_at'             => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'             => Time::now('Asia/Jakarta', 'en_US')
        ];

        // UPLOAD BUKTI LAINNYA OPTIONAL
        $fileBuktiLainnya = $this->request->getFile('bukti_lainnya');
        if (!empty($fileBuktiLainnya)) {
            $buktiLainnya = $fileBuktiLainnya->getRandomName();
            $fileBuktiLainnya->move($path, $buktiLainnya);
            $data['bukti_lainnya'] = $buktiLainnya;
        }

        $this->perusahaanBlacklistModel->insert($data);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(base_url('user_blacklist_frontend'));
    }

    // FUNCTION CREATE USER PERORANGAN BLACKLIST
    public function createUserBlacklist()
    {
        $session = session();
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
        $fileSuratPerjanjian->move($path, $suratPerjanjian);

        // UPLOAD FOTO ALAT
        $fileFotoAlat = $this->request->getFile('foto_alat');
        $fotoAlat     = $fileFotoAlat->getRandomName();
        $fileFotoAlat->move($path, $fotoAlat);

        // UPLOAD FOTO SERAH TERIMA ALAT
        $fileFotoSerahTerimaAlat = $this->request->getFile('foto_serah_terima_alat');
        $fotoSerahTerimaAlat     = $fileFotoSerahTerimaAlat->getRandomName();
        $fileFotoSerahTerimaAlat->move($path, $fotoSerahTerimaAlat);

        $data = [
            'nik'                    => $this->request->getVar('nik'),
            'nama'                   => $this->request->getVar('nama'),
            'foto_ktp'               => $fotoKtp,
            'no_hp'                  => $this->request->getVar('no_hp'),
            'merk'                   => $this->request->getVar('merk'),
            'type_alat'              => $this->request->getVar('type_alat'),
            'no_seri'                => $this->request->getVar('no_seri'),
            'surat_perjanjian'       => $suratPerjanjian,
            'foto_alat'              => $fotoAlat,
            'foto_serah_terima_alat' => $fotoSerahTerimaAlat,
            'jenis_pelanggaran'      => $this->request->getVar('jenis_pelanggaran'),
            'mulai_rental'           => $this->request->getVar('mulai_rental'),
            'akhir_rental'           => $this->request->getVar('akhir_rental'),
            'nominal_kerugian'       => $this->request->getVar('nominal_kerugian'),
            'keterangan'             => $this->request->getVar('keterangan'),
            'slug'                   => $slug,
            'id_user'                => $session->get('id'),
            'created_at'             => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'             => Time::now('Asia/Jakarta', 'en_US')
        ];

        // UPLOAD BUKTI LAINNYA OPTIONAL
        $fileBuktiLainnya = $this->request->getFile('bukti_lainnya');
        if (!empty($fileBuktiLainnya)) {
            $buktiLainnya = $fileBuktiLainnya->getRandomName();
            $fileBuktiLainnya->move($path, $buktiLainnya);
            $data['bukti_lainnya'] = $buktiLainnya;
        }

        $this->userBlacklistModel->insert($data);
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(base_url('user_blacklist_frontend'));
    }
}
