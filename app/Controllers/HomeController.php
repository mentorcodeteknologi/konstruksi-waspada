<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    // Home
    public function index()
    {
        $data = [
            'title' => 'Homepage'
        ];
        return view('home/index', $data);
    }
}
