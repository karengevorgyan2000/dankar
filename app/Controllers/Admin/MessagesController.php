<?php
    
    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\Messages;
    use App\Models\Files;
    class MessagesController extends BaseController  {
        
        private $messages = '';
        private $files = '';
        public function __construct(){
      
            $this->messages = new Messages();      
            $this->files = new Files(); 
        }

        public function index() {
            return view('admin/messages');
            
        }
        public function list(){
            $limit = $this->request->getVar('length');
            $page = $this->request->getVar('start')/$limit +1;
            $offset = ($page-1)*$limit;
            $this->messages->join('files', 'files.id = messages.file_id');
            $query = $this->messages->limit($limit);
            $query = $this->messages->offset($offset);
            if(!empty($this->request->getVar('order'))) {
                $ordering = $this->request->getVar('order');
                foreach ($ordering as $orderInfo) {
                    $query = $query->orderBy('messages.id', strtoupper($orderInfo['dir']));
                }
            }
            $result = $query->get()->getResult();
            foreach($result as $key => $val) {
                $res[$key] = [
                    'id' => $val->id,
                    'name' => $val->name,
                    'email' => $val->email,
                    'subject' => $val->subject,
                    'message' => $val->message,
                    'file' => "<a href = '".APP_URL."/uploads/messages/$val->file_name' download><i style = 'width:50px;height:50px;' class='ddd fa fa-download' aria-hidden='true'></i></a>"
  
                ];
              }
            $data = [
              'draw' =>   $this->request->getVar('draw'),
              'recordsTotal' => count($res),  
              'recordsFiltered' => $this->messages->countAll(),  
              'data' => $res,  
              'input' => $this->request->getRawInput()
            ];
            die(json_encode($data));
        
        }
        
        
    }
