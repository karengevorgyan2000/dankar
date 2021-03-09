<?php 
    namespace App\Models;
    use CodeIgniter\Model;
    
    class User extends Model
    {
            protected $table = 'user';     
           
            protected $returnType     = 'array';
            protected $primaryKey = 'id';

            protected $useAutoIncrement = true;

    }