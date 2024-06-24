<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\Helpers;
use App\Models\UsersModel;
use App\Models\OtpModel;
use App\Models\Socket;
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
            'title'                => 'Login',
            'footerPopularArtikel' => $this->getPopularArticles(5),
            'footerRecentArtikel'  => $this->getRecentArticles(5),
        ];
        return view('authorize/login', $data);
    }


    // ========================= //
    // FUNCTION INDEX REGISTER
    // ========================= //
    public function indexRegister()
    {
        $data = [
            'title'                => 'Register',
            'footerPopularArtikel' => $this->getPopularArticles(5),
            'footerRecentArtikel'  => $this->getRecentArticles(5),
        ];
        return view('authorize/register', $data);
    }


    // ========================= //
    // FUNCTION LOGIN
    // ========================= //
    public function login()
    {
        $email     = $this->request->getVar('email');
        $password  = $this->request->getVar('password');
        $userDatas = $this->usersModel->checkLogin($email, $password);

        // CHECK LOGIN GAGAL
        if (!$userDatas) {
            session()->setFlashdata('pesan', 'Email dan password salah');
            return redirect()->to(base_url('login'));
        }
        $userDatas['logged_in'] = true;
        session()->set($userDatas);
        // CHECK VERIFIKASI EMAIL
        if ($userDatas['is_veryfied_otp'] == '0') {
            $helper  = new Helpers();
            $code     = rand(100000, 999999);
            $datePlus = date("c", strtotime('now +5 minutes'));
            $exp      = date("Y-m-d H:i:s", strtotime($datePlus));

            // INSERT OTP TO DATABASE
            $this->otpModel->insert([
                'kode'       => $code,
                'type'       => 'login',
                'expired_at' => $exp,
                'id_user'    => $userDatas['id'],
                'created_at' => Time::now('Asia/Jakarta', 'en_US'),
                'updated_at' => Time::now('Asia/Jakarta', 'en_US')
            ]);
            $model  = new Socket();
            $socket = $model->where('remark', 'NODE')->first();
            
            $helper->sendDataToApi($userDatas['no_hp'], "Masukan OTP : $code", $socket, '/api/send-message');
            return redirect()->to(base_url('otp'))->with('success', 'Silahkan masukkan kode OTP yang dikirim ke Whatsapp yang didaftarkan!');
        }

        // $sessionData = [
        //     'id'                => $userDatas['id'],
        //     'nama'              => $userDatas['nama'],
        //     'email'             => $userDatas['email'],
        //     'role'              => $userDatas['role'],
        //     'foto'              => $userDatas['foto'],
        //     'encrypt'           => $userDatas['encrypt'],
        //     'status'            => $userDatas['status'],
        //     'is_veryfied_email' => $userDatas['is_veryfied_email'],
        //     'logged_in'         => true
        // ];
        

        // CHECK ROLE ADMIN REDIRECT TO DASHBOARD
        // if ($userDatas['role'] == "admin") {
        // }
        return redirect()->to(base_url('backend/dashboard'));

        // session()->set($userDatas);
        // session()->setFlashdata('success', 'Silahkan masukkan kode OTP yang dikirim ke Whatsapp yang didaftarkan!');
        // return redirect()->to(base_url('backend/dashboard'));
    }


    // ========================= //
    // FUNCTION OTP
    // ========================= //
    public function otp()
    {
        $data = [
            'title'                 => 'OTP',
            'footerRecentArtikel'   => $this->getRecentArticles(5),
            'footerPopularArtikel'  => $this->getPopularArticles(5),

        ];
        return view('authorize/otp', $data);
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
        $validationOtp = $this->otpModel->validationOtp($userData['id'], $kode);
        if (empty($validationOtp)) {
           
            session()->setFlashdata('pesan', 'OTP Expired silahkan login kembali!');
            return redirect()->to(base_url('login'));
        }

        $data = ['is_veryfied_otp' => true];
        $this->usersModel->update($userData['id'], $data);
        // DELETE OTP ON DATABASE
        
        $this->otpModel->delete($validationOtp['id']);
        return redirect()->to(base_url('dashboard'));
    }

    // ========================= //
    // FUNCTION VERIFY OTP LOGIN
    // ========================= //
    public function verifyEmail($encrypt)
    {
        // VALIDATION ENCRYPT USER
        $userData = $this->usersModel->getDataByEncrypt($encrypt);
        if (empty($userData)) {
            session()->setFlashdata('pesan', 'Email verifikasi tidak ditemukan');
            return redirect()->to(base_url('login'));
        }

        if ($userData['is_veryfied_email'] == '1') {
            session()->setFlashdata('pesan', 'Email sudah terverifikasi, Silahkan Login');
            return redirect()->to(base_url('login'));
        }

        try {
            $data = ['is_veryfied_email' => true];

            $this->usersModel->update($userData['id'], $data);
            session()->setFlashdata('success', 'Email berhasil diverifikasi!, Silahkan login kembali');
            return redirect()->to(base_url('login'));
        } catch (\Throwable $th) {
            session()->setFlashdata('pesan', $th->getMessage());
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
        // VALIDASI EMAIL DAN NO WA SUDAH TERDAFTAR ATAU BELUM
        $email = $this->request->getVar('email');
        $noHp  = $this->request->getVar('no_hp');
        $check = $this->usersModel->checkExist($email, $noHp);
        if ($check) {
            $pesan = "";
            if ($check['email'] == $email) {
                $pesan .= "Email sudah terdaftar";
            }
            if ($check['no_hp'] == $noHp) {
                $pesan .= "No Hp sudah terdaftar";
            }
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to(base_url('register'));
        }

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
        $password = $this->request->getVar('password');

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'id_card'    => $this->request->getVar('id_card'),
            'no_hp'      => $noHp,
            'email'      => $email,
            'password'   => password_hash($password, PASSWORD_DEFAULT),
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

        $user = $this->usersModel->insert($data);
        $userDatas = $this->usersModel->checkLogin($email, $password);
        $userDatas['logged_in'] = true;
        session()->set($userDatas);
        $helper->sendMail($email, $encrypt);

        $code     = rand(100000, 999999);
        $datePlus = date("c", strtotime('now +5 minutes'));
        $exp      = date("Y-m-d H:i:s", strtotime($datePlus));

        // INSERT OTP TO DATABASE
        $this->otpModel->insert([
            'kode'       => $code,
            'type'       => 'login',
            'expired_at' => $exp,
            'id_user'    => $user,
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ]);
        $model  = new Socket();
        $socket = $model->where('remark', 'NODE')->first();
        $helper->sendDataToApi($noHp, "Masukan OTP : $code", $socket['url'], 'api/send-message');
        return redirect()->to(base_url('otp'))->with('success', 'Silahkan masukkan kode OTP yang dikirim ke Whatsapp yang didaftarkan!');
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
