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
            'title' => 'Login',
            'footerPopularArtikel' => $this->getPopularArticles(5),
            'footerRecentArtikel' => $this->getRecentArticles(5),
        ];
        return view('auth/login', $data);
    }


    // ========================= //
    // FUNCTION INDEX REGISTER
    // ========================= //
    public function indexRegister()
    {
        $data = [
            'title' => 'Register',
            'footerPopularArtikel' => $this->getPopularArticles(5),
            'footerRecentArtikel' => $this->getRecentArticles(5),
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

        // CHECK VERIFIKASI EMAIL
        if ($userDatas['is_veryfied_email'] == '0') {
            $session->setFlashdata('pesan', 'Email belum terverifikasi, Silahkan periksa kotak masuk pada email yang di daftarkan!');
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

        if ($userDatas['role'] == "admin") {
            $session->set($session_data);
            return redirect()->to(base_url('dashboard'));
        }
        $code = rand(100000, 999999);

        $datePlus = date("c", strtotime('now +5 minutes'));
        $exp      = date("Y-m-d H:i:s", strtotime($datePlus));
        // INSERT OTP
        $this->otpModel->insert([
            'kode'       => $code,
            'type'       => 'login',
            'expired_at' => $exp,
            'id_user'    => $userDatas['id'],
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ]);
        $helper  = new Helpers();
        $helper->sendDataToApi($userDatas['no_hp'], "Masukan OTP : $code", 'http://localhost:3000/api/send-message');
        $session->set($session_data);
        $session->setFlashdata('success', 'Silahkan masukkan kode OTP yang dikirim ke Whatsapp yang didaftarkan!');
        return redirect()->to(base_url('otp'));
    }


    // ========================= //
    // FUNCTION OTP
    // ========================= //
    public function otp()
    {
        $data = [
            'title' => 'OTP',
            'footerRecentArtikel' => $this->getRecentArticles(5),
        ];
        return view('auth/otp', $data);
    }


    // ========================= //
    // FUNCTION VERIFY OTP LOGIN
    // ========================= //
    public function verifyOtpLogin($encrypt)
    {
        $session = session();
        // VALIDATION ENCRYPT USER
        $userData = $this->usersModel->getDataByEncrypt($encrypt);
        if (empty($userData)) {
            return redirect()->to(base_url('login'));
        }

        // VALIDATION KODE
        $kode          = $this->request->getVar('kode');
        $validationOtp = $this->otpModel->validationOtp($userData['id'], $kode);
        if (empty($validationOtp)) {
            $session->setFlashdata('pesan', 'OTP Expired silahkan login kembali!');
            return redirect()->to(base_url('login'));
        }

        // DELETE OTP ON DATABASE
        $this->otpModel->delete($validationOtp['id']);
        return redirect()->to(base_url('dashboard'));
    }

    // ========================= //
    // FUNCTION VERIFY OTP LOGIN
    // ========================= //
    public function verifyEmail($encrypt)
    {
        $session   = session();
        // VALIDATION ENCRYPT USER
        $userData = $this->usersModel->getDataByEncrypt($encrypt);
        if (empty($userData)) {
            $session->setFlashdata('pesan', 'Email verifikasi tidak ditemukan');
            return redirect()->to(base_url('login'));
        }

        if ($userData['is_veryfied_email'] == '1') {
            $session->setFlashdata('pesan', 'Email sudah terverifikasi, Silahkan Login');
            return redirect()->to(base_url('login'));
        }
        try {
            $data = ['is_veryfied_email' => true];

            $this->usersModel->update($userData['id'], $data);
            $session->setFlashdata('success', 'Email berhasil diverifikasi!, Silahkan login kembali');
            return redirect()->to(base_url('login'));
        } catch (\Throwable $th) {
            //throw $th;
            $session->setFlashdata('pesan', $th->getMessage());
            return redirect()->to(base_url('login'));
        }
    }


    // ========================= //
    // FUNCTION AUTH REGISTER
    // ========================= //
    public function register()
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
        $email = $this->request->getVar('email');
        $data = [
            'nama'       => $this->request->getVar('nama'),
            'id_card'    => $this->request->getVar('id_card'),
            'no_hp'      => $this->request->getVar('no_hp'),
            'email'      => $email,
            'password'   => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'alamat'     => $this->request->getVar('alamat'),
            'role'       => 'users',
            'encrypt'    => $encrypt,
            'perusahaan' => $this->request->getVar('perusahaan'),
            'jabatan'    => $this->request->getVar('jabatan'),
            'foto'       => $foto,
            'status'     => 'non_active',
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->insert($data);
        $helper->sendMail($email, $encrypt);
        return redirect()->to(base_url('login'))->with('success', 'Silahkan lakukan verifikasi email!, Periksa pada kotak masuk pada email yang didaftarkan!');
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
