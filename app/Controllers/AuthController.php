<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\Helpers;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class AuthController extends BaseController
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
    // FUNCTION INDEX LOGIN
    // ========================= //
    public function indexLogin()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login/index', $data);
    }


    // ========================= //
    // FUNCTION INDEX REGISTER
    // ========================= //
    public function indexRegister()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('register/index', $data);
    }


    // ========================= //
    // FUNCTION LOGIN
    // ========================= //
    public function login()
    {
        $session   = session();
        $email     = $this->request->getVar('email');
        $password  = $this->request->getVar('password');
        $userDatas = $this->usersModel->checkLogin($email, $password);

        // CHECK LOGIN GAGAL
        if (!$userDatas) {
            $session->setFlashdata('pesan', 'Email dan password salah');
            return redirect()->to(base_url('login'));
        }

        $session_data = [
            'id'        => $userDatas['id'],
            'nama'      => $userDatas['nama'],
            'email'     => $userDatas['email'],
            'password'  => $userDatas['password'],
            'role'      => $userDatas['role'],
            'foto'      => $userDatas['foto'],
            'encrypt'   => $userDatas['encrypt'],
            'status'    => $userDatas['status'],
            'logged_in' => true
        ];
        $session->set($session_data);
        return redirect()->to(base_url('dashboard'));
    }


    // ========================= //
    // FUNCTION AUTH REGISTER
    // ========================= //
    public function authRegister()
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
            'role'       => 'user',
            'status'     => 'nonaktif',
            'encrypt'    => $helper->generateRandomString(12, 'ec'),
            'foto'       => $foto,
            'perusahaan' => $this->request->getVar('perusahaan'),
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->insert($data);
        return redirect()->to(base_url('dashboard'));
    }


    // ========================= //
    // FUNCTION LOGOUT
    // ========================= //
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
