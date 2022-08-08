<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nisn' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'nis' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'tanggal_lahir' => [
                'type' => 'DATE'
            ],
            'jenis_kelamin' => [
                'type'           => 'ENUM',
                'constraint'     => ['Laki-laki', 'Perempuan'],
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pendidikan_sebelum' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'nama_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'Pekerjaan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pekerjaan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_orang_tua' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'tahun_mendaftar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_siswa' => [
                'type'           => 'ENUM',
                'constraint'     => ['Aktif', 'Lulus', 'Pindah', 'Keluar'],
            ],
            'foto_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('nisn', true);
        $this->forge->addKey('nis');

        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
