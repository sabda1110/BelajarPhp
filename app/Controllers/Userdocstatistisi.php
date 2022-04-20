<?php

namespace App\Controllers;

use App\Models\M_kamusstatistisi;

class Userdocstatistisi extends BaseController
{
    public function __construct()
    {

        $this->session = service('session');
        $this->auth = service('authentication');
        $this->docum  = new M_kamusstatistisi();
        helper('sn');
    }

    public function index()
    {

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->docum->search($keyword);
        } else {
            $orang = $this->docum;
        }

        $data = [

            'judul' => 'Dokumentasi Pekerjaan',
            // 'struktur' => $this->model->getStruktur()
            'struktur' => $orang->paginate(5, 'statis'),
            'pager' => $this->docum->pager
        ];

        tampilan1('userdocstatistisi/index', $data);
    }
}
