<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sekolah extends Migration
{
    public function up()
    {
    $this->forge->addField([
        'id'          => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true
        ],
        'nama_sekolah'       => [
            'type'           => 'VARCHAR',
            'constraint'     => '255'
        ],
        'alamat_sekolah'       => [
            'type'           => 'TEXT',
        ],
        'created_at' => [
            'type' => 'TIMESTAMP',
          ],
         'updated_at' => [
            'type' => 'TIMESTAMP',
          ],

    ]);

    $this->forge->addKey('id', TRUE);
    $this->forge->createTable('sekolah', TRUE);
}

public function down()
{
    $this->forge->dropTable('sekolah', TRUE);
}
}