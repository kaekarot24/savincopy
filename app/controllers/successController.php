<?php
$success = new success($db);

//check order id exist or not
$response = json_decode($success->Check_Order($_SERVER['QUERY_STRING']), true);
if(true !== $response['status'] && $_SESSION['user_account']['userid']!=$response['data']['user_id']){
 header("Location: dashboard");
}

//package name
$package = array("14999"=>"STARTER","39999"=>"PROFESSIONAL","119999"=>"BUSINESS","199999"=>"UNLIMITED");
$amount  = $response['data']['paid_amount'];

//get package name
if(true === $response['status']){
   
    $paidamount = $response['data']['paid_amount'];

    switch($paidamount){

       case '14999':
       $package_name = $package['14999'];
       break;

       case '39999':
       $package_name = $package['39999'];
       break;
        
       case '119999':
       $package_name = $package['119999'];
       break;

       case '199999':
       $package_name = $package['199999'];
       break;    

    }
    
}
?>