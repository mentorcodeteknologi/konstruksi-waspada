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
        return view('backend/calendar/index', $data);
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
        return view('new_ui_frontend/calendar/index', $data);
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
    // public function createCalendar()
    // {
    //     $session = session();
    //     $data = [
    //         'nama_kegiatan'     => $this->request->getVar('nama_kegiatan'),
    //         'id_user'           => $session->get('id'),
    //         'tanggal_mulai'     => $this->request->getVar('tanggal_mulai'),
    //         'tanggal_selesai'   => $this->request->getVar('tanggal_selesai'),
    //         'created_at'        => Time::now('Asia/Jakarta', 'en_US'),
    //         'updated_at'        => Time::now('Asia/Jakarta', 'en_US')
    //     ];
    //     $calendar = $this->calendarModel->insert($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
    //     return redirect()->to(base_url('calendar'));
    // }


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
    // public function updateCalendar($id)
    // {
    //     $session = session();
    //     $CalendarData = $this->calendarModel->getDataBySlug(base64_decode($id));

    //     $data = [
    //         'nama_kegiatan'     => $this->request->getVar('nama_kegiatan'),
    //         'id_user'           => $session->get('id'),
    //         'tanggal_mulai'     => $this->request->getVar('tanggal_mulai'),
    //         'tanggal_selesai'   => $this->request->getVar('tanggal_selesai'),
    //         'created_at'        => Time::now('Asia/Jakarta', 'en_US'),
    //         'updated_at'        => Time::now('Asia/Jakarta', 'en_US')
    //     ];

    //     $this->calendarModel->update($CalendarData['id'], $data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Diubah');
    //     return redirect()->to(base_url('calendar'));
    // }


    // ========================= //
    // FUNCTION DELETE
    // ========================= //
    // public function delete($id)
    // {
    //     $CalendarData = $this->calendarModel->getDataBySlug(base64_decode($id));

    //     $this->calendarModel->delete($CalendarData['id']);
    //     session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
    //     return redirect()->to(base_url('calendar'));
    // }

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
                'end' => $event['tanggal_selesai'],
                'extendedProps' => [
                    'calendar' => $event['priority'],
                ]
            ];
        }

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($data);
    }
    // ========================= //
    // FUNCTION CREATE Calendar
    // ========================= //
    public function createCalendar()
    {
        try {

            $data = [
                'nama_kegiatan'     => $this->request->getVar('nama_kegiatan'),
                'id_user'           => $this->request->getVar('id_user'),
                'tanggal_mulai'     => $this->request->getVar('tanggal_mulai'),
                'tanggal_selesai'   => $this->request->getVar('tanggal_selesai'),
                'priority'          => $this->request->getVar('priority'),
                'created_at'        => Time::now('Asia/Jakarta', 'en_US'),
                'updated_at'        => Time::now('Asia/Jakarta', 'en_US')
            ];
            $this->calendarModel->insert($data);
            $response = [
                'status' => 200,
                'pesan'  => 'Data berhasil ditambahkan!',
                'data'   => $data
            ];
            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'pesan'  => 'Terjadi kesalahan saat menambahkan data!',
                'error'  => $e->getMessage()
            ];
            return $this->response->setJSON($response);
        }
    }
    // ========================= //
    // FUNCTION UPDATE USER
    // ========================= //
    public function updateCalendar($idEvent)
    {

        try {

            $CalendarData = $this->calendarModel->getDataBySlug(base64_decode($idEvent));

            $data = [
                'nama_kegiatan'     => $this->request->getVar('nama_kegiatan'),
                'id_user'           => $this->request->getVar('id_user'),
                'tanggal_mulai'     => $this->request->getVar('tanggal_mulai'),
                'tanggal_selesai'   => $this->request->getVar('tanggal_selesai'),
                'priority'          => $this->request->getVar('priority'),
                'created_at'        => Time::now('Asia/Jakarta', 'en_US'),
                'updated_at'        => Time::now('Asia/Jakarta', 'en_US')
            ];
            $this->calendarModel->update($CalendarData['id'], $data);
            $response = [
                'status' => 200,
                'pesan'  => 'Data berhasil diubah!',
                'data'   => $data
            ];
            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'pesan'  => 'Terjadi kesalahan saat update data!',
                'error'  => $e->getMessage()
            ];
            return $this->response->setJSON($response);
        }
    }
    // ========================= //
    // FUNCTION DELETE
    // ========================= //
    public function delete($id)
    {
        try {
            $data = $this->calendarModel->getDataBySlug(base64_decode($id));

            $this->calendarModel->delete($data['id']);
            $response = [
                'status' => 200,
                'pesan'  => 'Data berhasil dihapus!',
                'data'   => $data
            ];
            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'pesan'  => 'Terjadi kesalahan saat hapus data!',
                'error'  => $e->getMessage()
            ];
            return $this->response->setJSON($response);
        }
    }
}
