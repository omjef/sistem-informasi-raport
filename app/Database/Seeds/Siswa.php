<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Siswa extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nisn' => '3116385475',
                'nis' => '181901001934',
                'nama' => 'AAL SYAMSU RIJAL',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '2011-10-27',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pendidikan_sebelumnya' => 'TK',
                'alamat_siswa' => 'Pasir Ipis',
                'nama_ayah' => '',
                'nama_ibu' => '',
                'nama_orang_tua_wali' => '',
                'pekerjaan_ayah' => '',
                'pekerjaan_ibu' => '',
                'alamat_orang_tua' => '',
                'status_siswa' => 'Aktif',
                'foto_siswa' => 'default.jpg'
            ],
            [
                'nisn' => '0088120116',
                'nis' => '181901002935',
                'nama' => 'AZNI NURAENI',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '2011-11-09',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'pendidikan_sebelumnya' => 'TK',
                'alamat_siswa' => 'Bantargedang',
                'nama_ayah' => '',
                'nama_ibu' => '',
                'nama_orang_tua_wali' => '',
                'pekerjaan_ayah' => '',
                'pekerjaan_ibu' => '',
                'alamat_orang_tua' => '',
                'status_siswa' => 'Aktif',
                'foto_siswa' => 'default.jpg'
            ],
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tb_siswa')->insertBatch($data);
    }
}
