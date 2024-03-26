<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mapel extends Migration
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
        'mapel'       => [
            'type'           => 'VARCHAR',
            'constraint'     => '255'
        ],
        'created_at' => [
            'type' => 'TIMESTAMP',
          ],
         'updated_at' => [
            'type' => 'TIMESTAMP',
          ],

    ]);

    $this->forge->addKey('id', TRUE);
    $this->forge->createTable('mapel', TRUE);
}

public function down()
{
    $this->forge->dropTable('mapel', TRUE);
}
}
