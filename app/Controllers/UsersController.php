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
        $helper = new Helpers();

        // UPLOAD FOTO PROFILE
        $file = $this->request->getFile('foto');
        $foto = 'default.png';
        if ($file && $file->isValid()) {
            $foto = $file->getRandomName();
            $file->move('assets/backend/images/', $foto);
        }

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'email'      => $this->request->getVar('email'),
            'password'   => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'       => $this->request->getVar('role'),
            'status'     => 'active',
            'encrypt'    => $helper->generateRandomString(12, 'ec'),
            'foto'       => $foto,
            'perusahaan' => $this->request->getVar('perusahaan'),
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

        // Cek apakah ada file yang diupload
        if ($file == "") {
            $foto = $userData['foto'];
        } else {
            // Hapus foto lama
            if ($userData['foto'] != 'default.png') {
                unlink('assets/backend/images/' . $userData['foto']);
            }
            $foto = $file->getRandomName();
            $file->move('assets/backend/images/', $foto);
        }

        // Cek apakah password diubah
        $password = ($this->request->getVar('password') == $userData['password']) ? $userData['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'email'      => $this->request->getVar('email'),
            'password'   => $password,
            'role'       => $this->request->getVar('role'),
            'status'     => $this->request->getVar('status'),
            'perusahaan' => $this->request->getVar('perusahaan'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->update($encrypt, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('users');
    }
}
