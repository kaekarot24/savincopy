<?php

// -------------- LOAD GLOBAL CONTROLLER AND MODEL CLASSES -----------------
include_once ABSOLUTE_PATH.'models/defaultModel.php';
include_once ABSOLUTE_PATH.'controllers/indexController.php';

if($_SERVER['HTTP_X_FORWARDED_FOR'] !='')
{
	define('REMOTE_ADDR', $_SERVER['HTTP_X_FORWARDED_FOR']);
}
elseif($_SERVER['REMOTE_ADDR'] !='')
{
	define('REMOTE_ADDR', $_SERVER['REMOTE_ADDR']);
}

$browser = get_the_browser();
$os      = get_operating_system();
define('USER_BROWER', $browser);
define('USER_OS', $os);

//php_session passes with curl to set session in CURL request
if(isset($_POST['php_session']))
{
	$_SESSION = unserialize($_POST['php_session']);
}

define('MAIL_TEMPLATE_DIR',ABSOLUTE_PATH.'mail-template/');
define('REQUEST_TIME',date("Y-m-d H:i:s",time()));
define('ADMIN_EMAIL_FOOTER', 'beduthemissionpvtltd.com');
define('ADMIN_EMAIL', 'beduthemissionpvtltd.com');


//echo PROJECT_PATH;
$charCount = strlen(PROJECT_PATH);
$URI_Str = substr($_SERVER['REQUEST_URI'],$charCount);

//echo $URI_Str = str_replace(PROJECT_PATH,'',$_SERVER['REQUEST_URI'],$onereplace); die;
$URI_Str = explode('?',$URI_Str); 

$urlString = str_replace(SUB_DIR.'/','',$URI_Str[0]);

$params = explode('/',$urlString);

$requestController = $params[0];

array_shift($params);

if($requestController == '')
{
	$requestController = 'home';
}
$loadTemplate = $requestController;

$donotLoadTemplate = false;
if(trim($params[0]) == 'xhr')
{
	$donotLoadTemplate = true;
}

$validRequestControllers = getControllers(ABSOLUTE_PATH.'controllers');



if(!in_array($requestController,$validRequestControllers))
{
	header("HTTP/1.0 404 Not Found");
	include_once './views/error.php';
}


// -------------- LOAD MODEL -----------------

if(file_exists(ABSOLUTE_PATH.'models/'.$loadTemplate.'Model.php'))
{
	ob_start();
	include_once ABSOLUTE_PATH.'models/'.$loadTemplate.'Model.php';
	ob_clean();
}

// -------------- LOAD CONTROLLER -----------------

if(file_exists(ABSOLUTE_PATH.'controllers/'.$loadTemplate.'Controller.php'))
{

	include_once ABSOLUTE_PATH.'controllers/'.$loadTemplate.'Controller.php';
}


// -------------- LOAD TEMPLATE -----------------
if($donotLoadTemplate != true)
{
	if(DEBUG_MODE == true && false)
	{
		
		echo '<div style="display:absolute;font-family:arial; font-size:10px;width:100%; background:#ccc;padding: 3px;top:0px;z-index:1000;">';
		
		echo '<b>Requested View:</b> '.$loadTemplate;
		echo ' &nbsp; ';
        if (count($params) > 0) {
            echo '<b>Params:</b> ';
            //echo implode("|",$params);
            print_R($params);
        }
		$time_end = microtime(true);
		$execution_time = ($time_end - $time_start);
		echo '&nbsp;&nbsp; <b>Total Execution Time:</b> '.$execution_time.' ms';
		echo '</div>';
		
	}

	if(file_exists('./views/'.$loadTemplate.'.php'))
	{
		include_once './views/'.$loadTemplate.'.php';
		die;
	}
	else if ($loadTemplate == '')
	{
		include_once './views/home.php';
		die;
	}
	else
	{
		include_once './views/error.php';
		die;
	}
}


?>
