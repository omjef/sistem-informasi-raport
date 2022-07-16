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
                'tanggal_angkatan' => '1992-08-01',
                'mulai_bekerja_disekolah' => '2021-05-28',
                'tmt_masa_pensiun' => '2029-12-01',
                'mengajar_dikelas' => '-',
                'jumlah_jam_mengajar' => '-',
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
                'tanggal_angkatan' => '1983-05-01',
                'mulai_bekerja_disekolah' => '1983-05-01',
                'tmt_masa_pensiun' => '2023-07-01',
                'mengajar_dikelas' => '4',
                'jumlah_jam_mengajar' => '26',
                'foto_guru' => 'default.jpg'
            ],
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tb_guru')->insertBatch($data);
    }
}
