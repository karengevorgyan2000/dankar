<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserRole extends Migration
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
                        
                        'title' => [
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ],
                        'created_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                                
                        ],
                ]);
                $this->forge->addKey('id', true);

                $this->forge->createTable('user_role');
	}

	public function down()
	{
		$this->forge->dropTable('user_role');
	}
}
