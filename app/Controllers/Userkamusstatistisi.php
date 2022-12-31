<?php

namespace App\Controllers;


use App\Models\M_docstatistisi;

class Userkamusstatistisi extends BaseController
{
    public function __construct()
    {

        $this->session = service('session');
        $this->auth = service('authentication');
        $this->docum = new M_docstatistisi();
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
            'kamus' => $orang->paginate(5, 'kamusstatistisi'),
            'pager' => $this->docum->pager
        ];

        tampilan1('userkamusstatistisi/index', $data);
    }
}
