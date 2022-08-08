<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunGuru extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nip' => 196305081983052007,
                'username' => 'heni',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'jenis_akun' => 'Kepala Sekolah',
                'status_akun' => 'Aktif'
            ],
            [
                'nip' => '196306161983052011',
                'username' => 'lilis',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'jenis_akun' => 'Guru',
                'status_akun' => 'Aktif'
            ],
            [
                'nip' => '196911191992082001',
                'username' => 'cucu',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'jenis_akun' => 'Operator',
                'status_akun' => 'Aktif'
            ],
        ];

        $this->db->table('akun_guru')->insertBatch($data);
    }
}
