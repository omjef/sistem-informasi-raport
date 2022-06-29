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
                'constraint'     => '255',
            ],
            'nuptk' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type'           => 'ENUM',
                'constraint'     => ['Laki-laki', 'Perempuan'],
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'ijazah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tahun_ijazah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'jenis_guru' => [
                'type'           => 'ENUM',
                'constraint'     => ['Kepala Sekolah', 'Guru Kelas', 'Guru PAI', 'Guru PJOK'],
            ],
            'tanggal_angkatan' => [
                'type' => 'DATE',
            ],
            'mulai_bekerja_disekolah' => [
                'type' => 'DATE',
            ],
            'tmt_masa_pensiun' => [
                'type' => 'DATE',
            ],
            'mengajar_dikelas' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah_jam_mengajar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto_guru' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        // membuat primary key
        $this->forge->addKey('nip', true);

        // membuat index key
        $this->forge->addKey('nuptk');


        // membuat table tb_siswa
        $this->forge->createTable('tb_guru');
    }

    public function down()
    {
        // menghapus tabel tb_siswa
        $this->forge->dropTable('tb_guru');
    }
}
