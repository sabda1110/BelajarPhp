<?php

namespace App\Controllers;

use App\Models\M_statistisi;

class Statistisi extends BaseController
{
    public function __construct()
    {

        $this->session = service('session');
        $this->auth = service('authentication');
        $this->model = new M_statistisi;
        helper('sn');
    }

    public function index()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        $data = [
            'judul' => 'Kamus Statistisi',
            'struktur' => $this->model->getStruktur()
        ];

        tampilan('statistisi/document/index', $data);
    }

    public function tambahdoc()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'kode_jabatan' => [
                    'label' => 'Kode Jabatan',
                    'rules' => 'required|max_length[5]|is_unique[struktur_statistisi.kode_jabatan]',
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

                return redirect()->to(base_url('statistisi'));
            } else {

                $data = [
                    'kode_jabatan' => $this->request->getPost('kode_jabatan'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'sub_jabatan' => $this->request->getPost('sub_jabatan'),
                    'rincian_kegiatan' => $this->request->getPost('rincian_kegiatan'),

                ];

                //insert data
                $success = $this->model->tambahdoc($data);
                if ($success) {
                    session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
                    return redirect()->to(base_url('statistisi'));
                }
            }
        } else {
            return redirect()->to(base_url('statistisi'));
        }
    }

    public function hapusdoc($kode_jabatan)
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }
        $this->model->hapusdoc($kode_jabatan);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('statistisi'));
    }

    public function editdoc()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        if (isset($_POST['editdoc'])) {

            $kode_jabatan = $this->request->getPost('kode_jabatan');
            $kode_jabatan_db = $this->model->getStruktur($kode_jabatan)['kode_jabatan'];



            if ($kode_jabatan == $kode_jabatan_db) {
                $rules = 'required|max_length[5]';
            } else {
                $rules = 'required|max_length[5]|is_unique[struktur_statistisi.kode_jabatan]';
            }
            $val = $this->validate([
                'kode_jabatan' => [
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

                return redirect()->to(base_url('statistisi'));
            } else {
                $kode_jabatan = $this->request->getPost('kode_jabatan');
                $data = [

                    'jabatan' => $this->request->getPost('jabatan'),
                    'sub_jabatan' => $this->request->getPost('sub_jabatan'),
                    'rincian_kegiatan' => $this->request->getPost('rincian_kegiatan'),

                ];

                //Update data
                $success = $this->model->editdoc($data, $kode_jabatan);
                if ($success) {
                    session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
                    return redirect()->to(base_url('statistisi'));
                }
            }
        } else {
            return redirect()->to(base_url('statistisi'));
        }
    }
}
