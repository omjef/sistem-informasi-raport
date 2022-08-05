<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'tb_guru';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['nuptk', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'ijazah', 'tahun_ijazah', 'jenis_guru', 'tanggal_angkatan', 'mulai_bekerja_disini', 'tmt_masa_pensiun', 'mengajar_dikelas', 'jumlah_jam_mengajar', 'foto_guru'];
}
