<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kelas extends Seeder
{
    public function run()
    {
        $data = [
            //Kelas 1
            [
                'no_kelas' => 'K11',
                'kelas' => 1,
                'semester' => 'Ganjil',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],
            [
                'no_kelas' => 'K12',
                'kelas' => 1,
                'semester' => 'Genap',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],

            //Kelas 2
            [
                'no_kelas' => 'K21',
                'kelas' => 2,
                'semester' => 'Ganjil',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],
            [
                'no_kelas' => 'K22',
                'kelas' => 2,
                'semester' => 'Genap',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],

            //Kelas 3
            [
                'no_kelas' => 'K31',
                'kelas' => 3,
                'semester' => 'Ganjil',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],
            [
                'no_kelas' => 'K32',
                'kelas' => 3,
                'semester' => 'Genap',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],

            //Kelas 4
            [
                'no_kelas' => 'K41',
                'kelas' => 4,
                'semester' => 'Ganjil',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],
            [
                'no_kelas' => 'K42',
                'kelas' => 4,
                'semester' => 'Genap',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],

            //Kelas 5
            [
                'no_kelas' => 'K51',
                'kelas' => 5,
                'semester' => 'Ganjil',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],
            [
                'no_kelas' => 'K52',
                'kelas' => 5,
                'semester' => 'Genap',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],

            //Kelas 6
            [
                'no_kelas' => 'K61',
                'kelas' => 6,
                'semester' => 'Ganjil',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ],
            [
                'no_kelas' => 'K62',
                'kelas' => 6,
                'semester' => 'Genap',
                'tahun_ajaran' => '2021/2022',
                'nip' => 1231
            ]
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tb_kelas')->insertBatch($data);
    }
}
