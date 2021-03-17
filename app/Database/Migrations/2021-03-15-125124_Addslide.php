<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addslide extends Migration
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
                                'null' => true,
                        ],
                        'file_id' => [
                                'type' => 'INT',
                                'constraint'     => 10,
                        ],
                        'status' => [
                                'type' => 'ENUM("active","deactive")',
                                'default' => 'active',
                                'null' => FALSE,
                                
                        ],
                        'created_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                                
                        ]
                ]);
                $this->forge->addKey('id', true);

                $this->forge->createTable('home_slider');
	}

	public function down()
	{
            $this->forge->dropTable('home_slider');
	}
}
