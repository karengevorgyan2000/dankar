<?php

    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\Blog;
    use App\Models\Files;
    class BlogController extends BaseController  {
        private $blog = '';
        private $files = '';
        public function __construct(){
      
            $this->blog = new Blog();      
            $this->files = new Files(); 
        }

        public function index() {
            
            return view('admin/blog');
        }
        public function store($id,$file_id) {
            $count = 0;
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
                
                $file = $this->request->getFiles()['file'];
                
                if($file){
                    
                    $this->files->where('file_original_name', $file->getClientName());
                    $this->files->where('id', $file_id);
                    $count = $this->files->countAllResults();
                    $randomName = $file->getRandomName();
                    if($count>0 && $file_id > 0){
                        
                        $blogUpdateData = [
                            'title_am'=>$this->request->getVar('title_am'),
                            'title_ru'=>$this->request->getVar('title_ru'),
                            'title_en'=>$this->request->getVar('title_ru'),
                            'body_am'=>$this->request->getVar('editor'),       
                            'body_ru'=>$this->request->getVar('editor2'),
                            'body_en'=>$this->request->getVar('editor3'),
                        ];
                        $this->blog->where('id',$id);
                        $this->blog->set($blogUpdateData);
                        
                        if($this->blog->update()){
                            
                            $response['status'] = 1;
                        }
                    
                    }else{
                        
                        if($file_id > 0){
                            
                            $this->files->where('id', $file_id);
                            $query = $this->files->get()->getResult();
                            foreach ($query as $key =>$row){
                                $file_name = $row->file_name;                 
                            }
                            if($file_name){
                                unlink(ROOTPATH."\public\uploads\blog/".$file_name);
                            }
                               
                            if($file->guessExtension() == 'jpeg' || $file->guessExtension() == 'png' || $file->guessExtension() == 'jpg' && $file->getSizeByUnit('mb') < 1){
                                if($file->move(ROOTPATH.'\public\uploads\blog', $randomName)) {
                                    $dataFiles = [
                                        'upload_path'=> ROOTPATH."\public\uploads\blog",
                                        'file_name' => $randomName,
                                        'file_original_name'=>$file->getClientName(),
                                    ];
                                    $this->files->where('id',$file_id);
                                    $this->files->set($dataFiles);
                                    
                                    if($this->files->update()) {
                                        $fileId = $this->files->getInsertID();
                                        $blogData = [
                                            'title_am'=>$this->request->getVar('title_am'),
                                            'title_ru'=>$this->request->getVar('title_ru'),
                                            'title_en'=>$this->request->getVar('title_ru'),
                                            'body_am'=>$this->request->getVar('editor'),       
                                            'body_ru'=>$this->request->getVar('editor2'),
                                            'body_en'=>$this->request->getVar('editor3'),
                                        ];

                                        $this->blog->where('id',$id);
                                        $this->blog->set($blogData);
                                        
                                        if($this->blog->update()) {
                                            $response['status'] = 1;
                                        }
                                    }    
                                }    

                            }
                            
                             
                        }else{
                            
                            if($file->guessExtension() == 'jpeg' || $file->guessExtension() == 'png' || $file->guessExtension() == 'jpg' && $file->getSizeByUnit('mb') < 1){
                                if($file->move(ROOTPATH.'\public\uploads\blog', $randomName)) {
                                    $dataFiles = [
                                        'upload_path'=> ROOTPATH."\public\uploads\blog",
                                        'file_name' => $randomName,
                                        'file_original_name'=>$file->getClientName(),
                                    ];

                                    if($this->files->insert($dataFiles)) {
                                        $fileId = $this->files->getInsertID();
                                        $blogData = [
                                            'file_id' => $fileId,
                                            'title_am'=>$this->request->getVar('title_am'),
                                            'title_ru'=>$this->request->getVar('title_ru'),
                                            'title_en'=>$this->request->getVar('title_ru'),
                                            'body_am'=>$this->request->getVar('editor'),       
                                            'body_ru'=>$this->request->getVar('editor2'),
                                            'body_en'=>$this->request->getVar('editor3'),
                                        ];


                                        if($this->blog->insert($blogData)) {
                                            $response['status'] = 1;
                                        }
                                    }    
                                }    

                            }
                        }
                         
                        

                    }
                    
                    
                }else{
                    if($file_id > 0){
                        $this->files->where('id', $file_id);
                        $query = $this->files->get()->getResult();
                        foreach ($query as $key =>$row){
                            $file_name = $row->file_name;                 
                        }
                        if($file_name){
                            unlink(ROOTPATH."\public\uploads\blog/".$file_name);
                        }
                        
                        $dataFiles = [
                            'upload_path'=> '',
                            'file_name' => '',
                            'file_original_name'=>'',
                        ];
                        $this->files->where('id',$file_id);
                        $this->files->set($dataFiles);
                        if($this->files->update()) {
                            
                        }
                        $blogData = [

                            'title_am'=>$this->request->getVar('title_am'),
                            'title_ru'=>$this->request->getVar('title_ru'),
                            'title_en'=>$this->request->getVar('title_ru'),
                            'body_am'=>$this->request->getVar('editor'),       
                            'body_ru'=>$this->request->getVar('editor2'),
                            'body_en'=>$this->request->getVar('editor3'),
                        ];
                        $this->blog->where('id',$id);
                        $this->blog->set($blogData);

                        if($this->blog->update()) {
                            $response['status'] = 1;
                        }
                    }else{
                        $dataFiles = [
                            'upload_path'=> '',
                            'file_name' => '',
                            'file_original_name'=>'',
                        ];
                        if($this->files->insert($dataFiles)) {
                            $fileId = $this->files->getInsertID();
                            $blogData = [
                                'file_id' => $fileId,
                                'title_am'=>$this->request->getVar('title_am'),
                                'title_ru'=>$this->request->getVar('title_ru'),
                                'title_en'=>$this->request->getVar('title_ru'),
                                'body_am'=>$this->request->getVar('editor'),       
                                'body_ru'=>$this->request->getVar('editor2'),
                                'body_en'=>$this->request->getVar('editor3'),
                            ];


                            if($this->blog->insert($blogData)) {
                                $response['status'] = 1;
                            }
                        }
                    }    
                         
                     
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
                                        <a class ='js-edit-blog cursor-pointer'  data-blog-id ='{$row->id}'data-file-id ='{$row->file_id}' ><i class='fa fa-pencil' style = 'color:#63a268;  font-size :20px;' aria-hidden='true'></i></a>"
                
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
            
            $this->blog->join('files', 'files.id = blog.file_id');;
            $this->blog->where('blog.id',$id);
            $result = $this->blog->get()->getResult();
            if(!empty($result)){
                $blog = $result[0];
            }
            die(json_encode($blog));
            
            
            
        }
    }
?>