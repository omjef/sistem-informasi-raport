<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TahunAjaran extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_tahun_ajaran' => 'TA-K11-2022',
                'id_kelas' => 'K11',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K12-2022',
                'id_kelas' => 'K12',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K21-2022',
                'id_kelas' => 'K21',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K22-2022',
                'id_kelas' => 'K22',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K31-2022',
                'id_kelas' => 'K31',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K32-2022',
                'id_kelas' => 'K32',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K41-2022',
                'id_kelas' => 'K41',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K42-2022',
                'id_kelas' => 'K42',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K51-2022',
                'id_kelas' => 'K51',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K52-2022',
                'id_kelas' => 'K52',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K61-2022',
                'id_kelas' => 'K61',
                'tahun_ajaran' => 2022
            ], [
                'id_tahun_ajaran' => 'TA-K62-2022',
                'id_kelas' => 'K62',
                'tahun_ajaran' => 2022
            ]
        ];

        $this->db->table('tahun_ajaran')->insertBatch($data);
    }
}
