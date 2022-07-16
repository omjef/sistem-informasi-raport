<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiEskulModel extends Model
{
    protected $table = 'tb_nilai_eskul';
    protected $allowedFields = ['nisn', 'no_eskul', 'nilai', 'deskripsi'];
}
