<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserBlacklistFrontendController extends BaseController
{
    // User Blacklist Front End
    public function index()
    {
        $data = [
            'title' => 'User Blacklist Form'
        ];
        return view('userblacklist_frontend/index', $data);
    }
}
