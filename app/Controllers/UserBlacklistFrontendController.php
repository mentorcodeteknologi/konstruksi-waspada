<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserBlacklistModel;

class UserBlacklistFrontendController extends BaseController
{
    // Deklarasi Model
    protected $userBlacklistModel;

    // Function Construct
    public function __construct()
    {
        $this->userBlacklistModel = new UserBlacklistModel();
    }

    // User Blacklist Front End
    public function index()
    {
        $data = [
            'title' => 'User Blacklist',
            'user' =>  $this->userBlacklistModel->findAll()
        ];
        return view('user_blacklist_frontend/index', $data);
    }
}
