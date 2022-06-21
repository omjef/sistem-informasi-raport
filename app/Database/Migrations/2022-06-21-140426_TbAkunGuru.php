<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbAkunGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
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
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'is_aktif' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);
        // membuat index key
        $this->forge->addKey('nip');

        // membuat tb_akun_guru
        $this->forge->createTable('tb_akun_guru');
    }

    public function down()
    {
        // menghapus tb_akun_guru
        $this->forge->dropTable('tb_akun_guru');
    }
}
