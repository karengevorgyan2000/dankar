<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class Files extends Model{
        protected $table = 'files';     
           
        protected $returnType = 'array';
        protected $primaryKey = 'id';
        
        protected $allowedFields = [
                'upload_path',
                'file_name',
                'file_original_name'
            ];
        protected $useAutoIncrement = true;
        protected $createdField  = 'created_at';
    }
