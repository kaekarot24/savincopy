<?php
$db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if($db->connect_errno > 0)
{
		die("DB TECHNICAL GLUTCH!");
}

$db->query("SET time_zone = '"._GMT_TIME_DIFFERENCE."'");
$db->query("SET CHARACTER SET '".DB_CHARSET."'");
$db->query("SET SESSION collation_connection ='".DB_COLLATE."'");

function f_query($sql) {
    global $db; 
    if($res = $db->query($sql)){
        return $res;
    }else{
        //if(DEBUG_MODE)return '-1'.$db->error;
        //error_log($db->error,0);
        return -1;
    }   
}

?>