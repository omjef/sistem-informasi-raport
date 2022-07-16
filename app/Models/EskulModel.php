<?php

namespace App\Models;

use CodeIgniter\Model;

class EskulModel extends Model
{
    protected $table = 'tb_eskul';
    protected $allowedFields = ['no_eskul', 'nama_eskul'];
}
