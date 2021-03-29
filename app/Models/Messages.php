<?php
    namespace App\Models;
    use CodeIgniter\Model;
    
    class Messages extends Model
    {
            protected $table = 'messages';     
           
            protected $returnType     = 'array';
            protected $primaryKey = 'id';

            protected $useAutoIncrement = true;
            
            protected $allowedFields = [
                'name', 
                'email', 
                'subject', 
                'message', 
                'file_id', 
            ];
            
            protected $createdField  = 'created_at';
    }