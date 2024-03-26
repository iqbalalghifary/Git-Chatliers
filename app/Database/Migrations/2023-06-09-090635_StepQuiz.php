<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StepQuiz extends Migration
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
            'quiz_id'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'pilihan_id'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'materi_id'       => [
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
        $this->forge->createTable('step_quiz', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('step_quiz', TRUE);
    }
}

