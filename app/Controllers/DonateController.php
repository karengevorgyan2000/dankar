<?php

    namespace App\Controllers;
    use App\Controllers\BaseController;
    
    class DonateController extends BaseController{
           
        public function index(){
            return view('donate');

        }
    }