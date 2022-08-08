<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_kelas', 'id_mapel', 'nisn', 'id_tahun_ajaran', 'nilai_1', 'nilai_2', 'nilai_3', 'nilai_4', 'nilai_5', 'nilai_6', 'nilai_7', 'nilai_8', 'nilai_9', 'nilai_10', 'nilai_11', 'nilai_12', 'nilai_13', 'nilai_14', 'nilai_15', 'nilai_16', 'pts', 'pas'];
}
