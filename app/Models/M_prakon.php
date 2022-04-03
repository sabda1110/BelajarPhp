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
}
