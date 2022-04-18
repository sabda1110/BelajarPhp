<?php

namespace App\Controllers;

use App\Models\M_statistisi;
use CodeIgniter\Controller;

class Kamusstatistisi extends BaseController
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
            'struktur' => $this->model->getStruktur(),
            'kamus' => $this->model->getKamus()
        ];

        tampilan('kamusstatistisi/index', $data);
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
                    'struktur' => $this->model->getStruktur(),
                    'kamus' => $this->model->getKamus()
                ];

                return redirect()->to(base_url('kamusstatistisi'));
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
                    return redirect()->to(base_url('kamusstatistisi'));
                }
            }
        } else {
            return redirect()->to(base_url('kamusstatistisi'));
        }
    }
    public function edit()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }


        if (isset($_POST['edit'])) {
            $kode_kegiatan = $this->request->getPost('kode_kegiatan');
            $kode_kegiatan_db = $this->model->getKamus($kode_kegiatan)['kode_kegiatan'];

            if ($kode_kegiatan == $kode_kegiatan_db) {
                $rules = 'required|max_length[5]';
            } else {
                $rules = 'required|max_length[5]|is_unique[kegiatan_statistisi.kode_kegiatan]';
            }
            $val = $this->validate([
                'kode_kegiatan' => [
                    'label' => 'Kode Kegiatan',
                    'rules' => $rules,
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
                    'judul' => 'Dokumentasi Pekerjaan',
                    'struktur' => $this->model->getStruktur(),
                    'kamus' => $this->model->getKamus()
                ];

                return redirect()->to(base_url('kamusstatistisi'));
            } else {
                $kode_kegiatan = $this->request->getPost('kode_kegiatan');
                $data = [

                    'kegiatan' => $this->request->getPost('kegiatan'),

                    'desc_kegiatan' => $this->request->getPost('desc_kegiatan'),
                    'satuan_hasil' => $this->request->getPost('satuan_hasil'),
                    'angka_kredit' => $this->request->getPost('angka_kredit'),

                    'pelaksana' => $this->request->getPost('pelaksana'),
                    'bukti_fisik' => $this->request->getPost('bukti_fisik'),
                    'contoh' => $this->request->getPost('contoh'),
                    'kode_jabatan' => $this->request->getPost('kode_jabatan')

                ];

                //Update data
                $success = $this->model->edit($data, $kode_kegiatan);
                if ($success) {
                    session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
                    return redirect()->to(base_url('kamusstatistisi'));
                }
            }
        } else {
            return redirect()->to(base_url('kamusstatistisi'));
        }
    }
    public function hapus($kode_kegiatan)
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        $this->model->hapus($kode_kegiatan);
        session()->setFlashdata('pesan', 'Dihapus!');
        return redirect()->to(base_url('kamusstatistisi'));
    }
}
