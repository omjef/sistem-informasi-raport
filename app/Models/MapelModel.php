<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = 'tb_mapel';
    protected $allowedFields = ['no_mapel', 'nama_mapel', 'kelas', 'aspek'];
}
