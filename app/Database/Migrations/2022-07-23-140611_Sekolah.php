<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sekolah extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kelurahan' => [
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
        $this->forge->addKey('nss', true);
        $this->forge->addKey('npsn');

        $this->forge->createTable('sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('sekolah');
    }
}
