<?php

    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\AboutUs;
    class AboutusController extends BaseController  {
        private $aboutUs ;
        function __construct() {
            $this->aboutUs = new AboutUs();;
        }
        public function index(){
            $aboutUsData = $this->aboutUs->get()->getRowArray();
            
            $data = !is_null($aboutUsData) ? $aboutUsData : [];
            return view('admin/aboutus', ['aboutUs' => $data]);
           
        }
        public function add(){
            
            $response = [
                'status' => 0,
                'message' => '',
            ];
            $require = [
                'aboutus_am' => 'required',
            ];
            if(!$this->validate($require)) {
                
            }else{
                $data = [
                             'aboutus_am'=>$this->request->getVar('aboutus_am'),
                             'aboutus_ru'=>$this->request->getVar('aboutus_ru'),
                             'aboutus_en'=>$this->request->getVar('aboutus_en'),
                         ];
                if($this->aboutUs->get()->getRow()){
                    $query = $this->aboutUs->where('id', $this->request->getVar('id'))->set($data)->update();
                }else{
                    $query = $this->aboutUs->insert($data);
                }
                
                if($query) {
                    $response['status'] = '1';
                }
            }
            die(json_encode($response)); 
        }
        
    }
