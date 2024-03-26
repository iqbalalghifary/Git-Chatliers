<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Materi extends Migration
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
        'nama_materi'       => [
            'type'           => 'VARCHAR',
            'constraint'     => '255'
        ],
        'deskripsi'       => [
            'type'           => 'TEXT',
            'null'=>true
        ],
        'sampul'       => [
            'type'           => 'VARCHAR',
            'constraint'     => '255',
            'null'=>true,
            'default'=>'materi.jpg'
        ],
        'user_id'       => [
            'type'           => 'INT',
            'constraint'     => 11,
        ],
        'kelas_id'       => [
            'type'           => 'INT',
            'constraint'     => 11,
        ],
        'mapel_id' => [
            'type'           => 'INT',
            'constraint'     => 11
        ],
        'created_at' => [
            'type' => 'TIMESTAMP',
          ],
         'updated_at' => [
            'type' => 'TIMESTAMP',
          ],
        

    ]);

    $this->forge->addKey('id', TRUE);
    $this->forge->createTable('materi', TRUE);
}

public function down()
{
    $this->forge->dropTable('materi', TRUE);
}
}
