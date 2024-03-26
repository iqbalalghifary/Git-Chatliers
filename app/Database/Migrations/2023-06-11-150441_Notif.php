<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notif extends Migration
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
            
            'notif'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
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
        $this->forge->createTable('notif', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('notif', TRUE);
    }
}

