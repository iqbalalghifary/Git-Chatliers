<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nilai extends Migration
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
            'mata_pelajaran'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'nilai'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'user_id'       => [
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
        $this->forge->createTable('nilai', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('nilai', TRUE);
    }
}

