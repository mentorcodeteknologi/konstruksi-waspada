<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;

class HomeController extends BaseController
{
    // DEKLARASI MODEL
    protected $artikelModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    // Home
    public function index()
    {
        $data = [
            'title' => 'Blog',
            'artikel' => $this->artikelModel->findAll(),
            'recentArtikel' => $this->artikelModel->getRecentArticles(),
        ];
        return view('home/index', $data);
    }

    //Blog Details
    public function blog_details($slug)
    {
        $data = [
            'title' => 'Blog Detail',
            'detail_artikel' => $this->artikelModel->getDataBySlug($slug)
        ];
        return view('home/blog_details', $data);
    }
}
