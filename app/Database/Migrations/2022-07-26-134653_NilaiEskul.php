<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiEskul extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_eskul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nisn' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_tahun_ajaran' => [
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
        $this->forge->addKey('id', true);
        $this->forge->addKey('id_eskul');
        $this->forge->addKey('nisn');
        $this->forge->addKey('id_kelas');
        $this->forge->addKey('id_tahun_ajaran');

        $this->forge->addForeignKey('id_eskul', 'eskul', 'id_eskul');
        $this->forge->addForeignKey('nisn', 'siswa', 'nisn');
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas');
        $this->forge->addForeignKey('id_tahun_ajaran', 'tahun_ajaran', 'id_tahun_ajaran');

        $this->forge->createTable('nilai_eskul');
    }

    public function down()
    {
        $this->forge->dropTable('nilai_eskul');
    }
}
