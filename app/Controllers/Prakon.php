<?php

namespace App\Controllers;

use App\Models\M_prakon;
use CodeIgniter\Controller;

class Prakon extends Controller
{
    public function index()
    {
        $model = new M_prakon;

        $data = [
            'judul' => 'Dokumentasi Pekerjaan',
            'struktur' => $model->getStruktur()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/topbar');
        echo view('prakom/documentasi/index');
        echo view('template/footer');
    }
}
