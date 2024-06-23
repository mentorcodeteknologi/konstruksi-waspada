<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title'    => 'Dashboard',
            'subtitle' => 'Dashboard'
        ];
        return view('backend/dashboard/index', $data);
    }

    public function pageNotFound()
    {
        $data = [
            'title'    => 'Page Not Found',
            'subtitle' => '404'
        ];
        return view('authorize/404', $data);
    }
}
