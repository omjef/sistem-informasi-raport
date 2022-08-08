<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunGuruModel extends Model
{
    protected $table = 'akun_guru';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nip', 'username', 'password', 'jenis_akun', 'status_akun'];
}
