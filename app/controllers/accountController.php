<?php
$account = new account($db);

//Register user account
if($params[1] == "register"){

    //Request store in variable
    $data = $_REQUEST;

    echo $account->Register_ByUser(array(
        "action"=>"register",
        "data"=>$data
    ));
}

//login to account
if($params[1] == "login"){
    
    //Request store in variable
    $data = $_REQUEST;

    echo $account->Login_ByUser(array(
        "action"=>"login",
        "data"=>$data
    ));
}


//logout account
if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING']=="logout" && !empty($_SESSION['user_account'])){

    //destroy session
    unset($_SESSION['user_account']);
    unset($_SESSION);
    
    session_destroy();

    header("Location: account");
}

?>