<?php

namespace App\Models;

use CodeIgniter\Model;

class SikapModel extends Model
{
    protected $table = 'sikap';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nisn', 'id_kelas', 'id_tahun_ajaran', 'sikap_spiritual', 'sikap_sosial', 'nip'];
}
