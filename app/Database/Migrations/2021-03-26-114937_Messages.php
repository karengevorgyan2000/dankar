<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Messages extends Migration
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
                        'name' => [
                                'type' => 'text',
                                'null' => FALSE,
                        ],
                        'email' => [
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => true,
                        ],
                        'subject' => [
                                'type' => 'text',
                                'null' => true,
                        ],
                        'message' => [
                                'type' => 'longtext',
                                'null' => FALSE,
                        ],
                        'file_id' => [
                                'type'        => 'int',
                                'constraint'  => 8,
                                'null' => true,
                        ],
                        'created_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                                
                        ]
                        
                        
                ]);
                $this->forge->addKey('id', true);

                $this->forge->createTable('messages');

	}

	public function down()
	{
            $this->forge->dropTable('messages');
	}
}
