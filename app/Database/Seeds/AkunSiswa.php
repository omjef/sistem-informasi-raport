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
                'username' => 'aalsyam',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'status_akun' => 'Aktif'
            ],
            [
                'nisn' => '3121317973',
                'username' => 'dewi',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'status_akun' => 'Aktif'
            ],
            [
                'nisn' => '75949679',
                'username' => 'azzam',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'status_akun' => 'Aktif'
            ],
            [
                'nisn' => '79897231',
                'username' => 'dzia',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'status_akun' => 'Aktif'
            ],
            [
                'nisn' => '88120116',
                'username' => 'azni',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'status_akun' => 'Aktif'
            ],
        ];

        $this->db->table('akun_siswa')->insertBatch($data);
    }
}
