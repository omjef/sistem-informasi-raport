<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbMapel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_mapel' => [
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
        // membuat primary key
        $this->forge->addKey('no_mapel', true);

        // membuat tb_mapel
        $this->forge->createTable('tb_mapel');
    }

    public function down()
    {
        // menghapus tb_mapel
        $this->forge->dropTable('tb_mapel');
    }
}
