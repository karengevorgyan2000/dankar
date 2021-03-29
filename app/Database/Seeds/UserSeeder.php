<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		 $data = [
                        
                     'role_id'    => '1',
                     'name'    => 'admin',
                     'email'    => 'aaa@mail.ru',
                     'password'    => md5('1234'),
                     
                ];

                // Simple Queries
                $this->db->query("INSERT INTO user (role_id,name,email,password,created_at,update_at) VALUES(:role_id:,:name:,:email:,:password)", $data);

                // Using Query Builder
                $this->db->table('user')->insert($data);
	
            
            
            
            
		 
	}
}
