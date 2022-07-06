<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table = 'tb_sekolah';
    protected $allowedFields = ['nss', 'npsn', 'nama_sekolah', 'alamat_Sekolah', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'website', 'email'];
}
