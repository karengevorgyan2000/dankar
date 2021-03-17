<?php 
    namespace App\Models;
    use CodeIgniter\Model;
    
    class Blog extends Model
    {
            protected $table = 'blog';     
           
            protected $returnType     = 'array';
            protected $primaryKey = 'id';

            protected $useAutoIncrement = true;
            
            protected $allowedFields = [
                'title_am', 
                'title_ru', 
                'title_en', 
                'body_en', 
                'body_am', 
                'body_ru',
                'file_id',
                'status'
            ];
            
            protected $createdField  = 'created_at';
            protected $updatedField  = 'updated_at';
    }