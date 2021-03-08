<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserroleSeeder extends Seeder
{
	public function run()
	{
		 $data = [
                        
                     'title'    => 'admin',
                    
                ];

                // Simple Queries
                $this->db->query("INSERT INTO user_role (title) VALUES(:title)", $data);

                // Using Query Builder
                $this->db->table('user_role')->insert($data);
	}
}
