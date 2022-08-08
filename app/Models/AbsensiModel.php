<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nisn', 'id_kelas', 'id_tahun_ajaran', 'sakit', 'izin', 'tanpa_keterangan'];
}
