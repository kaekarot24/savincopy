<?php
class package extends defaultModel
{
    public $db;
    
    public function __construct($db)
    {
        $this->db = $db;

        //parent::CheckPageSession();
        
    }

    // initialized cURL Request
    public function get_curl_handle($payment_id, $data) 
    {
            $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
            $key_id = RAZOR_KEY_ID;
            $key_secret = RAZOR_SECRET_ID;
            $params = http_build_query($data);
            //cURL Request
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            return $ch;
    }

    //payment details stored in database
    public function StorePayment_Details($request = array())
    {
        # code...
        if(!empty($request) && $request['action']=="store"){
                 
              //details store in variable
              $data = $request['data'];

              //amount convert into rupees
              $order_id = $data->notes->soolegal_order_id;
              $transactionid = $data->acquirer_data->bank_transaction_id;
              $paymentid  = $data->id;
              $paid   = intval($data->amount/100);
              $paidwithoutgst = $request['plan_amount'];
              $payfee = intval($data->fee/100);
              $paytax = intval($data->tax/100);

              $update = "INSERT INTO `savin_payment_info` SET `user_id`='".$request['userid']."',
                                                         `payment_id`='".$paymentid."',
                                                         `currency`='".$data->currency."',
                                                         `paid_amount`='".$paidwithoutgst."',
                                                         `paid_taxable_amount`='".$paid."',
                                                         `status`='".$data->status."',
                                                         `pay_method`='".$data->method."',
                                                         `pay_bank`='".$data->bank."',
                                                         `order_id`='".$order_id."',
                                                         `pay_fee`='".$payfee."',
                                                         `pay_tax`='".$paytax."',
                                                         `bank_transaction_id`='".$transactionid."',
                                                         `created_at`='".$data->created_at."'";
              $result = $this->db->query($update);

        }
    }


}
?>