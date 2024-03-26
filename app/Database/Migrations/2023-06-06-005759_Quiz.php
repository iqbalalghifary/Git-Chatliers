<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Quiz extends Migration
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
            'judul'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'soal'       => [
                'type'           => 'TEXT',
            ],
            'jawaban_benar'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'materi_id'       => [
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
        $this->forge->createTable('quiz', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('quiz', TRUE);
    }
}

