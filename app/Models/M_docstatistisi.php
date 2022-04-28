<?php

namespace App\Models;

use CodeIgniter\Model;

class M_docstatistisi extends Model
{
    protected $table = 'kegiatan_statistisi';
    public function search($keyword)
    {
        $builder = $this->table('kegiatan_statistisi');
        $builder->like('kode_jabatan', $keyword)->orlike('kegiatan', $keyword);
        return $builder;
    }
}
