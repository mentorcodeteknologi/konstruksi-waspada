<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\Helpers;
use App\Models\UsersModel;
use App\Models\OtpModel;
use CodeIgniter\I18n\Time;

class AuthController extends BaseController
{


    // DEKLARASI MODEL
    protected $usersModel;
    protected $otpModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->otpModel   = new OtpModel();
    }


    // ========================= //
    // FUNCTION INDEX LOGIN
    // ========================= //
    public function indexLogin()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }


    // ========================= //
    // FUNCTION INDEX REGISTER
    // ========================= //
    public function indexRegister()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('auth/register', $data);
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
            'id'                => $userDatas['id'],
            'nama'              => $userDatas['nama'],
            'email'             => $userDatas['email'],
            'role'              => $userDatas['role'],
            'foto'              => $userDatas['foto'],
            'encrypt'           => $userDatas['encrypt'],
            'status'            => $userDatas['status'],
            'is_veryfied_email' => $userDatas['is_veryfied_email'],
            'logged_in'         => true
        ];

        $code = rand(100000, 999999);

        $datePlus = date("c", strtotime('now +5 minutes'));
        $exp      = strtotime($datePlus);

        // INSERT OTP
        $this->otpModel->insert([
            'kode'       => $code,
            'type'       => 'login',
            'expired_at' => $exp,
            'id_user'    => $userDatas['id'],
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ]);

        $session->set($session_data);
        $session->setFlashdata('pesan', 'Silahkan masukkan kode OTP yang dikirim ke email anda');
        return redirect()->to(base_url('dashboard'));
    }

    // ========================= //
    // FUNCTION VERIFY OTP LOGIN
    // ========================= //
    public function verifyOtpLogin($encrypt)
    {
        // VALIDATION ENCRYPT USER
        $userData = $this->usersModel->getDataByEncrypt($encrypt);
        if (empty($userData)) {
            return redirect()->to(base_url('login'));
        }

        // VALIDATION KODE
        $kode          = $this->request->getVar('kode');
        $validationOtp = $this->otpModel->validationOtp($encrypt, $kode);
        if (empty($validationOtp)) {
            return redirect()->to(base_url('login'));
        }

        // DELETE OTP ON DATABASE
        $this->otpModel->delete($validationOtp['id']);
    }


    // ========================= //
    // FUNCTION AUTH REGISTER
    // ========================= //
    public function register()
    {
        $helper  = new Helpers();
        $encrypt = $helper->generateRandomString(12, 'ec');

        // UPLOAD FOTO PROFILE
        $file = $this->request->getFile('foto');
        $foto = 'default.png';
        if ($file && $file->isValid()) {
            $foto = $file->getRandomName();
            $file->move('assets/backend/images/profile/' . $encrypt . "/", $foto);
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
            'status'     => 'non_active',
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
