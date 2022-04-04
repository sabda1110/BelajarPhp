<?php

namespace App\Controllers;

use App\Models\M_prakon;
use CodeIgniter\Controller;

class Prakon extends BaseController
{
    public function __construct()
    {
        $this->model = new M_prakon;
    }
    public function index()
    {

        $data = [
            'judul' => 'Dokumentasi Pekerjaan',
            'struktur' => $this->model->getStruktur()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/topbar');
        echo view('prakom/documentasi/index');
        echo view('template/footer');
    }

    public function kamus()
    {

        $data = [
            'judul' => 'Dokumentasi Pekerjaan',
            'kegiatan' => $this->model->getkamusPrakon(),
            'struktur' => $this->model->getStruktur()
        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/topbar');
        echo view('prakom/kamusprakon/index');
        echo view('template/footer');
    }
    public function detail($kd_kegiatan)
    {
        $data = [
            'judul' => 'Detail Kegiatan'

        ];

        echo view('template/header', $data);
        echo view('template/sidebar');
        echo view('template/topbar');
        echo view('prakom/detail');
        echo view('template/footer');
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
        $success = $this->model->hapus($kd_kegiatan);
        if ($success) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
            return redirect()->to(base_url('kamus'));
        }
    }
}
