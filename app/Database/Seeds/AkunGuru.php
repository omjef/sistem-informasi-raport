<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunGuru extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nip' => '196911191992082001',
                'username' => 'cucu',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'is_aktif' => 1
            ],
            [
                'nip' => '196306161983052011',
                'username' => 'azni',
                'password' => password_hash(123, PASSWORD_DEFAULT),
                'is_aktif' => 1
            ],
        ];

        $this->db->table('akun_guru')->insertBatch($data);
    }
}
