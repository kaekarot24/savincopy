<?php 

$md = new defaultModel($db);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//use Twilio\Rest\Client; 


//$sid    = "ACeb405be282e998438f19c9490db98111"; 
//$token  = "3c30b3a1dc2ce6f93611113235ed467c"; 
//$twilio = new Client($sid, $token); 

function getPhpMailer()
{
    $phpMailer = new PHPMailer(true);

    $phpMailer->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
	//Server settings
    if ($_GET['debug'] == 1) {
        $phpMailer->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    }
	$phpMailer->isSMTP();                                            // Send using SMTP
	$phpMailer->Host       = MAILSERVER;                    // Set the SMTP server to send through
	$phpMailer->SMTPAuth   = SMTPAUTH;                                   // Enable SMTP authentication
	$phpMailer->Username   = MAILUSERNAME;                     // SMTP username
	$phpMailer->Password   = MAILPASSWORD;                               // SMTP password
	$phpMailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	$phpMailer->Port       = SMTPPORT;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	return $phpMailer;
}
