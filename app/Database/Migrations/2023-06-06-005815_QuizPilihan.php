<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class QuizPilihan extends Migration
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
            'pilihan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'quiz_id'       => [
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
        $this->forge->createTable('quiz_pilihan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('quiz_pilihan', TRUE);
    }
}

