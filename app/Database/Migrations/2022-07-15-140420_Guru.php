<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Guru extends Migration
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
            'tanggal_diangkat' => [
                'type' => 'DATE',
            ],
            'tanggal_bekerja' => [
                'type' => 'DATE',
            ],
            'tanggal_pensiun' => [
                'type' => 'DATE',
            ],
            'kelas_diampu' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'jam_mengajar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto_guru' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('nip', true);
        $this->forge->addKey('nuptk');

        $this->forge->createTable('guru');
    }

    public function down()
    {
        $this->forge->dropTable('guru');
    }
}
