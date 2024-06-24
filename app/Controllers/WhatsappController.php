<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\Helpers;
use App\Models\Socket;

class WhatsappController extends BaseController
{

    // ========================= //
    // FUNCTION INDEX
    // ========================= //
    public function index()
    {
        $model = new Socket();
        $helpers = new Helpers();
        $data = [
            'title'     => 'Whatsapp Scan QR',
            'subtitle'  => 'Whatsapp Scan QR',
            'pusher'   => $helpers->getPusherKey(),
            // 'web'       => $model->where('remark', 'WEB')->findAll(),
            'node'      => $model->where('remark', 'NODE')->first(),
            'user'      => $model->where('remark', 'USER')->find(),
        ];
        return view('backend/whatsapp/index', $data);
    }

}
