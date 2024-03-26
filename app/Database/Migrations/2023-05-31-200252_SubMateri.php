<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubMateri extends Migration
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
            'materi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'deskripsi'       => [
                'type'           => 'TEXT',
            ],
            'isi_materi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'type_materi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'durasi'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'materi_id' => [
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
        $this->forge->createTable('sub_materi', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('sub_materi', TRUE);
    }
}
