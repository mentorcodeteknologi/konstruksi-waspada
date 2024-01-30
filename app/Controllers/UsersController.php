<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{

    // DEKLARASI MODEL
    protected $usersModel;


    // FUNCTION CONSTRUCTOR
    public function __construct()
    {
        // MENGGUNAKAN MODEL
        $this->usersModel = new UsersModel();
    }


    public function index()
    {
        return view('users/index');
    }
}
