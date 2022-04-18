<?php

namespace App\Models;

use CodeIgniter\Model;

class M_statistisi extends Model
{
    public function __construct()
    {
        $this->koneksi = db_connect();
    }

    public function getStruktur($id = null)
    {
        if ($id == null) {

            return $this->koneksi->table('struktur_statistisi')->get()->getResultArray();
        } else {

            return  $this->koneksi->table('struktur_statistisi')->where('kode_jabatan', $id)->get()->getRowArray();
        }
    }

    public  function tambahdoc($data)
    {
        return $this->koneksi->table('struktur_statistisi')->insert($data);
    }
    public function hapusdoc($kode_jabatan)
    {
        return $this->koneksi->table('struktur_statistisi')->delete(['kode_jabatan' => $kode_jabatan]);
    }
    public function editdoc($data, $kode_jabatan)
    {
        return $this->koneksi->table('struktur_statistisi')->update($data, ['kode_jabatan' => $kode_jabatan]);
    }
    public function getKamus($id = null)
    {
        if ($id == null) {

            return $this->koneksi->table('kegiatan_statistisi')->get()->getResultArray();
        } else {

            return  $this->koneksi->table('kegiatan_statistisi')->where('kode_kegiatan', $id)->get()->getRowArray();
        }
    }
    public function tambah($data)
    {
        return $this->koneksi->table('kegiatan_statistisi')->insert($data);
    }
    public function edit($data, $kode_kegiatan)
    {
        return $this->koneksi->table('kegiatan_statistisi')->update($data, ['kode_kegiatan' => $kode_kegiatan]);
    }
    public function hapus($kode_kegiatan)
    {
        return $this->koneksi->table('kegiatan_statistisi')->delete(['kode_kegiatan' => $kode_kegiatan]);
    }
}
