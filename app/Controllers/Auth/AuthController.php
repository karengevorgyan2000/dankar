<?php
    
    namespace App\Controllers\Auth;
    use App\Controllers\BaseController;
    use App\Models\User;
    
    class AuthController extends BaseController {
        private $user = '';
        
        public function __construct(){
      
            $this->user = new User();      
        }
        
        public function index(){
            return view('admin/login');           
        }
        
        public function doLogin(){
            $rules = [
			'email'		=> 'required|valid_email',
			'password' 	=> 'required|min_length[3]',
		];
            if (! $this->validate($rules)) {
			return redirect()->to('/login')->withInput()->with('error', 'Invalid User credentials');
		}
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
                $session->set('isAdminLoggedIn', true);
                
                return redirect()->to('/admin/blog');
            } else {
                return redirect()->to('/login')->withInput()->with('error', 'Invalid User credentials');
            }
          
        }
        
        public function logOut(){
            $session = session();
            $session->destroy();
            return redirect()->to('/login');          
        }
        
        
    }
   
        
       