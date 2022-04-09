<?php

namespace App\Controllers;

use App\Models\M_prakon;
use CodeIgniter\Controller;

class Prakon extends BaseController
{
    public function __construct()
    {
        $this->model = new M_prakon;
        helper('sn');
    }
    public function index()
    {

        $data = [
            'judul' => 'Dokumentasi Pekerjaan',
            'struktur' => $this->model->getStruktur()
        ];


        tampilan('prakom/documentasi/index', $data);
    }

    public function kamus()
    {

        $data = [
            'judul' => 'Dokumentasi Pekerjaan',
            'kegiatan' => $this->model->getkamusPrakon(),
            'struktur' => $this->model->getStruktur()
        ];

        tampilan('prakom/kamusprakon/index', $data);
    }
    public function tambah()
    {
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

                return redirect()->to(base_url('kamus'));
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
                    return redirect()->to(base_url('kamus'));
                }
            }
        } else {
            return redirect()->to(base_url('kamus'));
        }
    }


    public function hapus($kd_kegiatan)
    {

        $this->model->hapus($kd_kegiatan);
        session()->setFlashdata('message', 'Dihapus!');
        return redirect()->to(base_url('kamus'));
    }

    public function edit()
    {


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

                return redirect()->to(base_url('kamus'));
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
                    return redirect()->to(base_url('kamus'));
                }
            }
        } else {
            return redirect()->to(base_url('kamus'));
        }
    }


    // Function untuk Documentasi

    public function tambah1()
    {
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
        $this->model->hapus1($kd_kerja);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('prakon'));
    }

    public function edit1()
    {

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
