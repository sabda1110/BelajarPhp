<?php

namespace App\Controllers;

use App\Models\M_prakon;
use CodeIgniter\Controller;

class Kamusprakom extends BaseController
{
    public function __construct()
    {
        $this->session = service('session');
        $this->auth = service('authentication');
        $this->model = new M_prakon;
        helper('sn');
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
            'kegiatan' => $this->model->getkamusPrakon(),
            'struktur' => $this->model->getStruktur()
        ];

        tampilan('kamusprakom/index', $data);
    }
    public function tambah()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'kd_kegiatan' => [
                    'label' => 'Kode Kegiatan',
                    'rules' => 'required|max_length[5]|is_unique[kegiatan.kd_kegiatan]',
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
                    'kegiatan' => $this->model->getkamusPrakon(),
                    'struktur' => $this->model->getStruktur()
                ];

                return redirect()->to(base_url('kamusprakom'));
            } else {

                $data = [
                    'kd_kegiatan' => $this->request->getPost('kd_kegiatan'),
                    'kegiatan' => $this->request->getPost('kegiatan'),
                    'sub_kegiatan' => $this->request->getPost('sub_kegiatan'),
                    'desc_kegiatan' => $this->request->getPost('desc_kegiatan'),
                    'satuan_hasil' => $this->request->getPost('satuan_hasil'),
                    'angka_kredit' => $this->request->getPost('angka_kredit'),
                    'batasan_penilaian' => $this->request->getPost('batasan_penilaian'),
                    'pelaksana' => $this->request->getPost('pelaksana'),
                    'bukti_fisik' => $this->request->getPost('bukti_fisik'),
                    'contoh' => $this->request->getPost('contoh'),
                    'kd_kerja' => $this->request->getPost('kd_kerja')

                ];

                //insert data
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
                    return redirect()->to(base_url('kamusprakom'));
                }
            }
        } else {
            return redirect()->to(base_url('kamusprakom'));
        }
    }
    public function hapus($kd_kegiatan)
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        $this->model->hapus($kd_kegiatan);
        session()->setFlashdata('pesan', 'Dihapus!');
        return redirect()->to(base_url('kamusprakom'));
    }
    public function edit()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/login');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }


        if (isset($_POST['edit'])) {
            $kd_kegiatan = $this->request->getPost('kd_kegiatan');
            $kd_kegiatan_db = $this->model->getkamusPrakon($kd_kegiatan)['kd_kegiatan'];

            if ($kd_kegiatan == $kd_kegiatan_db) {
                $rules = 'required|max_length[5]';
            } else {
                $rules = 'required|max_length[5]|is_unique[kegiatan.kd_kegiatan]';
            }
            $val = $this->validate([
                'kd_kegiatan' => [
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
                    'kegiatan' => $this->model->getkamusPrakon(),
                    'struktur' => $this->model->getStruktur()
                ];

                return redirect()->to(base_url('kamusprakom'));
            } else {
                $kd_kegiatan = $this->request->getPost('kd_kegiatan');
                $data = [

                    'kegiatan' => $this->request->getPost('kegiatan'),
                    'sub_kegiatan' => $this->request->getPost('sub_kegiatan'),
                    'desc_kegiatan' => $this->request->getPost('desc_kegiatan'),
                    'satuan_hasil' => $this->request->getPost('satuan_hasil'),
                    'angka_kredit' => $this->request->getPost('angka_kredit'),
                    'batasan_penilaian' => $this->request->getPost('batasan_penilaian'),
                    'pelaksana' => $this->request->getPost('pelaksana'),
                    'bukti_fisik' => $this->request->getPost('bukti_fisik'),
                    'contoh' => $this->request->getPost('contoh'),
                    'kd_kerja' => $this->request->getPost('kd_kerja')

                ];

                //Update data
                $success = $this->model->edit($data, $kd_kegiatan);
                if ($success) {
                    session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
                    return redirect()->to(base_url('kamusprakom'));
                }
            }
        } else {
            return redirect()->to(base_url('kamusprakom'));
        }
    }
}
