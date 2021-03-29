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
            return view('admin/transactions');
           
        }
        public function list(){
            $limit = $this->request->getVar('length');
            $page = $this->request->getVar('start')/$limit +1;
            $offset = ($page-1)*$limit;
            $query = $this->transactions->limit($limit);
            $query = $this->transactions->offset($offset);
//            if($this->request->getVar('search')['value'] != ''){
//                $query   = $query->like('$transactions.id', $this->request->getVar('search')['value'], 'both');
//            
//            }
            if(!empty($this->request->getVar('order'))) {
                $ordering = $this->request->getVar('order');
                foreach ($ordering as $orderInfo) {
                    $query = $query->orderBy('transactions.id', strtoupper($orderInfo['dir']));
                }
            }
            $result = $query->get()->getResult();
            foreach($result as $key => $val) {
                $data_obj = json_decode($val->data_obj);
                $res[$key] = [
                    'id' => $val->id,
                    'order_id' => $val->order_id,
                    'payment_id' => $val->payment_id,
                    'amount' => $data_obj->Amount.'/'.$data_obj->Currency,
                    'status' => $val->status,
                    'name' => $data_obj->ClientName,
                    'email' => $data_obj->ClientEmail,
                    'created_at' => $val->created_at,
                    
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