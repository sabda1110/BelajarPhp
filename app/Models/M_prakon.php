<?php

namespace App\Models;

use CodeIgniter\Model;

class M_prakon extends Model
{
    public function __construct()
    {
        $this->koneksi = db_connect();
    }

    public function getStruktur()
    {
        return $this->koneksi->table('struktur_bps')->get()->getResultArray();
    }

    public function getDataById($kd_kegiatan)
    {
        return  $this->koneksi->table('kegiatan')->where('kd_kegiatan', $kd_kegiatan)->get()->getRowArray();
    }

    public function getkamusPrakon()
    {
        return $this->koneksi->table('kegiatan')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->koneksi->table('kegiatan')->insert($data);
    }
    public function hapus($kd_kegiatan)
    {
        return $this->koneksi->table('kegiatan')->delete(['kd_kegiatan' => $kd_kegiatan]);
    }
    public function edit($data, $kd_kegiatan)
    {
        return $this->koneksi->table('kegiatan')->update($data, ['kd_kegiatan' => $kd_kegiatan]);
    }
}
