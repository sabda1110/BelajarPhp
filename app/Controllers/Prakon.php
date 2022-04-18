<?php

namespace App\Controllers;

use App\Models\M_prakon;
use App\Models\M_kamusprakon;
use CodeIgniter\Controller;

class Prakon extends BaseController
{
    public function __construct()
    {
        $this->session = service('session');
        $this->auth = service('authentication');
        $this->model = new M_prakon;
        $this->docum  = new M_kamusprakon;
        helper('sn');
        $pager = \Config\Services::pager();
    }
    public function index()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        $data = [

            'judul' => 'Dokumentasi Pekerjaan',
            // 'struktur' => $this->model->getStruktur()
            'struktur' => $this->docum->paginate(5),
            'pager' => $this->docum->pager
        ];


        tampilan('prakom/documentasi/index', $data);
    }




    // Function untuk Documentasi

    public function tambah1()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'kd_kerja' => [
                    'label' => 'Kode Jabatan',
                    'rules' => 'required|max_length[5]|is_unique[struktur_bps.kd_kerja]',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong',
                        'is_unique' => '{field} Data Sudah Ada'
                    ]
                ],
                'jabatan' => [
                    'label' => 'Jabatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak Boleh Kosong'
                    ]
                ]
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Dokumentasi Pekerjaan',
                    'struktur' => $this->model->getStruktur()
                ];

                return redirect()->to(base_url('prakon'));
            } else {

                $data = [
                    'kd_kerja' => $this->request->getPost('kd_kerja'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'jenjang' => $this->request->getPost('jenjang'),
                    'butir_kegiatan' => $this->request->getPost('butir_kegiatan'),

                ];

                //insert data
                $success = $this->model->tambah1($data);
                if ($success) {
                    session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
                    return redirect()->to(base_url('prakon'));
                }
            }
        } else {
            return redirect()->to(base_url('prakon'));
        }
    }

    public function hapus1($kd_kerja)
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }
        $this->model->hapus1($kd_kerja);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('prakon'));
    }

    public function edit1()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        if (isset($_POST['edit1'])) {
            $kd_kerja = $this->request->getPost('kd_kerja');
            $kd_kerja_db = $this->model->getStruktur($kd_kerja)['kd_kerja'];

            if ($kd_kerja == $kd_kerja_db) {
                $rules = 'required|max_length[5]';
            } else {
                $rules = 'required|max_length[5]|is_unique[struktur_bps.kd_kerja]';
            }
            $val = $this->validate([
                'kd_kerja' => [
                    'label' => 'Kode Kerja',
                    'rules' => $rules,
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong',
                        'is_unique' => '{field} Data Sudah Ada'
                    ]
                ],
                'jabatan' => [
                    'label' => 'Jabatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak Boleh Kosong'
                    ]
                ]
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Dokumentasi Pekerjaan',
                    'struktur' => $this->model->getStruktur()
                ];

                return redirect()->to(base_url('prakon'));
            } else {
                $kd_kerja = $this->request->getPost('kd_kerja');
                $data = [

                    'jabatan' => $this->request->getPost('jabatan'),
                    'jenjang' => $this->request->getPost('jenjang'),
                    'butir_kegiatan' => $this->request->getPost('butir_kegiatan'),

                ];

                //Update data
                $success = $this->model->edit1($data, $kd_kerja);
                if ($success) {
                    session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
                    return redirect()->to(base_url('prakon'));
                }
            }
        } else {
            return redirect()->to(base_url('prakon'));
        }
    }
}
