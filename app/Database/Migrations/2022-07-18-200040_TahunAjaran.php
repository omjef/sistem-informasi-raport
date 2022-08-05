<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TahunAjaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tahun_ajaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_kelas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tahun_ajaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_tahun_ajaran', true);
        $this->forge->addKey('id_kelas');

        $this->forge->addForeignKey('id_kelas', 'kelas', 'id_kelas');

        $this->forge->createTable('tahun_ajaran');
    }

    public function down()
    {
        $this->forge->dropTable('tahun_ajaran');
    }
}
