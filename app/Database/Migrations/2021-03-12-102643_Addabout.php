<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addabout extends Migration
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
                        'aboutus_am'    =>[
                                'type' => 'LONGTEXT',
                                'null' => FALSE,
                        ],
						'aboutus_ru'    =>[
                                'type' => 'LONGTEXT',
                                'null' => FALSE,
                        ],
						'aboutus_en'    =>[
                                'type' => 'LONGTEXT',
                                'null' => FALSE,
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

                $this->forge->createTable('aboutus');
	}

	public function down()
	{
		$this->forge->dropTable('aboutus');
	}
}
