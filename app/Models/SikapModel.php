<?php

namespace App\Models;

use CodeIgniter\Model;

class SikapModel extends Model
{
    protected $table = 'tb_sikap';
    protected $allowedFields = ['nisn', 'nip', 'no_kelas', 'deskripsi_sikap_spiritual', 'deskripsi_sikap_sosial'];
}
