<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mapel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mapel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_mapel' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kelas' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'aspek' => [
                'type'           => 'ENUM',
                'constraint'     => ['Keterampilan', 'Pengetahuan'],
            ],
        ]);
        $this->forge->addKey('id_mapel', true);

        $this->forge->createTable('mapel');
    }

    public function down()
    {
        $this->forge->dropTable('mapel');
    }
}
