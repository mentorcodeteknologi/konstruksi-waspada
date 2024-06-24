<?php

namespace App\Helpers;

use CodeIgniter\Email\Email;
use CodeIgniter\API\ResponseTrait;

class Helpers
{
    use ResponseTrait;
    
    // ================================= //
    // FUNCTION GENERATE RANDOM STRING
    // ================================= //
    function generateRandomString($length = 8, $uniq)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $uniq . $randomString;
    }

    // ================================= //
    // FUNCTION GENERATE SLUG
    // ================================= //
    function generateSlug()
    {
        $characters     = 'abcdefghijklmnopqrstuvwxyz';
        $shuffled       = str_shuffle($characters);
        $slug           = substr($shuffled, 0, -25);
        $slug          .= bin2hex(random_bytes(5)) . "-e" . date('Ymdthis');
        return $slug;
    }

    // ================================= //
    // FUNCTION DELETE DIRECTORY
    // ================================= //
    function deleteDir($path)
    {
        // Cek apakah path adalah direktori
        if (!is_dir($path)) {
            return false;
        }

        // Buka direktori
        $dirHandle = opendir($path);
        if (!$dirHandle) {
            return false;
        }

        // Loop setiap file dalam direktori
        while (($file = readdir($dirHandle)) !== false) {
            if ($file != '.' && $file != '..') {
                // Jika file adalah direktori, panggil deleteDir untuk menghapusnya rekursif
                if (is_dir($path . '/' . $file)) {
                    deleteDir($path . '/' . $file);
                } else {
                    // Jika file adalah file biasa, hapus file
                    unlink($path . '/' . $file);
                }
            }
        }

        // Tutup handle direktori
        closedir($dirHandle);

        // Hapus direktori kosong
        if (rmdir($path)) {
            return true;
        } else {
            return false;
        }
    }

    // ================================= //
    // FUNCTION SEND EMAIL
    // ================================= //
    public function sendMail($recipientEmail, $encrypt)
    {
        // Mendapatkan instance Email
        $email = service('email');

        // Konfigurasi email
        $email->setFrom('test@ci4.com', 'Konstruksi Waspada');
        $email->setTo($recipientEmail);
        $email->setSubject('Email Verifikasi Konstruksi Waspada');

        // Menyisipkan pesan dengan tautan
        $pesan = 'Klik link untuk verifikasi email\\n';
        $pesan .= '<a href="' . base_url('verifyEmail/' . $encrypt) . '">' . base_url('verifyEmail/' . $encrypt) . '</a>';

        $email->setMessage($pesan);

        // Kirim email
        if ($email->send()) {
            echo 'Email berhasil dikirim.';
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }

    public function sendDataToApi($number, $message, $url, $endpoint)
    {
        $client = \Config\Services::curlrequest();

        $dataToSend = [
            'number' => $number,
            'message' => $message,
        ];
        $node = $url['url'];
        if ($url['port'] != "" || $url['port'] != null) {
            $node .= $node . ':' . $url['port'];
        }
        $jwt = $this->getToken($node, '/api/login');

        $response = $client->request('POST',$node . $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $jwt->token,
                'Content-Type' => 'application/json',
            ],
            'json' => $dataToSend,
        ]);

        if ($response->getStatusCode() == 200) {
            $responseData = $response->getBody();
            return $responseData;
        } else {
            return 'Failed to send data to API.';
        }
    }

    public function getToken($url, $endpoint)
    {
        $client = \Config\Services::curlrequest();

        $dataToSend = [
            'username' => "user",
            'password' => "password",
        ];

        $response = $client->request('POST', $url . $endpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $dataToSend,
        ]);

        if ($response->getStatusCode() == 200) {
            $responseData = $response->getBody();
            return json_decode($responseData);
        } else {
            return 'Failed to get token from API.';
        }
    }
    public function getPusherKey() {
        $data = [
            'app_id'    => "1823570",
            'key'       => "fd5523b0b2af4d2df994",
            'secret'    => "27e7998e3d3fd195bea6",
            'cluster'   => "ap1",
        ];
        return $data;
    }
}
