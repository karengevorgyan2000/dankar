<?php
    namespace App\Models;
    use CodeIgniter\Model;
    
    class Orders extends Model
    {
            protected $table = 'orders';     
           
            protected $returnType     = 'array';
            protected $primaryKey = 'id';
            protected $useAutoIncrement = true;
            protected $allowedFields = [
                'amount', 
                'currency', 
                
            ];
            protected $createdField  = 'created_at';
    }