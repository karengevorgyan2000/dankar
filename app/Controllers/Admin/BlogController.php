<?php

    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\Blog;
    class BlogController extends BaseController  {
        private $blog = '';
        
        public function __construct(){
      
            $this->blog = new Blog();      
        }

        public function index() {
            
            return view('admin/blog');
        }
        public function store() {
            $response = [
                'status' => 0,
                'message' => '',
            ];
            
            $rules = [
                    'title_am'	=> 'required',
                    'editor'    => 'required',
            ];
            if (! $this->validate($rules)) {
                
            } else {
                
                $data = [
                    'title_am'=>$this->request->getVar('title_am'),
                    'title_ru'=>$this->request->getVar('title_ru'),
                    'title_en'=>$this->request->getVar('title_ru'),
                    'body_am'=>$this->request->getVar('editor'),       
                    'body_ru'=>$this->request->getVar('editor2'),
                    'body_en'=>$this->request->getVar('editor3'),
                ];
                if($this->request->getVar('blogid') == 0){
                    $query = $this->blog->insert($data);
                } else {
                    $this->blog->where('id', $this->request->getVar('blogid'));
                    $this->blog->set($data);
                    $query = $this->blog->update();
                }
                

                if($query) {
                    $response['status'] = 1;
                } else {
                    $response['message'] = 'Something went wrong. Please try again later!';
                    
                }
            }
            die(json_encode($response));     
            
        }
        public function list() {
            $fields = ['id', 'title_am', 'status', 'created_at'];
            $action = '';
            $status = '';
            $limit = $this->request->getVar('length');
            $page = $this->request->getVar('start')/$limit +1;
            $offset = ($page-1)*$limit;
//            var_dump($this->request->getRawInput());exit;
            $query = $this->blog->limit($limit);
            $query = $this->blog->offset($offset);
            if($this->request->getVar('search')['value'] != ''){
                $query   = $query->like('title_am', $this->request->getVar('search')['value'], 'both');
            
            }
            if(!empty($this->request->getVar('order'))) {
                $ordering = $this->request->getVar('order');
                foreach ($ordering as $orderInfo) {
                    $query = $query->orderBy($fields[$orderInfo['column']], strtoupper($orderInfo['dir']));
                }
            }
            
            $result = $query->get()->getResult();
            
            foreach ($result as $key =>$row){
                
                if($row->status=='active'){
                    $status = 'deactive';
                    $icon = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
                }else{
                    $status = 'active';
                    $icon = '<i class="fa fa-eye" aria-hidden="true"></i>';
                }
                $result[$key]->action = 
                        "<a class ='js-delete-blog cursor-pointer' data-blog-id ='{$row->id}'><i class='fa fa-trash-o ' style = 'color:#a26363; font-size:20px; ' ></i></a>
                                        <a class ='js-status-blog cursor-pointer ml-3 mr-3' data-blog-id ='{$row->id}' style = 'color:#a9a141;  font-size:20px;' data-blog-status ='{$status}'>{$icon}</a>
                                        <a class ='js-edit-blog cursor-pointer' data-blog-id ='{$row->id}' ><i class='fa fa-pencil' style = 'color:#63a268;  font-size :20px;' aria-hidden='true'></i></a>"
                
                ;
                 $result[$key]->title_am = substr($row->title_am, 0, 20);                       
            }
            
            $data = [
              'draw' =>   $this->request->getVar('draw'),
              'recordsTotal' => count($result),  
              'recordsFiltered' => $this->blog->countAll(),  
              'data' => $result,  
              'input' => $this->request->getRawInput()
            ];
            die(json_encode($data));
        }
        
        public function delete($id) {
            $this->blog->where('id', $id);
            if($this->blog->delete()){
                die('1');
            }
            die('0');

        }
        public function updateStatus($id,$status) {
            $this->blog->where('id',$id);
            $this->blog->set('status', $status);
            if($this->blog->update()){
                die('1');
            }
            die('0');

        }
        public function show($id){
            $blog = [];
            $this->blog->where('id',$id);
            $result = $this->blog->get()->getResult();
            if(!empty($result)){
                $blog = $result[0];
            }
            
            die(json_encode($blog));
            
            
            
        }
    }
?>