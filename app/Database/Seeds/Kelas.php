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
                'id_kelas' => 'K11',
                'kelas' => 1,
                'semester' => 'Ganjil',
                'nip' => 196306161983052011
            ],
            [
                'id_kelas' => 'K12',
                'kelas' => 1,
                'semester' => 'Genap',
                'nip' => 196306161983052011
            ],

            //Kelas 2
            [
                'id_kelas' => 'K21',
                'kelas' => 2,
                'semester' => 'Ganjil',
                'nip' => 196306161983052011
            ],
            [
                'id_kelas' => 'K22',
                'kelas' => 2,
                'semester' => 'Genap',
                'nip' => 196306161983052011
            ],

            //Kelas 3
            [
                'id_kelas' => 'K31',
                'kelas' => 3,
                'semester' => 'Ganjil',
                'nip' => 196306161983052011
            ],
            [
                'id_kelas' => 'K32',
                'kelas' => 3,
                'semester' => 'Genap',
                'nip' => 196306161983052011
            ],

            //Kelas 4
            [
                'id_kelas' => 'K41',
                'kelas' => 4,
                'semester' => 'Ganjil',
                'nip' => 196306161983052011
            ],
            [
                'id_kelas' => 'K42',
                'kelas' => 4,
                'semester' => 'Genap',
                'nip' => 196306161983052011
            ],

            //Kelas 5
            [
                'id_kelas' => 'K51',
                'kelas' => 5,
                'semester' => 'Ganjil',
                'nip' => 196306161983052011
            ],
            [
                'id_kelas' => 'K52',
                'kelas' => 5,
                'semester' => 'Genap',
                'nip' => 196306161983052011
            ],

            //Kelas 6
            [
                'id_kelas' => 'K61',
                'kelas' => 6,
                'semester' => 'Ganjil',
                'nip' => 196306161983052011
            ],
            [
                'id_kelas' => 'K62',
                'kelas' => 6,
                'semester' => 'Genap',
                'nip' => 196306161983052011
            ]
        ];
        $this->db->table('kelas')->insertBatch($data);
    }
}
