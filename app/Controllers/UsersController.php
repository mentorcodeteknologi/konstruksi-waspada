<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Helpers\Helpers;

class UsersController extends BaseController
{


    // DEKLARASI MODEL
    protected $usersModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $data = [
            'title'     => 'Users',
            'subtitle'  => 'List Data Users',
            'list_user' => $this->usersModel->findAll()
        ];
        return view('users/index', $data);
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        $data = [
            'title'    => 'Users',
            'subtitle' => 'Tambah Data Users'
        ];
        return view('users/create', $data);
    }


    // ========================= //
    // FUNCTION CREATE USER
    // ========================= //
    public function createUser()
    {
        $helper  = new Helpers();
        $encrypt = $helper->generateRandomString(12, 'ec');
        $path    = 'assets/backend/images/profile/' . $encrypt . "/";

        // UPLOAD FOTO PROFILE
        $file = $this->request->getFile('foto');
        $foto = 'default.png';
        if ($file && $file->isValid()) {
            $foto = $file->getRandomName();

            // CEK FOLDER USER BLACKLIST
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $foto);
        }

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'id_card'    => $this->request->getVar('id_card'),
            'no_hp'      => $this->request->getVar('no_hp'),
            'email'      => $this->request->getVar('email'),
            'password'   => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'alamat'     => $this->request->getVar('alamat'),
            'role'       => $this->request->getVar('role'),
            'encrypt'    => $encrypt,
            'perusahaan' => $this->request->getVar('perusahaan'),
            'jabatan'    => $this->request->getVar('jabatan'),
            'foto'       => $foto,
            'status'     => 'active',
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('users'));
    }


    // ========================= //
    // FUNCTION UPDATE
    // ========================= //
    public function update($encrypt)
    {
        $data = [
            'title'       => 'Users',
            'subtitle'    => 'Edit Data Users',
            'detail_user' => $this->usersModel->getDataByEncrypt($encrypt)
        ];
        return view('users/update', $data);
    }


    // ========================= //
    // FUNCTION UPDATE USER
    // ========================= //
    public function updateUsers($encrypt)
    {
        $userData = $this->usersModel->getDataByEncrypt($encrypt);
        $file     = $this->request->getFile('foto');
        $path     = 'assets/backend/images/profile/' . $userData['encrypt'] . "/";

        // Cek apakah ada file yang diupload
        if ($file == "") {
            $foto = $userData['foto'];
        } else {
            // Hapus foto lama
            if ($userData['foto'] != 'default.png') {
                unlink($path . $userData['foto']);
            }

            // CEK FOLDER USER BLACKLIST
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $foto = $file->getRandomName();
            $file->move($path, $foto);
        }

        // Cek apakah password diubah
        $password = ($this->request->getVar('password') == $userData['password']) ? $userData['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'id_card'    => $this->request->getVar('id_card'),
            'no_hp'      => $this->request->getVar('no_hp'),
            'email'      => $this->request->getVar('email'),
            'password'   => $password,
            'alamat'     => $this->request->getVar('alamat'),
            'role'       => $this->request->getVar('role'),
            'perusahaan' => $this->request->getVar('perusahaan'),
            'jabatan'    => $this->request->getVar('jabatan'),
            'foto'       => $foto,
            'status'     => $this->request->getVar('status'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->update($userData['id'], $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('users');
    }


    // ========================= //
    // FUNCTION EDIT PTOFILE
    // ========================= //
    public function Edit($encrypt)
    {
        $data = [
            'title'       => 'Users',
            'subtitle'    => 'Edit Profile Users',
            'detail_user' => $this->usersModel->getDataByEncrypt($encrypt)
        ];
        return view('users/edit_profile', $data);
    }


    // ========================= //
    // FUNCTION EDIT PROFILE
    // ========================= //
    public function editProfile($encrypt)
    {
        $userData = $this->usersModel->getDataByEncrypt($encrypt);
        $file     = $this->request->getFile('foto');
        $path     = 'assets/backend/images/profile/' . $userData['encrypt'] . "/";

        // Cek apakah ada file yang diupload
        if ($file == "") {
            $foto = $userData['foto'];
        } else {
            // Hapus foto lama
            if ($userData['foto'] != 'default.png') {
                unlink($path . $userData['foto']);
            }

            // CEK FOLDER USER BLACKLIST
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $foto = $file->getRandomName();
            $file->move($path, $foto);
        }

        // Cek apakah password diubah
        $password = ($this->request->getVar('password') == $userData['password']) ? $userData['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'id_card'    => $this->request->getVar('id_card'),
            'no_hp'      => $this->request->getVar('no_hp'),
            'email'      => $this->request->getVar('email'),
            'password'   => $password,
            'alamat'     => $this->request->getVar('alamat'),
            'role'       => $this->request->getVar('role'),
            'perusahaan' => $this->request->getVar('perusahaan'),
            'jabatan'    => $this->request->getVar('jabatan'),
            'foto'       => $foto,
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->update($userData['id'], $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('users');
    }
}
