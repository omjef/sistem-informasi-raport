<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbAkunSiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'is_aktif' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);
        // membuat index key
        $this->forge->addKey('nisn');

        //merelasikan antara table
        $this->forge->addForeignKey('nisn', 'tb_siswa', 'nisn');

        // membuat tb_akun_siswa
        $this->forge->createTable('tb_akun_siswa');
    }

    public function down()
    {
        // menghapus tb_akun_siswa
        $this->forge->dropTable('tb_akun_siswa');
    }
}
