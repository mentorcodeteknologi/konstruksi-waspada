<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\PerusahaanBlacklistModel;
use App\Helpers\Helpers;

class PerusahaanBlacklistController extends BaseController
{

    // DEKLARASI MODEL
    protected $perusahaanBlacklistModel;

    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->perusahaanBlacklistModel = new PerusahaanBlacklistModel();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $data = [
            'title'                    => 'Perusahaan Blacklist',
            'subtitle'                 => 'List Data Perusahaan Blacklist',
            'list_perusahan_blacklist' => $this->perusahaanBlacklistModel->findAllDatas()
        ];
        return view('backend/perusahaan-blacklist/index', $data);
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        $data = [
            'title'    => 'Perusahan Blacklist',
            'subtitle' => 'Tambah Data Perusahaan Blacklist'
        ];
        return view('backend/perusahaan-blacklist/create', $data);
    }


    // ============================= //
    // FUNCTION CREATE PERUSAHAAN BLACKLIST
    // ============================= //
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
        $fileNpwp = $this->request->getFile('foto_npwp');
        $fotoNpwp = $fileNpwp->getRandomName();
        $fileNpwp->move($path, $fotoNpwp);

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
            'npwp'                   => $this->request->getVar('npwp'),
            'nama_penanggung_jawab'  => $this->request->getVar('nama_penanggung_jawab'),
            'foto_npwp'               => $fotoNpwp,
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
        return redirect()->to(base_url('backend/perusahaan_blacklist'));
    }


    // ========================= //
    // FUNCTION UPDATE
    // ========================= //
    public function update($slug)
    {
        $data = [
            'title'                  => 'User Blacklist',
            'subtitle'               => 'Edit Data User Blacklist',
            'detail_perusahaan_blacklist' => $this->perusahaanBlacklistModel->getDataBySlug($slug)
        ];
        return view('backend/perusahaan-blacklist/update', $data);
    }


    // ============================= //
    // FUNCTION UPDATE USER Blacklist
    // ============================= //
    public function updatePerusahaanBlacklist($slug)
    {
        $datas  = $this->perusahaanBlacklistModel->getDataBySlug($slug);

        // CEK FOLDER USER BLACKLIST
        $path = 'assets/backend/images/perusahaan_blacklist/' . $slug . "/";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // CHECK APAKAH FOTO KTP ADA PERUBAHAN
        $fileNpwp = $this->request->getFile('foto_npwp');
        if ($fileNpwp->isValid()) {
            $fotoNpwp = $fileNpwp->getRandomName();
            $fileNpwp->move($path, $fotoNpwp);
            // HAPUS FOTO KTP LAMA
            unlink($path . $datas['foto_npwp']);
        } else {
            $fotoNpwp = $datas['foto_npwp'];
        }

        // CHECK APAKAH SURAT PERJANJIAN ADA PERUBAHAN
        $fileSuratPerjanjian = $this->request->getFile('surat_perjanjian');
        if ($fileSuratPerjanjian->isValid()) {
            $suratPerjanjian = $fileSuratPerjanjian->getRandomName();
            $fileSuratPerjanjian->move($path, $suratPerjanjian);
            // HAPUS SURAT PERJANJIAN LAMA
            unlink($path . $datas['surat_perjanjian']);
        } else {
            $suratPerjanjian = $datas['surat_perjanjian'];
        }

        // CHECK APAKAH FOTO ALAT ADA PERUBAHAN
        $fileFotoAlat = $this->request->getFile('foto_alat');
        if ($fileFotoAlat->isValid()) {
            $fotoAlat = $fileFotoAlat->getRandomName();
            $fileFotoAlat->move($path, $fotoAlat);
            // HAPUS FOTO ALAT LAMA
            unlink($path . $datas['foto_alat']);
        } else {
            $fotoAlat = $datas['foto_alat'];
        }

        // CHECK APAKAH FOTO SERAH TERIMA ALAT ADA PERUBAHAN
        $fileFotoSerahTerimaAlat = $this->request->getFile('foto_serah_terima_alat');
        if ($fileFotoSerahTerimaAlat->isValid()) {
            $fotoSerahTerimaAlat = $fileFotoSerahTerimaAlat->getRandomName();
            $fileFotoSerahTerimaAlat->move($path, $fotoSerahTerimaAlat);
            // HAPUS FOTO SERAH TERIMA ALAT LAMA
            unlink($path . $datas['foto_serah_terima_alat']);
        } else {
            $fotoSerahTerimaAlat = $datas['foto_serah_terima_alat'];
        }

        $data = [
            'nik'                    => $this->request->getVar('nik'),
            'nama'                   => $this->request->getVar('nama'),
            'npwp'                   => $this->request->getVar('npwp'),
            'foto_npwp'               => $fotoNpwp,
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
            'updated_at'             => Time::now('Asia/Jakarta', 'en_US')
        ];

        // UPLOAD BUKTI LAINNYA OPTIONAL
        $fileBuktiLainnya = $this->request->getFile('bukti_lainnya');
        if ($fileBuktiLainnya->isValid()) {
            $buktiLainnya = $fileBuktiLainnya->getRandomName();
            $fileBuktiLainnya->move($path, $buktiLainnya);
            // HAPUS BUKTI LAINNYA LAMA
            unlink($path . $datas['bukti_lainnya']);
            $data['bukti_lainnya'] = $buktiLainnya;
        } else {
            $buktiLainnya = $datas['bukti_lainnya'];
            $data['bukti_lainnya'] = $buktiLainnya;
        }

        $this->perusahaanBlacklistModel->update($datas['id'], $data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to(base_url('backend/perusahaan_blacklist'));
    }

    // ========================= //
    // FUNCTION DETAIL
    // ========================= //
    public function detail($slug)
    {
        $data = [
            'title'                  => 'Detail User Blacklist',
            'subtitle'               => 'Detail Data User Blacklist',
            'detail_perusahaan_blacklist' => $this->perusahaanBlacklistModel->getDataBySlug($slug)
        ];
        return view('backend/perusahaan-blacklist/update', $data);
    }


    // ========================= //
    // FUNCTION VALIDATE
    // ========================= //
    public function validation($slug)
    {
        $datas = $this->perusahaanBlacklistModel->getDataBySlug($slug);

        $this->perusahaanBlacklistModel->update($datas['id'], ['valid' => true]);
        session()->setFlashdata('pesan', 'Data berhasil divalidasi');
        return redirect()->to(base_url('backend/perusahaan_blacklist'));
    }


    // ========================= //
    // FUNCTION NOT VALID
    // ========================= //
    public function tidakValid($slug)
    {
        $datas = $this->perusahaanBlacklistModel->getDataBySlug($slug);

        $this->perusahaanBlacklistModel->update($datas['id'], ['valid' => false]);
        session()->setFlashdata('pesan', 'Data tidak valid');
        return redirect()->to(base_url('backend/perusahaan_blacklist'));
    }


    // ========================= //
    // FUNCTION DELETE
    // ========================= //
    public function delete($slug)
    {
        $helper = new Helpers();
        $datas  = $this->perusahaanBlacklistModel->getDataBySlug($slug);

        // HAPUS FOLDER
        $path = 'assets/backend/images/perusahaan_blacklist/' . $slug . "/";
        if (file_exists($path)) {
            $helper->deleteDir($path);
        }

        $this->perusahaanBlacklistModel->delete($datas['id']);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('backend/perusahaan_blacklist'));
    }
}
