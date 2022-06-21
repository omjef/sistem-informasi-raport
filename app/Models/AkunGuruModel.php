<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunGuruModel extends Model
{
    protected $table = 'tb_akun_guru';
    protected $allowedFields = ['nip', 'username', 'password', 'role', 'is_aktif'];
}
