<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AlatHilangController extends BaseController
{
    // Alat Hilang Front End
    public function index()
    {
        $data = [
            'title' => 'Alat Hilang'
        ];
        return view('alathilang/index', $data);
    }
}
