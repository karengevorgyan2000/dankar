<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class HomeSlider extends Model{
        protected $table = 'home_slider';     
           
        protected $returnType = 'array';
        protected $primaryKey = 'id';
        
        protected $allowedFields = [
                'title_left',
                'title_right',
                'file_id',
                'status'
            ];
        protected $useAutoIncrement = true;
        protected $createdField  = 'created_at';
    }
