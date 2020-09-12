<?php
$contact = new contactus($db);

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();

//submit contact request
if($params[1] == 'contact'){
    
    //store array in variable
    $data = $_REQUEST;

    $response = json_decode($contact->Save_Contact(array(
        "action"=>"save",
        "data"=>$data
    )), true);

    if('success' == $response['status'])
    { 
        //send mail using PHPMailer
        $mail->isSMTP();
        $mail->SMTPSecure = SMTPAUTH;
        $mail->Host = MAILSERVER;
        $mail->Port = SMTPPORT;
        $mail->SMTPAuth = true;
        $mail->Username = MAILUSERNAME;
        $mail->Password = MAILPASSWORD;
        $mail->setFrom('no-reply@gmail.com','Contact Query');
        $mail->addAddress(MAILUSERNAME);
        $mail->Subject = $data['template_contactform_subject'];
        $mail->Body    = $data['template_contactform_message'];
        $mail->send();
    }

    echo json_encode(array("status"=>$response['status'],"msg"=>$response['msg']));
    
}

?>