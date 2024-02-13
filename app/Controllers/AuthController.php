<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\Helpers;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class AuthController extends BaseController
{
    // DEKLARASI MODEL
    protected $usersModel;

    //Function Construct
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    // View Login
    public function indexLogin()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login/index', $data);
    }

    // View Register
    public function indexRegister()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('register/index', $data);
    }

    // Auth Login - Login process
    public function authLogin()
    {
        $session = session();
        $usersModel = new UsersModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $usersModel->where('email', $email)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session_data = [
                    'id' => $user['id'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'role' => $user['role'],
                    'foto' => $user['foto'],
                    'encrypt' => $user['encrypt'],
                    'status' => $user['status'],
                    'logged_in' => true
                ];
                $session->set($session_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('LoginFailed', 'Login failed');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('LoginFailed', 'Login failed');
            return redirect()->to('/login');
        }
    }

    // Auth Register - Register Proses
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
            'role'       => $this->request->getVar('role'),
            'status'     => 'active',
            'encrypt'    => $helper->generateRandomString(12, 'ec'),
            'foto'       => $foto,
            'perusahaan' => $this->request->getVar('perusahaan'),
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->insert($data);
        session()->setFlashdata('success', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('register'));
    }

    // Auth Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
