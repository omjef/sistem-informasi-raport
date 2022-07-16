<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'tb_absensi';
    protected $allowedFields = ['nisn', 'nip', 'no_kelas', 'sakit', 'izin', 'tanpa_keterangan'];
}
