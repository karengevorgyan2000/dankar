<?php
    
    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\HomeSlider;
    use App\Models\Files;
    class HomeController extends BaseController {
        
        private $homeSlider = '';
        private $files = '';
        
        public function __construct(){
      
            $this->homeSlider = new HomeSlider();      
            $this->files = new Files();      
        }
        
        public function index(){
           return view('admin/home');
//            
        }
        public function store(){
            $response = [
                'status' => 0,
                'message' => '',
            ];
            
            
            if (empty($this->request->getFiles()['file'])) {
                
                
            } else {
                // do upload
                
                $file = $this->request->getFiles()['file'];
                $randomName = $file->getRandomName();
                if($file->guessExtension() == 'jpeg' || $file->guessExtension() == 'png' || $file->guessExtension() == 'jpg' && $file->getSizeByUnit('mb') < 1){
                    if($file->move(ROOTPATH.'\public\uploads\slider', $randomName)) {
                        // save in files table
                        // get inserted row id
                        // save data in home_slider table
                        $dataFiles = [
                            'upload_path'=> ROOTPATH."\public\uploads\slider",
                            'file_name' => $randomName,
                            'file_original_name'=>$file->getClientName(),

                        ];
                            if($this->files->insert($dataFiles)) {
                                $fileId = $this->files->getInsertID();
                                $slideData = [
                                    'file_id' => $fileId,
                                    'title_left' => $this->request->getVar('title_left'),
                                    'title_right' => $this->request->getVar('title_right'),
                                ];
                                
                                if($this->homeSlider->insert($slideData)) {
                                    $response['status'] = 1;
                                }
                                
                                                        
                            }
                        
                    } else {
                        
                    }
                    
                   
                    
                } 
                
                

                
            }
            die(json_encode($response));
        }
        public function edit($id){
            // var_dump($this->request->getRawInput()['title']);exit();
            // var_dump($this->request->getVar('title_update'));exit();
            $this->homeSlider->where('id',$id);
            $this->homeSlider->set('title_left', $this->request->getVar('title_left_update'));
            $this->homeSlider->set('title_right', $this->request->getVar('title_right_update'));

            if($this->homeSlider->update()){
                die('0');
            }
        }
        public function slideList(){
            $fields = ['id', 'title_left','title_right', 'status', 'created_at'];
            $action = '';
            $status = '';
            $limit = $this->request->getVar('length');
            $page = $this->request->getVar('start')/$limit +1;
            $offset = ($page-1)*$limit;
//            var_dump($this->request->getRawInput());exit;
            
            $this->homeSlider->join('files', 'files.id = home_slider.file_id');
            $query = $this->homeSlider->limit($limit);
            $query = $this->homeSlider->offset($offset);
            if($this->request->getVar('search')['value'] != ''){
                $query   = $query->like('home_slider.title', $this->request->getVar('search')['value'], 'both');
            
            }
            if(!empty($this->request->getVar('order'))) {
                $ordering = $this->request->getVar('order');
                foreach ($ordering as $orderInfo) {
                    $query = $query->orderBy('home_slider.'.$fields[$orderInfo['column']], strtoupper($orderInfo['dir']));
                }
            }
            
            
//            var_dump($query->getCompiledSelect());exit;
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
                        "<a class ='js-delete-file cursor-pointer' data-slide-id ='{$row->id}'><i class='fa fa-trash-o ' style = 'color:#a26363; font-size:20px; ' ></i></a>
                        <a class ='js-status-file cursor-pointer ml-3 mr-3' data-slide-id ='{$row->id}' style = 'color:#a9a141;  font-size:20px;' data-slide-status ='{$status}'>{$icon}</a>
                        <a class ='js-edit-file cursor-pointer' data-slide-id ='{$row->id}' ><i class='fa fa-pencil' style = 'color:#63a268;  font-size :20px;' aria-hidden='true'></i></a>"
                                        
                
                ;
                 $result[$key]->title = substr($row->title, 0, 20);                       
                 $result[$key]->image = "<img src='".APP_URL."/uploads/slider/".$row->file_name."' width='50'>";                       
            }
            
            
            $data = [
              'draw' =>   $this->request->getVar('draw'),
              'recordsTotal' => count($result),  
              'recordsFiltered' => $this->homeSlider->countAll(),  
              'data' => $result,  
              'input' => $this->request->getRawInput()
            ];
            die(json_encode($data));
        }
        public function delete($id) {
            $this->files->where('id', $id);
            $query = $this->files->get()->getResult();
            foreach ($query as $key =>$row){
                $file_name = $row->file_name;                 
            }
            if(unlink(ROOTPATH."\public\uploads\slider/".$file_name)){
                $this->files->where('id', $id);
                $this->homeSlider->where('file_id', $id);
                if($this->files->delete() && $this->homeSlider->delete()){
                    die('1');
                }else{
                    die('0');
                }
            }else{
                die('0');
            }
            
            
            
            
            

        }
        public function updateStatus($id,$status) {
            $this->homeSlider->where('file_id',$id);
            $this->homeSlider->set('status', $status);
            if($this->homeSlider->update()){
                die('1');
            }
            die('0');

        }
        public function show($id){
            $slide = [];
            $this->homeSlider->where('file_id',$id);
            $result = $this->homeSlider->get()->getResult();
            if(!empty($result)){
                $slide = $result[0];
            }
            
            die(json_encode($slide));
            
            
            
        }
    }