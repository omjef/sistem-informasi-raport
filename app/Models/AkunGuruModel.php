<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunGuruModel extends Model
{
    protected $table = 'tb_akun_guru';
    protected $primaryKey = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields = ['nip', 'username', 'password', 'role', 'is_aktif'];
}
