<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\CalendarModel;
use App\Helpers\Helpers;

class CalendarController extends BaseController
{


    // DEKLARASI MODEL
    protected $calendarModel;


    // ========================= //
    // FUNCTION CONSTRUCTOR
    // ========================= //
    public function __construct()
    {
        $this->calendarModel = new CalendarModel();
    }


    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $data = [
            'title'        => 'Kalender',
            'subtitle'     => 'List Data Kalender',
            'list_calendar' => $this->calendarModel->findAll(),
        ];
        return view('calendar/index', $data);
    }

    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function indexFront()
    {
        $data = [
            'title'        => 'Kalender',
            'footerPopularArtikel' => $this->getPopularArticles(5),
            'footerRecentArtikel' => $this->getRecentArticles(5),
        ];
        return view('calendar/indexFront', $data);
    }


    // ========================= //
    // FUNCTION CREATE
    // ========================= //
    public function create()
    {
        $data = [
            'title'    => 'Calendar',
            'subtitle' => 'Tambah Data Calendar'
        ];
        return view('calendar/create', $data);
    }


    // ========================= //
    // FUNCTION CREATE Calendar
    // ========================= //
    public function createCalendar()
    {
        $session = session();
        $data = [
            'nama_kegiatan'     => $this->request->getVar('nama_kegiatan'),
            'id_user'           => $session->get('id'),
            'tanggal_mulai'  => $this->request->getVar('tanggal_mulai'),
            'tanggal_selesai'  => $this->request->getVar('tanggal_selesai'),
            'created_at'        => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'        => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->calendarModel->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('calendar'));
    }


    // ========================= //
    // FUNCTION UPDATE
    // ========================= //
    public function update($id)
    {
        $data = [
            'title'          => 'Calendar',
            'subtitle'       => 'Edit Data Calendar',
            'detail_calendar' => $this->calendarModel->getDataBySlug(base64_decode($id)),
        ];
        return view('calendar/update', $data);
    }


    // ========================= //
    // FUNCTION UPDATE USER
    // ========================= //
    public function updateCalendar($id)
    {
        $session = session();
        $CalendarData = $this->calendarModel->getDataBySlug(base64_decode($id));

        $data = [
            'nama_kegiatan'     => $this->request->getVar('nama_kegiatan'),
            'id_user'           => $session->get('id'),
            'tanggal_mulai'     => $this->request->getVar('tanggal_mulai'),
            'tanggal_selesai'   => $this->request->getVar('tanggal_selesai'),
            'created_at'        => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'        => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->calendarModel->update($CalendarData['id'], $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('calendar'));
    }


    // ========================= //
    // FUNCTION DELETE
    // ========================= //
    public function delete($id)
    {
        $CalendarData = $this->calendarModel->getDataBySlug(base64_decode($id));

        $this->calendarModel->delete($CalendarData['id']);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('calendar'));
    }

    public function calendar_data()
    {
        // Instance dari model EventModel untuk mengakses database
        $model = new CalendarModel();

        // Ambil data acara dari database
        $events = $model->findAll();

        // Format data dalam bentuk JSON
        $data = [];
        foreach ($events as $event) {
            $data[] = [
                'id' => $event['id'],
                'title' => $event['nama_kegiatan'],
                'start' => $event['tanggal_mulai'],
                'end' => $event['tanggal_selesai']
            ];
        }

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($data);
    }
}
