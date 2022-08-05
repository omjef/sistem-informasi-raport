<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunSiswa extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nisn' => '3116385475',
                'username' => 'aal',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'is_aktif' => 1
            ],
            [
                'nisn' => '0088120116',
                'username' => 'azni',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'is_aktif' => 1
            ],
        ];

        $this->db->table('akun_siswa')->insertBatch($data);
    }
}
