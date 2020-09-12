<?php
$home = new home($db);

//submit sales enquiry
if($params[1] == 'enquiry'){
    
    //validate request
    if(empty($_REQUEST)){
        echo json_encode(array(
            "status"=>"error"
        ));
    }
    
    //store array in variable
    $data = $_REQUEST;

    echo $home->Save_Enquiry(array(
        "action"=>"save",
        "data"=>$data
    ));
    
}

?>