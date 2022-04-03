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

    public function kamus()
    {
        $model = new M_prakon;
        $data = [
            'judul' => 'Dokumentasi Pekerjaan',
            'kegiatan' => $model->getkamusPrakon(),
            'struktur' => $model->getStruktur()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/topbar');
        echo view('prakom/kamusprakon/index');
        echo view('template/footer');
    }
    public function detail($kd_kegiatan)
    {
        $data = [
            'judul' => 'Detail Kegiatan'

        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/topbar');
        echo view('prakom/kamusprakon/detail');
        echo view('template/footer');
    }
}
