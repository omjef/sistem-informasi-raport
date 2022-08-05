<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sikap extends Migration
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
            'sikap_spiritual' => [
                'type'       => 'TEXT'
            ],
            'sikap_sosial' => [
                'type'       => 'TEXT'
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('nisn');
        $this->forge->addKey('id_kelas');
        $this->forge->addKey('id_tahun_ajaran');
        $this->forge->addKey('nip');

        $this->forge->addForeignKey('nisn', 'siswa', 'nisn');
        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas');
        $this->forge->addForeignKey('id_tahun_ajaran', 'tahun_ajaran', 'id_tahun_ajaran');
        $this->forge->addForeignKey('nip', 'guru', 'nip');

        $this->forge->createTable('sikap');
    }

    public function down()
    {
        $this->forge->dropTable('sikap');
    }
}
