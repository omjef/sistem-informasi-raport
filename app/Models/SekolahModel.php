<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table = 'sekolah';
    protected $primaryKey = 'nss';
    protected $allowedFields = ['nss', 'npsn', 'nama', 'alamat', 'keluarahan', 'kecamatan', 'kota', 'provinsi', 'website', 'email'];
}
