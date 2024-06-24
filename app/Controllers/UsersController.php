<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Helpers\ComponentHelpers;
use App\Models\UsersModel;
use App\Helpers\Helpers;

class UsersController extends BaseController
{


    // DEKLARASI MODEL
    protected $usersModel;
    protected $componentHelpers;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->componentHelpers = new ComponentHelpers();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {

        // $data = [
        //     'title'     => 'Users',
        //     'subtitle'  => 'List Data Users',
        //     'list_user' => $this->usersModel->findAll()
        // ];
        // return view('backend/users/index', $data);

        $list_user = $this->usersModel->findAll();
        $headers = [
            'id_card' => 'NIK/NPWP',
            'nama' => 'Nama',
            'email' => 'Email',
            'alamat' => 'Alamat',
            'no_hp' => 'No. Hp',
        ];
        $table = $this->componentHelpers->generate_table($headers, $list_user, 'users', 'encrypt');

        $data = [
            'title'     => 'Users',
            'subtitle'  => 'List Data Users',
            'table'     => $table
        ];

        return view('backend/users/index', $data);
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        $data = [
            'title'    => 'Users',
            'subtitle' => 'Tambah Data User'
        ];
        return view('backend/users/create', $data);
    }


    // ========================= //
    // FUNCTION CREATE USER
    // ========================= //
    public function createUser()
    {
        try {
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

            // VALIDASI EMAIL DAN NO WA SUDAH TERDAFTAR ATAU BELUM
            $email = $this->request->getVar('email');
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                session()->setFlashdata('failed', 'Email tidak valid');
                return redirect()->to(base_url('users'));
            }
            $noHp  = $this->request->getVar('no_hp');
            $check = $this->usersModel->checkExist($email, $noHp);
            if ($check) {
                if ($check['email'] == $email) {
                    $pesan = "Email sudah terdaftar";
                }

                if ($check['no_hp'] == $noHp) {
                    $pesan = "No Hp sudah terdaftar";
                }

                session()->setFlashdata('failed', $pesan);
                return redirect()->to(base_url('users'));
            }
            
            $data = [
                'nama'                => $this->request->getVar('nama'),
                'id_card'             => $this->request->getVar('id_card'),
                'no_hp'               => $noHp,
                'email'               => $email,
                'password'            => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'alamat'              => $this->request->getVar('alamat'),
                'role'                => $this->request->getVar('role'),
                'encrypt'             => $encrypt,
                'perusahaan'          => $this->request->getVar('perusahaan'),
                'jabatan'             => $this->request->getVar('jabatan'),
                'foto'                => $foto,
                'status'              => 'active',
                ' is_veryfied_email'  => 1,
                'created_at'          => Time::now('Asia/Jakarta', 'en_US'),
                'updated_at'          => Time::now('Asia/Jakarta', 'en_US')
            ];

            $this->usersModel->insert($data);
            // $this->customHelpers->sendMail($data['email'], $encrypt);
            session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
            return redirect()->to(base_url('backend/users'));
        } catch (\Throwable $th) {
            //throw $th;
            session()->setFlashdata('pesan', $th->getMessage());
            return redirect()->to(base_url('backend/users'));
        }
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
        return view('backend/users/update', $data);
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

        $email    = $this->request->getVar('email');
        $noHp     = $this->request->getVar('no_hp');
        $oldEmail = $userData['email'];
        $oldNoHp  = $userData['no_hp'];
        $status   = $this->request->getVar('status');

        // APAKAH ADA PERUBAHAN EMAIL
        if ($email != $oldEmail) {
            // VALIDASI EMAIL DAN NO WA SUDAH TERDAFTAR ATAU BELUM
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                session()->setFlashdata('failed', 'Email tidak valid');
                return redirect()->to(base_url('backend/users'));
            }

            // VALIDASI EMAIL SUDAH TERDAFTAR ATAU BELUM
            $check = $this->usersModel->checkEmailExist($email);
            if ($check) {
                session()->setFlashdata('failed', "Email sudah terdaftar pada akun lain");
                return redirect()->to(base_url('backend/users'));
            }
        }

        // APAKAH ADA PERUBAHAN NO HP
        if ($noHp != $oldNoHp) {
            // VALIDASI NO HP SUDAH TERDAFTAR ATAU BELUM
            $check = $this->usersModel->checkNoHpExist($noHp);
            if ($check) {
                session()->setFlashdata('failed', "No Hp sudah terdaftar pada akun lain");
                return redirect()->to(base_url('backend/users'));
            }
        }
        
        $password = $this->request->getVar('password');
        // Cek apakah password diubah
        if ($password != null || $password != '') {
            $password = ($password == $userData['password']) ? $userData['password'] : password_hash($password, PASSWORD_DEFAULT);
        }

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'id_card'    => $this->request->getVar('id_card'),
            'no_hp'      => $noHp,
            'email'      => $email,
            'alamat'     => $this->request->getVar('alamat'),
            'role'       => $this->request->getVar('role'),
            'perusahaan' => $this->request->getVar('perusahaan'),
            'jabatan'    => $this->request->getVar('jabatan'),
            'foto'       => $foto,
            'status'     => $status == "1" ? 'active' : 'nonactive',
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        if ($password != null || $password != '') $data['password'] = $password;

        $this->usersModel->update($userData['id'], $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('backend/users');
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
        return view('backend/users/edit_profile', $data);
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

        $email    = $this->request->getVar('email');
        $noHp     = $this->request->getVar('no_hp');
        $oldEmail = $userData['email'];
        $oldNoHp  = $userData['no_hp'];

        // APAKAH ADA PERUBAHAN EMAIL
        if ($email != $oldEmail) {
            // VALIDASI EMAIL DAN NO WA SUDAH TERDAFTAR ATAU BELUM
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                session()->setFlashdata('failed', 'Email tidak valid');
                return redirect()->to(base_url('backend/users'));
            }

            // VALIDASI EMAIL SUDAH TERDAFTAR ATAU BELUM
            $check = $this->usersModel->checkEmailExist($email);
            if ($check) {
                session()->setFlashdata('failed', "Email sudah terdaftar pada akun lain");
                return redirect()->to(base_url('backend/users'));
            }
        }

        // APAKAH ADA PERUBAHAN NO HP
        if ($noHp != $oldNoHp) {
            // VALIDASI NO HP SUDAH TERDAFTAR ATAU BELUM
            $check = $this->usersModel->checkNoHpExist($noHp);
            if ($check) {
                session()->setFlashdata('failed', "No Hp sudah terdaftar pada akun lain");
                return redirect()->to(base_url('backend/users'));
            }
        }

        // Cek apakah password diubah
        $password = ($this->request->getVar('password') == $userData['password']) ? $userData['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $data = [
            'nama'       => $this->request->getVar('nama'),
            'id_card'    => $this->request->getVar('id_card'),
            'no_hp'      => $noHp,
            'email'      => $email,
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
        return redirect()->to('backend/users');
    }
}
