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

    //Model untuk documentasi 
    public function tambah1($data)
    {
        return $this->koneksi->table('struktur_bps')->insert($data);
    }

    public function hapus1($kd_kerja)
    {
        return $this->koneksi->table('struktur_bps')->delete(['kd_kerja' => $kd_kerja]);
    }
    public function edit1($data, $kd_kerja)
    {
        return $this->koneksi->table('struktur_bps')->update($data, ['kd_kerja' => $kd_kerja]);
    }
    public function getDataByIdDoc($kd_kerja)
    {
        return  $this->koneksi->table('struktur_bps')->where('kd_kerja', $kd_kerja)->get()->getRowArray();
    }
}
