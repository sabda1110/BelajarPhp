<?php

namespace App\Models;

use CodeIgniter\Model;

class M_docprakon extends Model
{
    protected $table = 'kegiatan';
    public function search($keyword)
    {
        $builder = $this->table('kegiatan');
        $builder->like('kd_kerja', $keyword)->orlike('kegiatan', $keyword);
        return $builder;
    }
}
