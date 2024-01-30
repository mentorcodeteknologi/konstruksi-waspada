<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserBacklistController extends BaseController
{
    public function index()
    {
        $data = [
            'title'         => 'User Backlist',
            'subtitle'      => 'User Backlist',
            'user_backlist' => $this->userBacklistModel->findAll()
        ];
        return view('user_backlist/index', $data);
    }
}
