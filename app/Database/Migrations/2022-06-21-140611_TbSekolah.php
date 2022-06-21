<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSekolah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nss' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'npsn' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keluarahan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kecamatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kota' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'provinsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'website' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        // membuat primary key
        $this->forge->addKey('nss', true);

        //menambah tb_sekolah
        $this->forge->createTable('tb_sekolah');
    }

    public function down()
    {
        // menghapus tb_sekolah
        $this->forge->dropTable('tb_sekolah');
    }
}
