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
}
