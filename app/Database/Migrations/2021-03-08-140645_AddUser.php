<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUser extends Migration
{
	public function up()
	{
		 $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'role_id'       => [
                                'type'       => 'INT',
                                'constraint' => '5',
                                'unsigned'       => true,

                        ],
                        'name' => [
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ],
                        'email' => [
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ],
                        'password' => [
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ],
                        'created_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                        ],
                        'updated_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                        ],
                ]);
                $this->forge->addKey('id', true);

                $this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
