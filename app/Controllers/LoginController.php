<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    // Login
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login/index', $data);
    }
}
