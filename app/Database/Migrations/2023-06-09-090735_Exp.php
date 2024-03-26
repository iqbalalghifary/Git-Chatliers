<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Exp extends Migration
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
            'exp'       => [
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
        $this->forge->createTable('exp', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('exp', TRUE);
    }
}

