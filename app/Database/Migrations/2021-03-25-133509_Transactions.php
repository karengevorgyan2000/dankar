<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
	public function up()
	{
		$this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 8,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'order_id'    => [
                                'type'           => 'int',
                                'constraint' => '10',
                                'null' => FALSE,
                        ], 
                        'payment_id'    => [
                                'type'  => 'varchar',
                                'constraint' => '100',
                        ],  
                        'status' => [
                            'type'      => 'ENUM("approved","rejected")',
                            'null'      => FALSE,
                                
                        ],
                        'data_obj' => [
                                'type' => 'longtext',
                                'null' => true,
                                
                        ],
                        'created_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                                
                        ]
                              
                        
                ]);
                $this->forge->addKey('id', true);

                $this->forge->createTable('transactions');     
	}

	public function down()
	{
		$this->forge->dropTable('transactions');
	}
}
