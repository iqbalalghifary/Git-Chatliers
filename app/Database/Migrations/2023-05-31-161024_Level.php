<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Level extends Migration
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
        'level'       => [
            'type'           => 'INT',
            'constraint'     => '11'
        ],
        'skor'       => [
            'type'           => 'INT',
            'constraint'     => '11'
        ],
        'user_id'       => [
            'type'           => 'INT',
            'constraint'     => '11'
        ],
        'created_at' => [
            'type' => 'TIMESTAMP',
          ],
         'updated_at' => [
            'type' => 'TIMESTAMP',
          ],


    ]);

    $this->forge->addKey('id', TRUE);
    $this->forge->createTable('level', TRUE);
}

public function down()
{
    $this->forge->dropTable('level', TRUE);

}
}