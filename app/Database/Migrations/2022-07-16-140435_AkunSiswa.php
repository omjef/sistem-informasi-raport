<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunSiswa extends Migration
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
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('nisn');

        $this->forge->addForeignKey('nisn', 'siswa', 'nisn');

        $this->forge->createTable('akun_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('akun_siswa');
    }
}
