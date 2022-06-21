<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunSiswaModel extends Model
{
    protected $table = 'tb_akun_siswa';
    protected $allowedFields = ['nisn', 'username', 'password', 'is_aktif'];
}
