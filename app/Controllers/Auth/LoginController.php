<?php
    
    namespace App\Controllers\Auth;
    use App\Controllers\BaseController;
    use App\Models\User;
    
    class LoginController extends BaseController {
        private $user = '';
        
        public function __construct(){
      
            $this->user = new User();      
        }
        
        public function index(){
            return view('admin/login');           
        }
        
        public function doLogin(){
            
            
            //var_dump($this->request->getVar('email'));exit;
            $data = array('email'=>$this->request->getVar('email'),
                          'password'=> md5($this->request->getVar('password')));
            
            $user = $this->user->where($data);
            $rows = $this->user->find(1);
            
            $session = session();
            
            if(!empty($rows)){            
                $adminData = [
                    'admin' => [
                        'id'  => $rows['id'],
                        'name'  => $rows['name'],
                        'email'  => $rows['email'],
                        'role_id'  => $rows['role_id'],

                     ]
                ];
                $session->set($adminData);
                
                return redirect()->to('/admin/home');
            } else {
                return redirect()->to('/login')->withInput()->with('error', 'Invalid User credentials');
            }
          
        }
        
        
    }
   
        
       