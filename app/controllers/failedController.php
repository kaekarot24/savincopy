<?php
$failed = new failed($db);

//check order id exist or not
$response = json_decode($failed->Check_Order($_SERVER['QUERY_STRING']), true);
if(true !== $response['status'] && $_SESSION['user_account']['userid']!=$response['data']['user_id']){
 header("Location: dashboard");
}
?>