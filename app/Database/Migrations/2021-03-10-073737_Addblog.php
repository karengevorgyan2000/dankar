<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addblog extends Migration
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
                        'title_am' => [
                                'type' => 'text',
                                'null' => FALSE,
                        ],
                        'title_ru' => [
                                'type' => 'text',
                                'null' => true,
                        ],
                        'title_en' => [
                                'type' => 'text',
                                'null' => true,
                        ],
                        'body_am' => [
                                'type' => 'longtext',
                                'null' => FALSE,
                        ],
                        'body_ru' => [
                                'type' => 'longtext',
                                'null' => true,
                        ],
                        'body_en' => [
                                'type' => 'longtext',
                                'null' => true,
                        ],
                        'file_id' =>[
                                'type'          => 'INT',
                                'constraint'    => 10,
                        ],    
                        'status' => [
                            'type'      => 'ENUM("active","deactive")',
                            'default'   => 'active',
                            'null'      => FALSE,
                                
                        ],
                        'created_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                                
                        ],
                        'updated_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                                
                        ]
                        
                        
                ]);
                $this->forge->addKey('id', true);

                $this->forge->createTable('blog');

	}

	public function down()
	{
            $this->forge->dropTable('blog');
	}
}
