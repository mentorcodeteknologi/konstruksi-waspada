<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\AlatHilangModel;

class AlatHilangFrontendController extends BaseController
{

    // DEKLARASI MODEL
    // protected $alatHilangModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        // $this->alatHilangModel = new AlatHilangModel();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $data = [
            'title' => 'Alat Hilang'
        ];
        return view('alat_hilang_frontend/index', $data);
    }
}
