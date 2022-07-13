<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbNilaiEskul extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_eskul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nilai' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'deskripsi' => [
                'type'       => 'TEXT'
            ],
        ]);
        // membuat index key
        $this->forge->addKey('nisn');

        //merelasikan antara table
        $this->forge->addForeignKey('nisn', 'tb_siswa', 'nisn');

        // membuat index key
        $this->forge->addKey('no_eskul');

        //merelasikan antara table
        $this->forge->addForeignKey('no_eskul', 'tb_eskul', 'no_eskul');

        // membuat tb_nilai
        $this->forge->createTable('tb_nilai_eskul');
    }

    public function down()
    {
        // menghapus tb_mapel
        $this->forge->dropTable('tb_nilai_eskul');
    }
}
