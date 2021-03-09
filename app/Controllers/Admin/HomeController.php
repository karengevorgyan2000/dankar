<?php
    
    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    
    class HomeController extends BaseController {
        

        public function index(){
            var_dump(session()->get('admin'));
           return view('admin/index');
//            
        }
    }