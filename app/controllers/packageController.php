<?php
$package = new package($db);

//pay for callback
if($params[1] == "callback"){

    if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['merchant_order_id'])) 
    {
        $json = array();
        $razorpay_payment_id = $_POST['razorpay_payment_id'];
        $merchant_order_id = $_POST['merchant_order_id'];
        $currency_code = $_POST['currency_code_id'];
        // store temprary data
        $dataFlesh = array(
            'card_holder_name' => $_POST['card_holder_name_id'],
            'merchant_amount' => $_POST['merchant_amount'],
            'merchant_total' => $_POST['merchant_total'],
            'surl' => $_POST['merchant_surl_id'],
            'furl' => $_POST['merchant_furl_id'],
            'currency_code' => $currency_code,
            'order_id' => $_POST['merchant_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
        );
         
        $paymentInfo = $dataFlesh;
        $order_info = array('order_status_id' => $_POST['merchant_order_id']);
        $amount = $_POST['merchant_total'];
        $currency_code = $_POST['currency_code_id'];
        // bind amount and currecy code
        $data = array(
            'amount' => $amount,
            'currency' => $currency_code,
        );

        $success = false;
        $error = '';
        try {
            $ch = $package->get_curl_handle($razorpay_payment_id, $data);
            //execute post
            $result = curl_exec($ch);
            $data = json_decode($result);
           
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
         
            if ($result === false) {
                $success = false;
                $error = 'Curl error: ' . curl_error($ch);
            } else {
                $response_array = json_decode($result, true);
                //Check success response
                if ($http_status === 200 and isset($response_array['error']) === false) {
                    $success = true;
                } else {
                    $success = false;
                    if (!empty($response_array['error']['code'])) {
                        $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                    } else {
                        $error = 'Invalid Response <br/>' . $result;
                    }
                }
            }
            //close connection
            curl_close($ch);
        } catch (Exception $e) {
            $success = false;
            $error = 'Request to Razorpay Failed';
        }
            if ($success === true) {
                if (!$order_info['order_status_id']) {
                    $json['redirectURL'] = $_POST['merchant_surl_id'];
                } else {
                    $json['redirectURL'] = $_POST['merchant_surl_id'];
                }

                //Payment details store in database
                $package->StorePayment_Details(array(
                    "action"=>"store",
                    "userid"=>$_SESSION['user_account']['userid'],
                    "plan_amount"=>$_POST['merchant_amount'],
                    "data"=>$data
                ));

            } else {
                $json['redirectURL'] = $_POST['merchant_furl_id'];

                //Payment details store in database
                $package->StorePayment_Details(array(
                    "action"=>"store",
                    "userid"=>$_SESSION['user_account']['userid'],         
                    "plan_amount"=>$_POST['merchant_amount'],
                    "data"=>$data
                ));
            }
        $json['msg'] = '';
    } else {
        $json['msg'] = 'An error occured. Contact site administrator, please!';
        }
        
        header('Content-Type: application/json');
        echo json_encode($json);
}
