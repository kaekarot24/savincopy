<?php
$affiliate = new affiliate($db);

//submit individual affiliate request
if($params[1] == 'individual'){
    
    //validate request
    if(empty($_REQUEST)){
        echo json_encode(array(
            "status"=>"error"
        ));
    }
    
    //store array in variable
    $data = $_REQUEST;

    echo $affiliate->Save_Affiliate(array(
        "action"=>"save",
        "type"=>"individual",
        "data"=>$data
    ));
    
}

//submit company affiliate request
if($params[1] == 'company'){
    
    //validate request
    if(empty($_REQUEST)){
        echo json_encode(array(
            "status"=>"error"
        ));
    }
    
    //store array in variable
    $data = $_REQUEST;

    echo $affiliate->Save_Affiliate(array(
        "action"=>"save",
        "type"=>"company",
        "data"=>$data
    ));
    
}

//submit news affiliate request
if($params[1] == 'news'){
    
    //validate request
    if(empty($_REQUEST)){
        echo json_encode(array(
            "status"=>"error"
        ));
    }
    
    //store array in variable
    $data = $_REQUEST;

    echo $affiliate->Save_Affiliate(array(
        "action"=>"save",
        "type"=>"news",
        "data"=>$data
    ));
    
}

?>