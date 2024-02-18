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
            'title'        => 'Calendar',
            'subtitle'     => 'List Data Calendar',
            'list_calendar' => $this->calendarModel->findAll()
        ];
        return view('calendar/index', $data);
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
            'tanggal_kegiatan'  => $this->request->getVar('tanggal_kegiatan'),
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
            'tanggal_kegiatan'  => $this->request->getVar('tanggal_kegiatan'),
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
}
