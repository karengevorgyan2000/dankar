<?php
    namespace App\Models;
    use CodeIgniter\Model;
    
    class AboutUs extends Model {
        protected $table = 'aboutus';     
           
            protected $returnType     = 'array';
            protected $primaryKey = 'id';

            protected $useAutoIncrement = true;
            
            protected $allowedFields = [
                'aboutus_am',
                'aboutus_ru',
                'aboutus_en',
            ];
            
            protected $createdField  = 'created_at';
            protected $updatedField  = 'updated_at';
    }
