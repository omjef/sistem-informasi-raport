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
                'nama' => 'AALSYAMSURIJAL',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '2011-10-27',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'pendidikan_sebelum' => 'TK',
                'alamat' => 'Pasir Ipis',
                'nama_ayah' => '',
                'nama_ibu' => '',
                'Pekerjaan_ayah' => '',
                'pekerjaan_ibu' => '',
                'alamat_orang_tua' => '',
                'status_siswa' => '',
                'foto_siswa' => 'default.jpg'
            ],
            [
                'nisn' => '88120116',
                'nis' => '181901002935',
                'nama' => 'AZNI NURAENI',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '2011-11-09',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'pendidikan_sebelum' => 'TK',
                'alamat' => 'Pasir Ipis',
                'nama_ayah' => '',
                'nama_ibu' => '',
                'Pekerjaan_ayah' => '',
                'pekerjaan_ibu' => '',
                'alamat_orang_tua' => '',
                'status_siswa' => '',
                'foto_siswa' => 'default.jpg'
            ],
            [
                'nisn' => '75949679',
                'nis' => '181901003936',
                'nama' => 'AZZAM NAUFAL RIZQULLAH',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '2011-11-04',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'pendidikan_sebelum' => 'TK',
                'alamat' => 'Pasir Ipis',
                'nama_ayah' => '',
                'nama_ibu' => '',
                'Pekerjaan_ayah' => '',
                'pekerjaan_ibu' => '',
                'alamat_orang_tua' => '',
                'status_siswa' => '',
                'foto_siswa' => 'default.jpg'
            ],
            [
                'nisn' => '3121317973',
                'nis' => '181901004937',
                'nama' => 'DEWI NURUL LATIPAH',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '2011-02-17',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'pendidikan_sebelum' => 'TK',
                'alamat' => 'Pasir Ipis',
                'nama_ayah' => '',
                'nama_ibu' => '',
                'Pekerjaan_ayah' => '',
                'pekerjaan_ibu' => '',
                'alamat_orang_tua' => '',
                'status_siswa' => '',
                'foto_siswa' => 'default.jpg'
            ],
            [
                'nisn' => '79897231',
                'nis' => '181901005938',
                'nama' => 'DZIA FUADIAH',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '2012-01-23',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'pendidikan_sebelum' => 'TK',
                'alamat' => 'Pasir Ipis',
                'nama_ayah' => '',
                'nama_ibu' => '',
                'Pekerjaan_ayah' => '',
                'pekerjaan_ibu' => '',
                'alamat_orang_tua' => '',
                'status_siswa' => '',
                'foto_siswa' => 'default.jpg'
            ],
        ];

        $this->db->table('siswa')->insertBatch($data);
    }
}
