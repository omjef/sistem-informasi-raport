<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbNilai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_mapel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'Tahun_ajaran' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_1_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_1_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_1_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_1_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_2_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_2_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_2_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_2_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_3_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_3_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_3_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_3_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_4_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_4_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_4_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_4_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_5_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_5_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_5_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_5_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_6_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_6_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_6_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_7_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_7_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_7_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_7_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_8_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_8_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_8_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_8_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_9_1' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_9_2' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_9_3' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'nilai_9_4' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);
        // membuat index key
        $this->forge->addKey('no_kelas');

        //merelasikan antara table
        $this->forge->addForeignKey('no_kelas', 'tb_kelas', 'no_kelas');

        // membuat index key
        $this->forge->addKey('no_mapel');

        //merelasikan antara table
        $this->forge->addForeignKey('no_mapel', 'tb_mapel', 'no_mapel');

        // membuat index key
        $this->forge->addKey('nisn');

        //merelasikan antara table
        $this->forge->addForeignKey('nisn', 'tb_siswa', 'nisn');

        // membuat tb_nilai
        $this->forge->createTable('tb_nilai');
    }

    public function down()
    {
        // menghapus tb_nilai
        $this->forge->dropTable('tb_nilai');
    }
}
