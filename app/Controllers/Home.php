<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Homapage'
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/topbar');
        echo view('home/index');
        echo view('template/footer');
    }
}
