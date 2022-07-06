<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'tb_kelas';
    protected $allowedFields = ['no_kelas', 'kelas', 'semester', 'tahun_ajaran', 'nip'];
}
