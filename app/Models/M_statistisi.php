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
}
