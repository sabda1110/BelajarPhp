<?php

namespace App\Controllers;


use App\Models\M_docprakon;

class Userkamusprakom extends BaseController
{
    public function __construct()
    {

        $this->session = service('session');
        $this->auth = service('authentication');
        $this->docum = new M_docprakon;
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
            'struktur' => $orang->paginate(5, 'kamusprakom'),
            'pager' => $this->docum->pager
        ];

        tampilan1('userkamusprakom/index', $data);
    }
}
