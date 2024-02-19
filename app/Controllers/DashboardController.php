<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard/index');
    }

    public function pageNotFound()
    {
        $data = [
            'title'    => 'Page Not Found',
            'subtitle' => '404'
        ];
        return view('dashboard/page_not_found', $data);
    }
}
