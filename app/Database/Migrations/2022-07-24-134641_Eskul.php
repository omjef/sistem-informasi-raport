<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Eskul extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_eskul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_eskul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_eskul', true);

        $this->forge->createTable('eskul');
    }

    public function down()
    {
        $this->forge->dropTable('eskul');
    }
}
