<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addfiles extends Migration
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
                        'upload_path' => [
                                'type' => 'VARCHAR',
                                'constraint'     =>250,
                        ],
                        'file_name' => [
                                'type' => 'VARCHAR',
                                'constraint'     =>250,
                        ],
                        'file_original_name' => [
                                'type' => 'VARCHAR',
                                'constraint'     =>250,
                        ],
                        'created_at' => [
                                'type' => 'TIMESTAMP',
                                'null' => true,
                                
                        ]
                ]);
                $this->forge->addKey('id', true);

                $this->forge->createTable('files');
	}

	public function down()
	{
            $this->forge->dropTable('files');
	}
}
