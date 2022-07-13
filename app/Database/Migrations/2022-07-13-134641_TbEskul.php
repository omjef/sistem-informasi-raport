<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbEskul extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_eskul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_eskul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        // membuat primary key
        $this->forge->addKey('no_eskul', true);

        // membuat tb_mapel
        $this->forge->createTable('tb_eskul');
    }

    public function down()
    {
        // menghapus tb_mapel
        $this->forge->dropTable('tb_eskul');
    }
}
