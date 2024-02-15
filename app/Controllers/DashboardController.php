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
        return view('dashboard/page_not_found');
    }
}
