<?php 

define('DB_NAME', 'savin');
define('DB_USER', 'root');
define('DB_PASSWORD', '');  
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_general_ci');

set_time_limit(0);
ini_set('memory_limit', '96M');
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
ini_set("session.use_cookies", "1");
ini_set("session.use_trans_sid", "false");
ini_set('session.gc_maxlifetime',7200);
ini_set('display_errors', 1);

@session_cache_limiter('none');
@ini_set('session.save_handler', 'files');
@session_start();

$timeDiff = '+05:30';
define('TIMEZONE', 'Asia/Kolkata');
date_default_timezone_set(TIMEZONE); // muscat gmt +4:00 or mauritius gmt +4:00
define('_GMT_TIME_DIFFERENCE', $timeDiff);
define('_CURRENTTIME',date('Y-m-d H:i:s'));

// --- SMTP Mail Server ---
define('MAILSERVER','smtp.gmail.com');   //smtpout.secureserver.net
define('SMTPPORT','587');
define('SMTPAUTH','tls');
define('MAILUSERNAME','XXXXXXXXXXXX'); 
define('MAILPASSWORD','XXXXXXXX');	 
define('REQUEST_TIME',date("Y-m-d H:i:s",time()));
define('REQUEST_DATE',date("Y-m-d",time()));

//RazorPay Payment Gateway Keys
define('RAZOR_KEY_ID', 'XXXXXXXXXXXX');
define('RAZOR_SECRET_ID', 'XXXXXXXXXXXX');

//Google REcaptcha Keys
define('SITEKEY', 'XXXXXXXXXXXX');
define('SECRETKEY', 'XXXXXXXXXXXX');

if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $protocol = 'https://';
}
else {
  $protocol = 'http://';
}

if(getenv('ENVIRONMENT') == "production")
{
	define("_LOCAL",false);
	define('PROJECT_PATH','/');
	define('SUB_DIR','savincommunication.com');
	define('GL_SITE_URL',$protocol.SUB_DIR);
	define('ABSOLUTE_PATH',str_replace('\\','/',realpath('.').'/'));
	define("DEBUG_MODE",false);
}
else
{
	define("_LOCAL",true);
	define('PROJECT_PATH','/');
	define('SUB_DIR','savin');
	define('GL_SITE_URL',$protocol.'localhost/'.SUB_DIR);
	define('ABSOLUTE_PATH',realpath('.').'/');
	define("DEBUG_MODE",true);
}

putenv('HOME='.ABSOLUTE_PATH);

if(DEBUG_MODE == true)
{
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_STRICT ^ E_DEPRECATED);
	ini_set('display_errors', 1);
}
else
{
	error_reporting(0);
	ini_set('display_errors', 0);
}

?>
