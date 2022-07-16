<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbKelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_kelas' => [
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
        // membuat primary key
        $this->forge->addKey('no_kelas', true);

        // membuat index key
        $this->forge->addKey('nip');

        //merelasikan antara table
        $this->forge->addForeignKey('nip', 'tb_guru', 'nip');

        // membuat tb_kelas
        $this->forge->createTable('tb_kelas');
    }

    public function down()
    {
        // menghapus tb_kelas
        $this->forge->dropTable('tb_kelas');
    }
}
