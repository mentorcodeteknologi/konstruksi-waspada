<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class RegisterController extends BaseController
{
    // Register
    public function index()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('register/index', $data);
    }
}
