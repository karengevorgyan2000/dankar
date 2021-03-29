<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
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
                        'amount'    => [
                                'type'           => 'int',
                                'null' => FALSE,
                        ],  
                        'currency'    => [
                                'type'           => 'text',
                                'null' => FALSE,
                        ],
                        'created_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                                
                        ]
                              
                        
                ]);
                $this->forge->addKey('id', true);

                $this->forge->createTable('orders');     
	}

	public function down()
	{
		$this->forge->dropTable('orders');
	}
}
