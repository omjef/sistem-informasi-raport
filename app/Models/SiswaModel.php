<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'tb_siswa';
    protected $allowedFields = ['nisn', 'nis', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'pendidikan_sebelumnya', 'alamat_siswa', 'nama_ayah', 'nama_ibu', 'nama_orang_tua_wali', 'Pekerjaan_ayah', 'pekerjaan_ibu', 'pekerjaan_orang_tua_wali', 'alamat_orang_tua', 'foto_siswa'];
}
