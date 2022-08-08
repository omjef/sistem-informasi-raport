<?php

namespace App\Models;

use CodeIgniter\Model;

class EskulModel extends Model
{
    protected $table = 'eskul';
    protected $primaryKey = 'id_eskul';
    protected $allowedFields = ['id_eskul', 'nama_eskul'];
}
