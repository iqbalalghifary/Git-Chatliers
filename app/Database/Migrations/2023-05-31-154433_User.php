<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'unique'=>true
			],
            'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'role'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'no_hp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
                'null' => true,
			],
            'alamat'       => [
				'type'           => 'TEXT',
                'null' => true
			],
            'kelas_id'       => [
				'type'           => 'INT',
				'constraint'     => '11',
                'null' => true
			],
            'sekolah_id'=>[
                'type'           => 'INT',
				'constraint'     => '11'
			],
			'guru_id'       => [
				'type'           => 'INT',
				'constraint'     => '11',
                'null' => true
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
			  ],
			 'updated_at' => [
				'type' => 'TIMESTAMP',
			  ],
		
		]);

		$this->forge->addKey('id', TRUE);
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users', TRUE);
    }
}
