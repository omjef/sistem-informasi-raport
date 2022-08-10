<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Sekolah extends Seeder
{
    public function run()
    {
        $data = [
            'nss' => '101327806004',
            'npsn' => '20224387',
            'nama' => 'SDN 2 Kersanagara',
            'alamat' => 'Jalan Bantargedang 46196',
            'kelurahan' => 'Kersanagara',
            'kecamatan' => 'Cibeureum',
            'kota' => 'Kota Tasikmalaya',
            'provinsi' => 'Jawa Barat',
            'website' => 'http://localhost:8080',
            'email' => 'sdn.kersanagara2@gmail.com'
        ];

        $this->db->table('sekolah')->insert($data);
    }
}
