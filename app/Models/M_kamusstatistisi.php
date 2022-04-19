<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kamusstatistisi extends Model
{
    protected $table = 'struktur_statistisi';

    public function search($keyword)
    {
        $builder = $this->table('struktur_statistisi');
        $builder->like('rincian_kegiatan', $keyword)->orlike('jabatan', $keyword);
        return $builder;
    }
}
