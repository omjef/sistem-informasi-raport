<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['nuptk', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'ijazah', 'tahun_ijazah', 'jenis_guru', 'tanggal_diangkat', 'tanggal_bekerja', 'tanggal_pensiun', 'kelas_diampu', 'jam_mengajar', 'foto_guru'];
}
