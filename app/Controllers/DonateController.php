<?php

    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\Orders;
    class DonateController extends BaseController{
        private $orders = '';
        public function __construct(){
      
            $this->orders = new Orders();
        }   
        public function index(){
            $post = $this->request->getVar();
            
            if($post['testrad2'] !==''){
                $amount = $post['testrad2'];
            }else{
                $amount = $post['testrad'];
            }
            $currency = $post['currency'];
            $data = [
                "amount"=> $amount,
                "currency"=> $currency,
            ];
            if($this->orders->insert($data)){
                $id = $this->orders->getInsertID();
                $clientId = '07491459-1d06-43ec-a5c5-06dfffa2a0f3';
                $username = '3d19541048';
                $password = 'lazY2k';
                $description = 'payment';
                $orderID =  2376532+$id;
                $ch = curl_init();
                $headers  = [
                  'Content-Type: text/json'
                ];
                $postData = [
                  "ClientID"=> $clientId,
                  "Amount"=> 10.0,
                  "OrderID"=> $orderID,
                  "Username"=> $username,
                  "Password"=> $password,
                  "Description"=> "Donation",
//                  "Currency " => $currency,
                  "BackURL" =>  "http://dankar/payment/response",
                ];
                curl_setopt($ch, CURLOPT_URL,"https://servicestest.ameriabank.am/VPOS/api/VPOS/InitPayment");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $result = curl_exec ($ch);
                $result = json_decode($result);
                $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $paymentId = $result->PaymentID;
                return redirect()->to('https://servicestest.ameriabank.am/VPOS/Payments/Pay?id='.$paymentId.'&lang=am');
            }
            
           
        }    
    }