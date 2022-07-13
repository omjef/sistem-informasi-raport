<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSikap extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi_sikap_spiritual' => [
                'type'       => 'TEXT'
            ],
            'deskripsi_sikap_sosial' => [
                'type'       => 'TEXT'
            ],
        ]);
        // membuat index key
        $this->forge->addKey('nisn');

        //merelasikan antara table
        $this->forge->addForeignKey('nisn', 'tb_siswa', 'nisn');

        // membuat index key
        $this->forge->addKey('nip');

        //merelasikan antara table
        $this->forge->addForeignKey('nip', 'tb_guru', 'nip');

        // membuat index key
        $this->forge->addKey('no_kelas');

        //merelasikan antara table
        $this->forge->addForeignKey('no_kelas', 'tb_kelas', 'no_kelas');

        // membuat tb_nilai
        $this->forge->createTable('tb_sikap');
    }

    public function down()
    {
        // menghapus tb_mapel
        $this->forge->dropTable('tb_sikap');
    }
}
