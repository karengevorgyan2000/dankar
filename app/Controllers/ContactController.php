<?php
     
    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\Messages;
    use App\Models\Files;
    class ContactController extends BaseController {
        private $messages = '';
        private $files = '';
        public function __construct(){
      
            $this->messages = new Messages();      
            $this->files = new Files(); 
        }

        
        public function mail(){
            $rules = [
                    'name'	=> 'required',
                    'email'    => 'required',
                    'subject'    => 'required',
                    'message'    => 'required',
            ];
            $fileId = '';
            if (! $this->validate($rules)) {
                $response = 1;
                die(json_encode($response));
            }else{
                $file = $this->request->getFiles()['file'];
                
                if($file->getClientName() !== ''){
                    
                    $randomName = $file->getRandomName();
                    if($file->move(ROOTPATH.'\public\uploads\messages', $randomName)) {
                        $dataFiles = [
                            'upload_path'=> ROOTPATH."\public\uploads\messages",
                            'file_name' => $randomName,
                            'file_original_name'=>$file->getClientName(),
                        ];
                        $this->files->insert($dataFiles);
                        $fileId = $this->files->getInsertID();
                    } 
                    
                }else{
                    $dataFiles = [
                            'upload_path'=> "",
                            'file_name' => '',
                            'file_original_name'=>'',
                        ];
                    $this->files->insert($dataFiles);
                    $fileId = $this->files->getInsertID();
                }
                $contactMessage = [
                    'name'=>$this->request->getVar('name'),
                    'email'=>$this->request->getVar('email'),
                    'subject'=>$this->request->getVar('subject'),
                    'message'=>$this->request->getVar('message'),
                    'file_id'=>$fileId,

                ];
                if($this->messages->insert($contactMessage)) {
                    $response = 0;
                    die(json_encode($response));
                }
                
            }
            
           
        }
    }    
