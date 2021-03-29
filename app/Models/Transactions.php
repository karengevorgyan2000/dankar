<?php
    namespace App\Models;
    use CodeIgniter\Model;
    
    class Transactions extends Model
    {
            protected $table = 'transactions';     
           
            protected $returnType     = 'array';
            protected $primaryKey = 'id';

            protected $useAutoIncrement = true;
            protected $allowedFields = [
                'order_id', 
                'payment_id', 
                'status', 
                'data_obj', 
                
            ];
            protected $createdField  = 'created_at';
    }