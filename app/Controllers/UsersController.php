<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

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
        return view('users/index');
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        return view('users/create');
    }


    // ========================= //
    // FUNCTION CREATE USER
    // ========================= //
    public function create_user()
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
            'encrypt' => $this->request->getVar('encrypt'),
            'perusahaan' => $this->request->getVar('perusahaan'),
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
