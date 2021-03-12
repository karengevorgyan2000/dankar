<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class AdminAuthFilter  implements FilterInterface {
    //put your code here
    
     public function before(RequestInterface $request, $arguments = null)
    {
         if(!session('isAdminLoggedIn')) {
             return redirect()->to('/login');
         }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
//        $response->setStatusCode(404);
        // Do something here
    }
}
