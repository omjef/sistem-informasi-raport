<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nip' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'nama' => [
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
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pendidikan_sebelumnya' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_siswa' => [
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
            'nama_orang_tua_wali' => [
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
            'pekerjaan_orang_tua_wali' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_orang_tua' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'alamat_orang_tua' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'foto_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        // membuat primary key
        $this->forge->addKey('nip', true);

        // membuat table tb_siswa
        $this->forge->createTable('tb_guru');
    }

    public function down()
    {
        // menghapus tabel tb_siswa
        $this->forge->dropTable('tb_guru');
    }
}
