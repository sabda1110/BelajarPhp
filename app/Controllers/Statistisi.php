<?php

namespace App\Controllers;

use App\Models\M_statistisi;
use App\Models\M_kamusstatistisi;

class Statistisi extends BaseController
{
    public function __construct()
    {

        $this->session = service('session');
        $this->auth = service('authentication');
        $this->model = new M_statistisi;
        $this->docum = new M_kamusstatistisi();
        helper('sn');
    }

    public function index()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->docum->search($keyword);
        } else {
            $orang = $this->docum;
        }

        $data = [
            'judul' => 'Kamus Statistisi',
            'struktur' => $orang->paginate(5, 'statis'),
            'pager' => $this->docum->pager
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
    public function kamus()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        $data = [
            'judul' => 'Kamus Statistisi',
            'struktur' => $this->model->getStruktur(),
            'kamus' => $this->model->getKamus()
        ];

        tampilan('statistisi/kamus/index', $data);
    }

    public function tambahkamus()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }
        if (isset($_POST['tambahkamus'])) {
            $val = $this->validate([
                'kode_kegiatan' => [
                    'label' => 'Kode Kegiatan',
                    'rules' => 'required|max_length[5]|is_unique[kegiatan_statistisi.kode_kegiatan]',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong',
                        'is_unique' => '{field} Data Sudah Ada'
                    ]
                ],
                'kegiatan' => [
                    'label' => 'Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak Boleh Kosong'
                    ]
                ]
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Dokumentasi Pekerjaan Statistisi',
                    'kegiatan' => $this->model->getkamusPrakon(),
                    'struktur' => $this->model->getStruktur()
                ];

                return redirect()->to(base_url('statistisi/kamus'));
            } else {

                $data = [
                    'kode_kegiatan' => $this->request->getPost('kode_kegiatan'),
                    'kegiatan' => $this->request->getPost('kegiatan'),
                    'desc_kegiatan' => $this->request->getPost('desc_kegiatan'),
                    'satuan_hasil' => $this->request->getPost('satuan_hasil'),
                    'angka_kredit' => $this->request->getPost('angka_kredit'),
                    'pelaksana' => $this->request->getPost('pelaksana'),
                    'bukti_fisik' => $this->request->getPost('bukti_fisik'),
                    'contoh' => $this->request->getPost('contoh'),
                    'kode_jabatan' => $this->request->getPost('kode_jabatan')

                ];

                //insert data
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
                    return redirect()->to(base_url('statistisi/kamus'));
                }
            }
        } else {
            return redirect()->to(base_url('statistisi/kamus'));
        }
    }
}
