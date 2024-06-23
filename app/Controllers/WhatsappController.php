<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Socket;

class WhatsappController extends BaseController
{

    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $model = new Socket();
        $data = [
            'title'     => 'Whatsapp Scan QR',
            'subtitle'  => 'Whatsapp Scan QR',
            'web'       => $model->where('remark', 'WEB')->findAll(),
            'node'      => $model->where('remark', 'NODE')->find(),
            'user'      => $model->where('remark', 'USER')->find(),
        ];
        return view('backend/whatsapp/index', $data);
    }

}
