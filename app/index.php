<?php
$time_start = microtime(true); 

if ("POST" == $_SERVER["REQUEST_METHOD"] || "GET" == $_SERVER["REQUEST_METHOD"]) {
    if (isset($_SERVER["HTTP_ORIGIN"])) {
        switch ($_SERVER['HTTP_ORIGIN']) 
		{ 
			//case 'http://www.example.com': case 'http://my.example.com': case 'http://example.com': 
			case $_SERVER['HTTP_ORIGIN']: 

			header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']); 
			header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS'); 
			header('Access-Control-Max-Age: 1000'); 
			header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 
			break; 
		}
    }
}


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

require_once "../config/config.php";
require_once "./includes/database.php";

//require_once "./includes/db_functions.php";
require_once "./includes/functions.php";

if (file_exists(ABSOLUTE_PATH.'../vendor/autoload.php')) {
    require ABSOLUTE_PATH.'../vendor/autoload.php';
}

add_slashes();


require_once "./init.php";


?>
