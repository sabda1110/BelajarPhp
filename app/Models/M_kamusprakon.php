<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kamusprakon extends Model
{
    protected $table = 'struktur_bps';
    public function search($keyword)
    {
        $builder = $this->table('struktur_bps');
        $builder->like('butir_kegiatan', $keyword)->orlike('jabatan', $keyword);
        return $builder;
    }
}
