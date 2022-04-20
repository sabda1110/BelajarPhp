<?php

namespace App\Controllers;

use App\Models\M_kamusprakon;

class Userdocprakom extends BaseController
{
    public function __construct()
    {

        $this->session = service('session');
        $this->auth = service('authentication');
        $this->docum  = new M_kamusprakon;
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
            'struktur' => $orang->paginate(5, 'docprakon'),
            'pager' => $this->docum->pager
        ];

        tampilan1('userdocprakom/index', $data);
    }
}
