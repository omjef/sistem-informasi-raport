<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunGuru extends Migration
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
            'nip' => [
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
            'jenis_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_akun' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('nip');

        $this->forge->addForeignKey('nip', 'guru', 'nip');

        $this->forge->createTable('akun_guru');
    }

    public function down()
    {
        $this->forge->dropTable('akun_guru');
    }
}
