<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kelas' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'semester' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_kelas', true);
        $this->forge->addKey('nip');

        $this->forge->addForeignKey('nip', 'guru', 'nip');

        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}
