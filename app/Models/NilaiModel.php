<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'tb_nilai';
    protected $allowedFields = [
        'no_kelas', 'no_mapel', 'nisn', 'nilai_1_1', 'nilai_1_2', 'nilai_1_3', 'nilai_1_4',
        'nilai_2_1', 'nilai_2_2', 'nilai_2_3', 'nilai_2_4', 'nilai_3_1', 'nilai_3_2', 'nilai_3_3', 'nilai_3_4',
        'nilai_4_1', 'nilai_4_2', 'nilai_4_3', 'nilai_4_4', 'nilai_5_1', 'nilai_5_2', 'nilai_5_3', 'nilai_5_4',
        'nilai_6_1', 'nilai_6_2', 'nilai_6_3', 'nilai_6_4', 'nilai_7_1', 'nilai_7_2', 'nilai_7_3', 'nilai_7_4',
        'nilai_8_1', 'nilai_8_2', 'nilai_8_3', 'nilai_8_4', 'nilai_9_1', 'nilai_9_2', 'nilai_9_3', 'nilai_9_4'
    ];
}
