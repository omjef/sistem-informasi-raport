<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunSiswa extends Seeder
{
    public function run()
    {
        $data = [
            'nisn' => '1002',
            'username'    => 'user2',
            'password'    => password_hash(123, PASSWORD_DEFAULT),
            'is_aktif'    => 0,
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tb_akun_siswa')->insert($data);
    }
}
