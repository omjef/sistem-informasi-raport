<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiEskulModel extends Model
{
    protected $table = 'nilai_eskul';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_eskul', 'nisn', 'id_kelas', 'id_tahun_ajaran', 'nilai', 'deskripsi'];
}
