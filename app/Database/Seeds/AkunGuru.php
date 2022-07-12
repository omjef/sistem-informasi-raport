<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunGuru extends Seeder
{
    public function run()
    {
        $data = [
            'nip' => 1231,
            'username'    => 'user',
            'password'    => password_hash(123, PASSWORD_DEFAULT),
            'role' => 'guru',
            'is_aktif'    => 1,
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tb_akun_guru')->insert($data);
    }
}
