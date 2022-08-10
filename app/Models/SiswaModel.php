<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    protected $allowedFields = ['nisn', 'nis', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'pendidikan_sebelum', 'alamat', 'nama_ayah', 'nama_ibu', 'Pekerjaan_ayah', 'pekerjaan_ibu', 'alamat_orang_tua', 'status_siswa', 'foto_siswa'];
}
