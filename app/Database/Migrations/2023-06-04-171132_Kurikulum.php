<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kurikulum extends Migration
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
            'kelas_id'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'user_id'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'kurikulum'       => [
                'type'           => 'TEXT',
            ],
      
            'created_at' => [
                'type' => 'TIMESTAMP',
              ],
             'updated_at' => [
                'type' => 'TIMESTAMP',
              ],
            
    
        ]);
    
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('kurikulum', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('kurikulum', TRUE);
    }
}
