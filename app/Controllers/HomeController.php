<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use CodeIgniter\I18n\Time;

class HomeController extends BaseController
{
    // DEKLARASI MODEL
    protected $artikelModel;
    protected $categoryModel;
    protected $commentModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->categoryModel = new CategoryModel();
        $this->commentModel = new CommentModel();
    }

    // Home
    public function index()
    {
        $category = $this->request->getGet('category');

        if ($category) {
            $artikel = $this->artikelModel->getArtikelByCategory($category);
        } else {
            $artikel = $this->artikelModel->findAllData();
        }
        $data = [
            'title' => 'Blog',
            'artikel' => $artikel->paginate(10, 'artikel'),
            'pager' => $artikel->pager,
            'kategoriArtikel' => $this->categoryModel->getArticleCountByCategory(),
            'recentArtikel' => $this->artikelModel->getOrderArticle('created_at', 'desc'),
            'popularArtikel' => $this->artikelModel->getOrderArticle('views', 'desc'),
            'footerPopularArtikel' => $this->getPopularArticles(5),
            'footerRecentArtikel' => $this->getRecentArticles(5),
        ];
        return view('new_ui_frontend/blog_new/index', $data);
    }

    //Blog Details
    public function blog_details($slug)
    {

        $data = [
            'title' => 'Blog Detail',
            'detail_artikel' => $this->artikelModel->getDataBySlug($slug),
            'comments' => $this->commentModel->getDataBySlug($slug),
            'footerPopularArtikel' => $this->getPopularArticles(5),
            'footerRecentArtikel' => $this->getRecentArticles(5),
        ];
        return view('new_ui_frontend/blog_new/blog_details', $data);
    }

    //Blog Details
    public function blog_comment($slug)
    {
        $session = session();
        $data = [
            'id_user'    => $session->get('id'),
            'slug'       => $slug,
            'comment'    => $this->request->getVar('comment'),
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];
        $this->commentModel->insert($data);
        return redirect()->to(base_url("blog_details/$slug"));
    }
    function map()
    {
        return view('map/index');
    }
}
