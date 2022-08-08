<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Guru extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nip' => '196911191992082001',
                'nuptk' => '3451747650300023',
                'nama' => 'Cucu Nuryana, S.Pd',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '1969-11-19',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'ijazah' => 'S1',
                'tahun_ijazah' => '2007',
                'jenis_guru' => 'Kepala Sekolah',
                'tanggal_diangkat' => '1992-08-01',
                'tanggal_bekerja' => '2021-05-28',
                'tanggal_pensiun' => '2029-12-01',
                'kelas_diampu' => '-',
                'jam_mengajar' => '-',
                'foto_guru' => 'default.jpg'
            ],
            [
                'nip' => '196306161983052011',
                'nuptk' => '8948741642300032',
                'nama' => 'Lilis Suryani, S.Pd',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '1963-06-16',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'ijazah' => 'S1',
                'tahun_ijazah' => '2007',
                'jenis_guru' => 'Guru Kelas',
                'tanggal_diangkat' => '1983-05-01',
                'tanggal_bekerja' => '1983-05-01',
                'tanggal_pensiun' => '2023-07-01',
                'kelas_diampu' => '4',
                'jam_mengajar' => '26',
                'foto_guru' => 'default.jpg'
            ], [
                'nip' => '196305081983052007',
                'nuptk' => '5840741642300032',
                'nama' => 'HENI SURLIANI, S.Pd',
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '1963-06-16',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'ijazah' => 'S1',
                'tahun_ijazah' => '2007',
                'jenis_guru' => 'Guru Kelas',
                'tanggal_diangkat' => '1983-05-01',
                'tanggal_bekerja' => '1983-05-01',
                'tanggal_pensiun' => '2023-07-01',
                'kelas_diampu' => '4',
                'jam_mengajar' => '26',
                'foto_guru' => 'default.jpg'
            ],
        ];

        $this->db->table('guru')->insertBatch($data);
    }
}
