<?php

    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\Transactions;
    class ReviewController extends BaseController{
        private $transactions = '';
        public function __construct(){
      
            $this->transactions = new Transactions();
        }   
        public function index(){
            $status = '';
            $username = '3d19541048';
            $password = 'lazY2k';
            $paymentId = $_GET['paymentID'];
            $headers  = [
              'Content-Type: application/xml'
            ];
            $postData = [
              "PaymentID " => $paymentId,
              "Username"=> $username,
              "Password"=> $password,
            ];
            $ch = curl_init();
            
            $xml = "<PaymentDetailsRequest>
                  <PaymentID>$paymentId</PaymentID>
                  <Username>$username</Username>
                  <Password>$password</Password>
                </PaymentDetailsRequest>
                ";
            
            
            curl_setopt($ch, CURLOPT_URL,"https://servicestest.ameriabank.am/VPOS/api/VPOS/GetPaymentDetails");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $res = curl_exec($ch);
            $result = json_decode($res);
            $amount = $result->Amount;

            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($result){
                $xmlConfirm = "<ConfirmPaymentRequest>
                  <PaymentID>$paymentId</PaymentID>
                  <Username>$username</Username>
                  <Password>$password</Password>
                  <Amount>$amount</Amount>
                </ConfirmPaymentRequest>
                ";
                curl_setopt($ch, CURLOPT_URL,"https://servicestest.ameriabank.am/VPOS/api/VPOS/ConfirmPayment");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlConfirm);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $resultConfirm = curl_exec($ch);
                $resultConfirm = json_decode($resultConfirm);

                if($resultConfirm->ResponseCode == 00){
                    $status = 'approved';
                }else{
                    $status = 'rejected';
                }
                $message = $result->Description;

                $dataTransactions = [
                    "order_id"=> $result->OrderID,
                    "payment_id"=> $paymentId,
                    "status"=> $status,
                    "data_obj"=> $res,
                ];


                if($this->transactions->insert($dataTransactions)){
                  $response['message'] = $message;
                  return view('paymentResponse',$response);
                }
                
                
                
                
            }
    }
}    

