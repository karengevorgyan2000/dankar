<?php
    
    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\Transactions;
    class TransactionsController extends BaseController {
        
        private $transactions = '';
        
        public function __construct(){
      
            $this->transactions = new Transactions();    
        }
		
		
        
        public function index(){
			
			$this->sendMail();
			exit;
            return view('admin/transactions');
           
        }
        public function list(){
			$fields = ['id','','','', 'status'];
            $limit = $this->request->getVar('length');
            $page = $this->request->getVar('start')/$limit +1;
            $offset = ($page-1)*$limit;
            $query = $this->transactions->limit($limit);
            $query = $this->transactions->offset($offset);
			
			if($this->request->getVar('search')['value'] != ''){
			   $query   = $query->like('transactions.data_obj', $this->request->getVar('search')['value'], 'both');

			}
            if(!empty($this->request->getVar('order'))) {
                $ordering = $this->request->getVar('order');
                foreach ($ordering as $orderInfo) {
                    $query = $query->orderBy($fields[$orderInfo['column']], strtoupper($orderInfo['dir']));
                }
            }
            $result = $query->get()->getResult();
			$res = [];
			$currency = array(
				'051' => 'AMD',
				'978' => 'EUR',
				'840' => 'USD',
				'643' => 'RUB',
			);
            foreach($result as $key => $val) {
                $data_obj = json_decode($val->data_obj);
				foreach($currency as $num => $str) {
					if($data_obj->Currency == $num){
						$amount = $data_obj->Amount.'/'.$str;
					}
				}
                $res[$key] = [
                    'id' => $val->id,
                    'order_id' => $val->order_id,
                    'payment_id' => $val->payment_id,
                    'amount' => $amount,
                    'status' => $val->status,
                    'name' => $data_obj->ClientName,
                    'email' => $data_obj->ClientEmail,
                    'created_at' => $val->created_at,
                    'data_obj' => $data_obj,
                    'all_details' => "<a class ='show_all_data cursor-pointer' data-all ='{$val->data_obj}' data-toggle='modal' data-target='#exampleModalLong'>Show All Details</a>"
                ];
              }
            $data = [
              'draw' =>   $this->request->getVar('draw'),
              'recordsTotal' => count($res),  
              'recordsFiltered' => $this->transactions->countAll(),  
              'data' => $res,  
              'input' => $this->request->getRawInput()
            ];
            die(json_encode($data));
        }
        
		
    }