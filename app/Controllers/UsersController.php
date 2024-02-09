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
    public function create_user()
    {
        $helper = new Helpers();
        $data = [
            'nama'       => $this->request->getVar('nama'),
            'email'      => $this->request->getVar('email'),
            'password'   => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'       => $this->request->getVar('role'),
            'encrypt'    => $helper->generateRandomString(8, 'ec'),
            'perusahaan' => $this->request->getVar('perusahaan'),
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->insert($data);
        return redirect()->to('/users');
    }


    // ========================= //
    // FUNCTION UPDATE
    // ========================= //
    public function update($id)
    {
        $data = [
            'user' => $this->usersModel->find($id)
        ];
        return view('users/update', $data);
    }


    // ========================= //
    // FUNCTION UPDATE USER
    // ========================= //
    public function update_users($id)
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
            'encrypt' => $this->request->getVar('encrypt'),
            'perusahaan' => $this->request->getVar('perusahaan'),
        ];

        $this->usersModel->update($id, $data);
        return redirect()->to('/users');
    }


    // ========================= //
    // FUNCTION DELETE
    // ========================= //
    public function delete($id)
    {
        $this->usersModel->delete($id);
        return redirect()->to('/users');
    }
}
