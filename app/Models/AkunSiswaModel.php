<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunSiswaModel extends Model
{
    protected $table = 'akun_siswa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nisn', 'username', 'password', 'status_akun'];
}
