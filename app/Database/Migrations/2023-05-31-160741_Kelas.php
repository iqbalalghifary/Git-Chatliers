<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
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
			'kelas'       => [
				'type'           => 'INT',
				'constraint'     => '11'
			],
			'jenjang'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
			  ],
			 'updated_at' => [
				'type' => 'TIMESTAMP',
			  ],

		]);

		$this->forge->addKey('id', TRUE);
        $this->forge->createTable('kelas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('kelas', TRUE);
    }
}
