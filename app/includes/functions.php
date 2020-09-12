<?php


function UR_exists($url){
	$headers	=	get_headers($url);
	return stripos($headers[0],"200 OK")?true:false;
}

function obfuscate_email_old($email)
{
    $em   = explode("@",$email);
    $name = implode(array_slice($em, 0, count($em)-1), '@');
    $len  = floor(strlen($name)/2);

    return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);   
}

function obfuscate_email( $email, $mask_char='*', $percent=50 )
{

        list( $user, $domain ) = preg_split("/@/", $email );

        $len = strlen( $user );

        $mask_count = floor( $len * $percent /100 );

        $offset = floor( ( $len - $mask_count ) / 2 );

        $masked = substr( $user, 0, $offset )
                .str_repeat( $mask_char, $mask_count )
                .substr( $user, $mask_count+$offset );


        return( $masked.'@'.$domain );
}

function encrypt($string) 
{
  $key =PIN_KEY;
  $result = '';
  for($i=0; $i<strlen($string); $i++) 
  {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)+ord($keychar));
    $result.=$char;
  }
	return base64_encode($result);
}
/*function to decrypt pincode*/
function decrypt($string) 
{
  $key = PIN_KEY;
  $result = '';
  $string = base64_decode($string);
  for($i=0; $i<strlen($string); $i++) 
  {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)-ord($keychar));
    $result.=$char;
  }
  return $result;
} 



function getPairInfo($lftCount,$rgtCount,$ratio='1:1') {
	$comPart = explode(':',$ratio);
	$lftFactor = floor($lftCount/$comPart[0]);
	$rgtFactor = floor($rgtCount/$comPart[1]);
	if($rgtFactor > $lftFactor)
	{
		$pairs = $lftFactor;
		$powerLeg = 'right';
	}
	else if($lftFactor >= $rgtFactor) 
	{
		$pairs = $rgtFactor;
		$powerLeg = 'left';
	}
	$lftUsed = $comPart[0]*$pairs;
	$rgtUsed = $comPart[1]*$pairs;
	$carry["pair"] = $pairs;
	$carry["left"] = $lftCount - $lftUsed;
	$carry["right"] = $rgtCount - $rgtUsed;
	return $carry;
}


function a_an($string) 
{ 
	$x = substr($string,0,1);
    if ($x == 'a' || $x == 'e' || $x == 'i' ||  
        $x == 'o' || $x == 'u' || $x == 'A' ||  
        $x == 'E' || $x == 'I' || $x == 'O' ||  
		$x == 'U') {
		return 'an';
	}
	else{
        return 'a';
    }
} 

function sec2min($seconds)
{
	$init = $seconds;
	$hours = floor($init / 3600);
	if($hours > 0)
	{
		return $hours.' hour(s)';
	}
	$minutes = floor(($init / 60) % 60);
	if($minutes > 0)
	{
		return $minutes.' min(s)';
	}
	$seconds = $init % 60;
	if($seconds > 0)
	{
		return $seconds.' sec(s)';
	}
}
  
function time_Ago($time) { 
  
    // Calculate difference between current 
    // time and given timestamp in seconds 
    $diff     = time() - $time; 
      
    // Time difference in seconds 
    $sec     = $diff; 
      
    // Convert time difference in minutes 
    $min     = round($diff / 60 ); 
      
    // Convert time difference in hours 
    $hrs     = round($diff / 3600); 
      
    // Convert time difference in days 
    $days     = round($diff / 86400 ); 
      
    // Convert time difference in weeks 
    $weeks     = round($diff / 604800); 
      
    // Convert time difference in months 
    $mnths     = round($diff / 2600640 ); 
      
    // Convert time difference in years 
    $yrs     = round($diff / 31207680 ); 
      
    // Check for seconds 
    if($sec <= 60) { 
        return "$sec seconds ago"; 
    } 
      
    // Check for minutes 
    else if($min <= 60) { 
        if($min==1) { 
            return "one minute ago"; 
        } 
        else { 
            return "$min minutes ago"; 
        } 
    } 
      
    // Check for hours 
    else if($hrs <= 24) { 
        if($hrs == 1) {  
            return "an hour ago"; 
        } 
        else { 
            return "$hrs hours ago"; 
        } 
    } 
      
    // Check for days 
    else if($days <= 7) { 
        if($days == 1) { 
            return "Yesterday"; 
        } 
        else { 
            return "$days days ago"; 
        } 
    } 
      
    // Check for weeks 
    else if($weeks <= 4.3) { 
        if($weeks == 1) { 
            return "a week ago"; 
        } 
        else { 
            return "$weeks weeks ago"; 
        } 
    } 
      
    // Check for months 
    else if($mnths <= 12) { 
        if($mnths == 1) { 
            return "a month ago"; 
        } 
        else { 
            return "$mnths months ago"; 
        } 
    } 
      
    // Check for years 
    else { 
        if($yrs == 1) { 
            return "one year ago"; 
        } 
        else { 
            return "$yrs years ago"; 
        } 
    } 
} 


//Function to check email validity
function check_email($email) 
{
	// First, we check that there's one @ symbol, and that the lengths are right
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) 
	{
	// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
	return false;
	}
	else	 
	return true;
}

function removeSpacefromString($string)
{
	return preg_replace('/\s/', '', $string);
}

function replaceDoubleDots($path)
{
    // change .. to .
    $path = preg_replace('@\.\.*@', '.', $path);
    return $path;
}

function add_slashes()//add slashes from POST vars
{
	if (!get_magic_quotes_gpc()) 
	{
		$_POST = modify_array($_POST,'addslash');
	}
}

function modify_array($Arr,$mode)
{//add recursive slash
	if(is_array($Arr))
	{
		foreach($Arr as $key => $value)
		{
			$Arr[$key] = modify_array($Arr[$key],$mode);
		}
	}
	else
	{
		if($mode == 'addslash')
			$Arr = addslashes(trim($Arr));
		elseif($mode == 'removeslash')
			$Arr = stripslashes(trim($Arr));
		elseif($mode == 'htmlentity')
			$Arr = htmlentities(trim($Arr),ENT_QUOTES);
		elseif($mode == 'parsefloat')
			$Arr = (float)htmlentities($Arr);
		elseif($mode == 'trim')
			$Arr = trim($Arr);
		elseif($mode == 'unset')
			$Arr = '';
	}
	return $Arr;
}


function moneyFormat($money)
{
	global $currency;

	if($currency == 'INR')
	{
		$money = (int)$money;
		return $currency.' '.moneyFormatIndia($money);
		
	}else{
		setlocale(LC_MONETARY, 'en_US');
		//$return = money_format("%i",$money);
		//$return = str_replace("USD","USD ",$return);
		$return = "USD ".$money;
		return $return;	
	}
	
	//

	/*
	$format = number_format((float)$money,1);
	$format = preg_replace("/\.?0*$/",'',$format);  
	return $format;
	*/
}

function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}

/*
function to change validity of an email address
error code : -1 Email Not Exists
error code : -2 Invalid Email Address
error code : 0  Blank Email Address
success code : 1
*/
function checkEmail($email) {

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	  } else {
		return false;
	  }
}  


function showRankName($rank)
{
	global $RANK_ARR;
	return $RANK_ARR[$rank];
}

function showRankBadge($rank)
{
	global $RANK_ARR;
	//return '<img src="/assets/images/rank_min'.$rank.'.png" class="m-img-rounded kt-marginless" style="height:22px;"/>&nbsp;'.$RANK_ARR[$rank];
	if($rank == 0)
	{
		return '<span>Associate</span>';
		//return '<img src="/assets/images/rank_min0.png" class="m-img-rounded kt-marginless" style="height:30px;"/>&nbsp;Associate';
	}
	else{
		return '<img src="/assets/images/rank_min'.$rank.'.png" class="m-img-rounded kt-marginless" style="height:22px;"/>&nbsp;'.$RANK_ARR[$rank];
	}
}

function getRank($memberId)
{
	global $db;
	$sql = "SELECT * FROM sv_member WHERE memberId = '".$memberId."'";
	$query = $db->query($sql);
	$result = $query->fetch_object(); 	
	return 	$result->myrank;
	//return showProfileRankBadge($result->myrank);
}

function showProfileRankBadge($rank)
{
	global $RANK_ARR;
	return '<img src="/assets/images/rank_min'.$rank.'.png" class="img-fluid" id="profile_rank_badge"/>';
}

/*---------------------START Mail Send-------------------------------*/

function sendMail($email,$subject,$template,$tokens,$username='')
{
	global $db;

	//----------DISABLED EMAIL STATED----------
	//sleep(1);
	//return true;
	//----------DISABLED EMAIL ENDED----------
	
	$mailObject = getPhpMailer();

    $sql = "SELECT * FROM sv_options WHERE option_name ='mailer'";
	$query = $db->query($sql);
	$result = $query->fetch_object();
	$mailer = $result->option_value;

	if($username != '')
	{
		$sql = "SELECT * FROM sv_memberlogin WHERE username ='".$username."'  ";
		$query = $db->query($sql);
        if ($result = $query->fetch_object()) {
            $status = $result->status;
        }

		if($status != '1')
		{
			return true;
		}
	}

    if ($mailer !='off') {
		

		$template = getEmailtemplate($template);
		if($template == false)
		{	
			return false;
		}
		$body = replaceTokens($template,$tokens);

        try {
            //Recipients
            $mailObject->setFrom('no-reply@tripr.com', 'Tripr');
            $mailObject->addAddress($email, '');     // Add a recipient
            //$phpMailer->addReplyTo('no-reply@example.com', 'Example');
            
            // Attachments
            //$phpMailer->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$phpMailer->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mailObject->isHTML(true);                                  // Set email format to HTML
            $mailObject->Subject = $subject;
            $mailObject->Body    = $body;
            $mailObject->AltBody = $body;//NON - HTML BODY
			
			$mailObject->send();
			
			
            return true;
        } catch (Exception $e) {
			//echo "Message could not be sent. Mailer Error: {$phpMailer->ErrorInfo}";
			return false;
        }
    }

}



function sendMail_swift($email,$type,$template,$tokens,$username='')
{
	global $db;
    $sql = "SELECT * FROM sv_options WHERE option_name ='mailer'";
	$query = $db->query($sql);
	$result = $query->fetch_object();
	$mailer = $result->option_value;

	if($username != '')
	{
		$sql = "SELECT * FROM sv_memberlogin WHERE username ='".$username."'  ";
		$query = $db->query($sql);
        if ($result = $query->fetch_object()) {
            $status = $result->status;
        }

		if($status != '1')
		{
			return true;
		}
	}

	if($mailer !='off')
	{
		//------RESTRICT EMAIL RATE FOR A SINGLE LOGIN-----
		/*	
		if ($_SESSION['triprMemberId'] > 0) {
			if (isset($_SESSION[$email]['EMAIL_CALL_'.$template])) {
				$last = strtotime($_SESSION[$email]['EMAIL_CALL_'.$template]);
				$curr = strtotime(date("Y-m-d h:i:s"));
				$sec =  abs($last - $curr);
				if ($sec <= 30) {
					return true;
				}
			}
			$_SESSION[$email]['EMAIL_CALL_'.$template] = date("Y-m-d h:i:s");
		}
		*/
		/*global $mandrill;
		$transport = Swift_SmtpTransport::newInstance($mandrill['host'],$mandrill['port'],$mandrill['smtpsecure'])->setUsername($mandrill['username'])->setPassword($mandrill['password']);*/
		if($_SERVER['HTTP_HOST'] == 'localhost')
		{
			$form = "no-reply@tripr.com";
			
		}else
		{
			$form = "no-reply@tripr.com";
		}
		$template = getEmailtemplate($template);
		if($template == false)
		{
			return false;
		}
		$body = replaceTokens($template,$tokens);
		$message = str_replace("%%".$tokenRow->tokenName."%%",$fields[$tokenRow->tokenId],$message);

		$https['ssl']['verify_peer'] = FALSE;
		$https['ssl']['verify_peer_name'] = FALSE;
	
		$transport = Swift_SmtpTransport::newInstance(MAILSERVER,SMTPPORT,SMTPAUTH)->setUsername(MAILUSERNAME)->setPassword(MAILPASSWORD);

		$mailer = Swift_Mailer::newInstance($transport);
		if(!_LOCAL)
		{
			$message = Swift_Message::newInstance($type);
			$headers = $message->getHeaders();
			$headers->addTextHeader('X-MC-Subaccount','tripr');//For subaccount
			$message = $message
					->setFrom(array($form => 'tripr'))
					->setTo(array($email))
					->setBody($body, "text/html");
		}else
		{
			
			$message = Swift_Message::newInstance($type)
				->setFrom(array($form => 'tripr'))
				->setTo(array($email))
				->setBody($body, "text/html");
		}		
		/*$message = Swift_Message::newInstance($type)
				->setFrom(array($form => 'tripr'))
				->setTo(array($email))
				->setBody($body, "text/html"); */
		try {
			 //if(!_LOCAL && trim($type)!='' && trim($message)!='')
			 //{
				//if(!isset($_SESSION['loginAsAdmin']))
				//{
					return $mailer->send($message);
				//}
			// }
			// else
			// {
				//return true;
			// }
		} catch (Exception $e) {
				//echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}
function getEmailtemplate($templateName)
{
	$mailTemplateDir = rtrim(MAIL_TEMPLATE_DIR, '/');
	$file = $mailTemplateDir.'/'.$templateName;
	if(!file_exists($file)){
		$file = $mailTemplateDir.'/'.'dummy-email-templates/'.$templateName;
	}
	
	$myfile = fopen($file, "r");
	if(!$myfile)
	{
		return false;
	}
	$emailHTML = fread($myfile,filesize($file));
	fclose($myfile);
	return $emailHTML;
}



function getEmailtemplatebk_13_1_2020($templateName)
{
	$mailTemplateDir = rtrim(MAIL_TEMPLATE_DIR, '/');
	$file = $mailTemplateDir.'/'.$templateName;
	
 	$myfile = fopen($file, "r");
	if(!$myfile)
	{
		return false;
	}
	$emailHTML = fread($myfile,filesize($file));
	fclose($myfile);
	return $emailHTML;
}





// Function to generate OTP 
function generateNumericOTP($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "1357902468"; 
  
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 

function mask($str, $first, $last) {
    $len = strlen($str);
    $toShow = $first + $last;
    return substr($str, 0, $len <= $toShow ? 0 : $first).str_repeat("*", $len - ($len <= $toShow ? 0 : $toShow)).substr($str, $len - $last, $len <= $toShow ? 0 : $last);
}
function get_starred_single($str) {
	$expArr = explode('@',$str);

	$str_length = strlen($expArr[0]);
	if($str_length > 7){
		//$initial = substr($expArr[0], 0, 3).str_repeat('*', $str_length - 5).substr($expArr[0], -3);
		$initial = mask($expArr[0],3,2);
	}else if($str_length > 4 && $str_length <= 6){
		$initial = mask($expArr[0],2,2);
	}else{
		$initial = mask($expArr[0],1,1);
		//$initial = substr($expArr[0], 0, 1).str_repeat('*', $str_length - 2).substr($expArr[0], -1);
	}
    
	
	//return $str;
	return $initial . '@'.$expArr[1];
}

function get_starred_phone($str)
{
	$expArr = explode('@',$str);
    $str_length = strlen($expArr[0]);
    $initial = str_repeat('*', $str_length - 4).substr($expArr[0], -4);
	return  $initial .''.$expArr[1];
}


function getCurrentDirectory() 
{
    return dirname(__FILE__);
}

//Return IST in mysql date or datetime format
function getlocaltime($sec=false,$nxt=0)
{
	$NextDays = $nxt*24*60*60;
	$GMT = _GMT_TIME_DIFFERENCE;
	$h = round((float)$GMT,2);
	$dst = "true";
	$hm = $h * 60;
	$ms = $hm * 60;
	//$timestamp = time()+($ms);
	$timestamp = $_SERVER["REQUEST_TIME"]+($ms);
	
	if($sec)
	{
		$seconds = " H:i:s";
	}
	$gmdate = gmdate("Y-m-d".$seconds, $timestamp+$NextDays);
	return $gmdate;
}
function filePath($file) 
{
    global $_URLSTRING;
    $path = _root.'/'.trim($_URLSTRING["filepath"]).'/'.trim($file);
    return $path;
}

// to get date format
function getDateTimeformat($time)
{
  //return   date('d/m/Y h:i:s A',strtotime($time)); 
  return   date('M d, Y h:i:s',strtotime($time)); 
  //return   date('M d Y',strtotime($time)); 
}

// to get date time format 24 hrs format 
function getDateTimeformat24hrs($time)
{
  //return   date('d/m/Y h:i:s A',strtotime($time)); 
  if($time)
   {
		//return   date('M d, Y - H:i:s',strtotime($time)); 
		return   date('M d, Y H:i:s',strtotime($time)); 
   }
  else
  return   "---"; 
  //return   date('M d Y',strtotime($time)); 
}

function ms_encode($s)
{
	$s = base64_encode($s);
    for( $i = 0; $i < strlen($s); $i++ )
        $r[] = ord($s[$i]) + 2;
    return implode('.', $r);
}

function codeit($password)
{
	$password = md5($password.PASSKEY);
	return $password;
}

function generateCode($maxLength , $prefix)
{
  $length = $maxLength - strlen($prefix);
  $random= "";
  srand((double)microtime()*1000000);
  //$data = "ABCDE123IJKLMN67QRSTUVWXYZ";
  //$data .= "ABCDEFGHIJKLMN123PQ45RS67TUV89WXYZ";
  //$data .= "FGH45P89";
  $data = "ABCDE23JKLMN67QRSTUVWXYZ";
  $data .= "ABCDEFGHJKLMN23PQ45RS67TUV89WXYZ";
  $data .= "FGH45P89";
  $uniqueCode = uniqid();
  $uniqueCode = str_replace("0","",$uniqueCode);
  $addRandLength = ($length - strlen($uniqueCode));
  for($i = 0; $i < $addRandLength; $i++)
  {
    $random .= substr($data, (rand()%(strlen($data))), 1);
  }
  $Code = $prefix.$random.$uniqueCode;
  return strtoupper($Code);
}


// ---- force download file
function dl_file($file,$forceDownload=1)
{
   if (!is_file($file)) { die("<b>404 File not found!</b>"); }
   $len = filesize($file);
   $filename = basename($file);
   $file_extension = strtolower(substr(strrchr($filename,"."),1));
   switch( $file_extension ) 
	{
		case "pdf": $ctype="application/pdf"; break;
		case "exe": $ctype="application/octet-stream"; break;
		case "zip": $ctype="application/zip"; break;
		case "doc": $ctype="application/msword"; break;
		case "xls": $ctype="application/vnd.ms-excel"; break;
		case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		case "gif": $ctype="image/gif"; break;
		case "png": $ctype="image/png"; break;
		case "jpeg":
		case "jpg": $ctype="image/jpg"; break;
		case "mp3": $ctype="audio/mpeg"; break;
		case "wav": $ctype="audio/x-wav"; break;
		case "mpeg":
		case "mpg":
		case "mpe": $ctype="video/mpeg"; break;
		case "mov": $ctype="video/quicktime"; break;
		case "avi": $ctype="video/x-msvideo"; break;
		//The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
		case "php":
		case "htm":
		case "html":
		case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;
		default: $ctype="application/force-download";
	}
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: public");
   header("Content-Description: File Transfer");
  
   header("Content-Type: $ctype");
   $header="Content-Disposition: attachment; filename=".$filename.";";
   if($forceDownload == 1)
   {
        header($header );
   }
   header("Content-Transfer-Encoding: binary");
   //header("Content-Length: ".$len);
   echo @file_get_contents($file);
   exit;
}


function filterMobile($String)
{
	//Filters invalid charaters from the string
	$String = iconv("UTF-8","UTF-8//IGNORE",$String);
	$String = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "", $String);
	$String = preg_replace("/[!@#$%^&*(){}\-_+|\":?~,\/';\[\]]/","", $String);
	$String = preg_replace("/[^\w|\.|'|\-|\[|\]]/","",$String);
	//$String = preg_replace("/(^[--]*|[--]+)[--]*[--]+/", "-", $String);
	return urlencode(strtolower(trim($String)));
}

function isStringNumber($string)
{
	$num = preg_match('/[0-9]/',$string );
	if($num)
		return $string;
	else
		return "";
}

function isRightMobNumber($string)
{
	if(strlen($string) >= MOBILE_MIN_LIMIT && strlen($string) <= MOBILE_MAX_LIMIT)
	{
		$num = preg_match('/[0-9]/',$string );
		if($num)
		{
			return $string;
		}
		else 
		{
			return "";
		}
	}
	return "";
}

function isCountryCode($string)
{
	$len  = strlen($string);
	if($len<COUNTRY_CODE_MIN || $len>COUNTRY_CODE_MAX )
	{
		return false;
	}
	else
	{
		return true;
	}
}

function filterAlphaNumeric($String)
{
	if(!preg_match('/^[a-zA-Z0-9]+$/', trim($String)))
	{
		return false;
	}
	return true;
}

function activeMenu($fileArray)
{
	$url = $_SERVER['REDIRECT_URL'];
	$items = explode("/",$url);
	if(in_array($items['3'],$fileArray))
	{
		return false;
	}
	return true;
}

function sendMobileOTP($mobileNo , $OTP='', $SENDERID , $userIP, $countryCode)
{
	global $twilio;
	// ------- DISABLE MOBILE SMS --------
	//sleep(1);
	//return true;
	// ------- DISABLE MOBILE SMS --------


	if($countryCode == '91'){

		$params = array("OTP"=>$OTP);

		$mobileNo = preg_replace('/\s+/', '', $mobileNo);
		$mobileNo = $countryCode.$mobileNo;
	
		$jsonParam = json_encode($params);
	
		$curl = curl_init();
		$URL = "https://api.msg91.com/api/v5/otp?authkey=".SMSAUTHKEY."&template_id=".OTPTEMPLATE."&extra_param=".$jsonParam."&mobile=".$mobileNo."&invisible=1&otp=".$OTP."&sender=".$SENDERID."&userip=".$userIP."&email=&otp_length=6&otp_expiry=15";
		
	
		curl_setopt_array($curl, array(
		CURLOPT_URL => $URL,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "",
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json"
		),
		));
	
		$response = curl_exec($curl);
		$err = curl_error($curl);
	
		curl_close($curl);
	
		if ($err) {
		return $err;
		} else {
		return $response;
		}
	}else{

		return true;///code to send otp for country other than IN

		$mobileNo = $countryCode.$mobileNo;

		$message = $twilio->messages 
        ->create("+".$mobileNo, // to 
			array( 
				"from" => "+18137012697", 
				"messagingServiceSid" => "MG53fc31f07e04ea1e4875ab8b2ad6ac19",      
				"body" => "Your OTP Code ".$OTP." Tripr"
			) 
		); 

		return $message->sid;///code to send otp for country other than IN
		
	}
	
}
function reSendMobileOTP($mobileNo, $countryCode, $type = '' )
{
	// ------- DISABLE MOBILE SMS --------
	// return true;
	// ------- DISABLE MOBILE SMS --------
	
	if($countryCode == '91'){
		if( $type  == '')
		{
			$type  = 'text';
		}
		$mobileNo = preg_replace('/\s+/', '', $mobileNo);

		$mobileNo = $countryCode.$mobileNo;
	
		$curl = curl_init();
	
		$URL = "https://api.msg91.com/api/v5/otp/retry?authkey=".SMSAUTHKEY."&mobile=".$mobileNo."&retrytype=".$type;
	
		curl_setopt_array($curl, array(
		CURLOPT_URL => $URL,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "",
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json"
		),
		));
	
		$response = curl_exec($curl);
		$err = curl_error($curl);
	
		curl_close($curl);
	
		if ($err) {
			return $err;
		} else {
			return $response;
		}
	}else{

		$OTP = getLastOTP();
		$SENDERID = 'STARVN';
		$userIP = REMOTE_ADDR;

        if ($OTP != '') {
            return sendMobileOTP($mobileNo, $OTP, $SENDERID, $userIP, $countryCode);
        }
	}
	
}

function sendVoiceCall($mobileNo,$OTP)
{	
	/*
	$params 	= 	array("OTP"=>$OTP);

	$mobileNo 	= 	preg_replace('/\s+/', '', $mobileNo);

	$jsonParam 	=	json_encode($params);

	$curl 		= 	curl_init();
	$message 	= 	urlencode('Welcome to Project. Your OTP is '.$OTP);
	//echo $URL 		= 	"https://api.msg91.com/api/sendVoiceCall.php?authkey=".SMSAUTHKEY."&message=".$message."&to=91".$mobileNo;
	echo $URL		=	"https://api.msg91.com/api/v5/otp/retry?mobile=".$mobileNo."&authkey=".SMSAUTHKEY;die;

	curl_setopt_array($curl, array(
	CURLOPT_URL => $URL,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "",
	CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_HTTPHEADER => array(
		"content-type: application/json"
	),
	));

	$response 	= 	curl_exec($curl);
	$err 		= 	curl_error($curl);

	curl_close($curl);

	if ($err) {
		return $err;
	}else{
		return $response;
	}
	*/
}

function feedCurl($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
	$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
	$header[] = "Cache-Control: max-age=0";
	$header[] = "Connection: keep-alive";
	$header[] = "Keep-Alive: 300";
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$header[] = "Accept-Language: en-us,en;q=0.5";
	$header[] = "Pragma: ";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	$xmlFeed = curl_exec ($ch);
	curl_close ($ch);
	return $xmlFeed;
}

function curl_download($Url)
{
	// is cURL installed yet?
	if (!function_exists('curl_init'))
	{
		die('Sorry cURL is not installed!');
	}
	// OK cool - then let's create a new cURL resource handle	
	$ch = curl_init();
	// Now set some options (most are optional)
	// Set URL to download
	curl_setopt($ch, CURLOPT_URL, $Url);
	// Set a referer
	curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com");
	// User agent
	curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	// Include header in result? (0 = yes, 1 = no)
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	// Should cURL return or print out the data? (true = return, false = print)
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Timeout in seconds
	//curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	// Download the given URL, and return output
	$output = curl_exec($ch);
	// Close the cURL resource, and free system resources
	curl_close($ch);
	if(substr_count($output, "HTTP/1.1 200 OK"))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function isValidYouTubeUrl($video_url)
{
	if(preg_match("/src=/i",$video_url))
	{		
		$link = strstr($video_url,"/embed/");		
		if(stripos($link,'?'))
		{			
			$items =explode("?",$link);		
			$link = substr($items['0'],7);
		}
		else if(stripos($link,'"'))	
		{			
			$items =explode('"',$link);		
			$link = substr($items['0'],7);
			$link = substr($link,0,-1);
		}	
		return $link = "http://www.youtube.com/embed/".$link;
	}
	else if(preg_match("/embed/i",$video_url))
	{
		return $link = $video_url;
	}
	
	else if(preg_match("/v=/i",$video_url))
	{
		$link = strstr($video_url,"v=");
		if(stripos($link,"&"))
		{
			$pos = stripos($link,"&");
			$link = substr($link,2,$pos-2);
		}
		else
		{
			$link = substr($link,2,strlen($link));
		}
		return $link = "http://www.youtube.com/embed/".$link;
	}
	else if(preg_match("/youtu.be/i",$video_url))
	{
		$path = parse_url($video_url);
		$link = substr($path['path'],1,strlen($path['path'])-1);
		return $link = "http://www.youtube.com/embed/".$link;
	}
	else
	{
		$msg = "Please enter a valid Youtube Video URL.";
		return false;
	}
}

function dirAction($path, $action='')
{
    if (is_dir($path)) {

        $files = glob($path.'/{,.}[!.,!..]*',GLOB_BRACE); 

        foreach ($files as $file) { // iterate files
            if(is_file($file)) {
        
                if ($action=='') {
                    echo 'File: '.$file.'<br/>';
                }
                else if($action == 'unlink')
                {
                    @unlink($file); // delete file
                }
            }
            else if(is_dir($file)){
                if ($action=='') {
                    echo 'Directory: '.$file.'<br/>';
                }
                dirAction($file, $action);
            }
            else {
                if ($action=='') {
                    echo 'Hidden: '.$file.'<br/>';
                }
            }
        }

        if($action == 'unlink')
        {
            @rmdir($path);
        }
    }
}

//function to change string value to htmlentities 
function strHtml($string)
{
	return htmlentities(trim(modify_array($string,'removeslash')),ENT_QUOTES);
}


function replaceTokens($template,$tokens)
{
  foreach($tokens as $key => $value)
  {
	  $template = str_replace("%$key%","$value",$template);
  }
	return $template;
}

function ordinal_suffix($num){ 
    $num = $num % 100; // protect against large numbers 
    if($num < 11 || $num > 13){ 
         switch($num % 10){ 
            case 1: return $num.'st'; 
            case 2: return $num.'nd'; 
            case 3: return $num.'rd'; 
        } 
    } 
    return $num.'th'; 
}

function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}


function createLog($contentArr,$type,$title='')
{
	$title .= ' - '.REQUEST_TIME;
	$result .="\r\n--- ".$title." ---\r\n";

    if (is_array($contentArr)) {
        foreach ($contentArr as $key => $value) {
            $result .= $key. " = ". $value. "\r\n";
        }
	}
	else{
		$result .= $contentArr;
	}
	$result .="--- ended  ---\r\n";
	
	$logDir = date("Ym");
	$path = ABSOLUTE_PATH.'log/'.$logDir;
	$fileName = $type.'data.log';
	@mkdir($path,0755);
	@file_put_contents($path.'/'.$fileName,$result,FILE_APPEND);
}

function systemInfo()
{
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$os_platform    = "Unknown OS Platform";
	$os_array       = array('/windows phone 8/i'    =>  'Windows Phone 8',
	                        '/windows phone os 7/i' =>  'Windows Phone 7',
	                        '/windows nt 10/i'     =>  'Windows 10',
	                        '/windows nt 6.3/i'     =>  'Windows 8.1',
	                        '/windows nt 6.2/i'     =>  'Windows 8',
	                        '/windows nt 6.1/i'     =>  'Windows 7',
	                        '/windows nt 6.0/i'     =>  'Windows Vista',
	                        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
	                        '/windows nt 5.1/i'     =>  'Windows XP',
	                        '/windows xp/i'         =>  'Windows XP',
	                        '/windows nt 5.0/i'     =>  'Windows 2000',
	                        '/windows me/i'         =>  'Windows ME',
	                        '/win98/i'              =>  'Windows 98',
	                        '/win95/i'              =>  'Windows 95',
	                        '/win16/i'              =>  'Windows 3.11',
	                        '/macintosh|mac os x/i' =>  'Mac OS X',
	                        '/mac_powerpc/i'        =>  'Mac OS 9',
	                        '/linux/i'              =>  'Linux',
	                        '/ubuntu/i'             =>  'Ubuntu',
	                        '/iphone/i'             =>  'iPhone',
	                        '/ipod/i'               =>  'iPod',
	                        '/ipad/i'               =>  'iPad',
	                        '/android/i'            =>  'Android',
	                        '/blackberry/i'         =>  'BlackBerry',
	                        '/webos/i'              =>  'Mobile');
	$found = false;

	$device = '';
	foreach ($os_array as $regex => $value) 
	{ 
	    if($found)
	     break;
	    else if (preg_match($regex, $user_agent)) 
	    {
	        $os_platform    =   $value;
	        $device = !preg_match('/(windows|mac|linux|ubuntu)/i',$os_platform)
	                  ?'MOBILE':(preg_match('/phone/i', $os_platform)?'MOBILE':'SYSTEM');
	    }
	}
	$device = !$device? 'SYSTEM':$device;
	return array('os'=>$os_platform,'device'=>$device);
} 

//------CREATE LOG STRING FROM ARRAY-----
function arraylog($array) {
    ob_start();
    echo '<pre>';
    print_r ($array);
    echo '</pre>';
    $aString = ob_get_contents();
    ob_clean();
    return $aString;
}

function isSuspicious($Arr)
{//add recursive slash
	if(is_array($Arr))
	{
		foreach($Arr as $key => $value)
		{
			return isSuspicious($Arr[$key]);
		}
	}
	else
	{
		if (preg_match('/(base64_|eval|system|shell_|exec|script|php_|java|passwd|drop|1=1|%25|j2ee|servlet|UPDATE|INSERT\s|DELETE\s|\.\.)/i',$Arr))
	    {
	        return 1;
	    }
	    else if (preg_match("#&\#x([0-9a-f]+);#i", $Arr))
	    {
	        return 2;
	    }
	    elseif (preg_match('#&\#([0-9]+);#i', $Arr))
	    {
	        return 3;
	    }
	    elseif (preg_match("#([a-z]*)=([\`\'\"]*)script:#iU", $Arr))
	    {
	        return 4;
	    }
	    elseif (preg_match("#([a-z]*)=([\`\'\"]*)javascript:#iU", $Arr))
	    {
	        return 5;
	    }
	    elseif (preg_match("#([a-z]*)=([\'\"]*)vbscript:#iU", $Arr))
	    {
	        return 6;
	    }
	    elseif (preg_match("#(<[^>]+)style=([\`\'\"]*).*expression\([^>]*>#iU", $Arr))
	    {
	        return 7;
	    }
	    elseif (preg_match("#(<[^>]+)style=([\`\'\"]*).*behaviour\([^>]*>#iU", $contents))
	    {
	        return 8;
	    }
	    elseif (preg_match("#</*(applet|link|style|script|iframe|frame|frameset|html|body|title|div|p|form)[^>]*>#i", $Arr))
	    {
	        return 9;
	    }
	    else
	    {
	        return false;
	    }
	}
}

function get_the_browser()
{
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
   return 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false)
    return 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false)
   return 'Mozilla Firefox';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
   return 'Google Chrome';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false)
   return "Opera Mini";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false)
   return "Opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false)
   return "Safari";
 else
   return 'Other';
}

function get_operating_system() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $operating_system = 'Unknown Operating System';

    //Get the operating_system
    if (preg_match('/linux/i', $u_agent)) {
        $operating_system = 'Linux';
    } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
        $operating_system = 'Mac';
    } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
        $operating_system = 'Windows';
    } elseif (preg_match('/ubuntu/i', $u_agent)) {
        $operating_system = 'Ubuntu';
    } elseif (preg_match('/iphone/i', $u_agent)) {
        $operating_system = 'IPhone';
    } elseif (preg_match('/ipod/i', $u_agent)) {
        $operating_system = 'IPod';
    } elseif (preg_match('/ipad/i', $u_agent)) {
        $operating_system = 'IPad';
    } elseif (preg_match('/android/i', $u_agent)) {
        $operating_system = 'Android';
    } elseif (preg_match('/blackberry/i', $u_agent)) {
        $operating_system = 'Blackberry';
    } elseif (preg_match('/webos/i', $u_agent)) {
        $operating_system = 'Mobile';
    }
    
    return $operating_system;
}


function setCookies($uniqid)
{
	$info = array();
	$cookiesVal = $_COOKIE['browser'];
	$cookiesVal = json_decode($cookiesVal);
	$avail = in_array($uniqid,$cookiesVal);
	if(empty($cookiesVal))
	{
		$info[] = $uniqid;
		$info = json_encode($info);
		setcookie('browser', $info, time() + (86400 * 30 * 12), "/");
	}elseif($avail == false)
	{
		$cookiesVal[] = $uniqid;
		$cookiesVal = json_encode($cookiesVal);
		setcookie('browser', $cookiesVal, time() + (86400 * 30 * 12), "/");
	}	
}


function chkCookies($uniqid)
{
	$info = array();
	$cookiesVal = $_COOKIE['browser'];
	$cookiesVal = json_decode($cookiesVal);
	$avail = in_array($uniqid,$cookiesVal);
	if(!empty($cookiesVal) && $avail)
	{
		return true;
	}else
	{
		return false;
	}
}


function getControllers($dir)
{
	// Open a directory, and read its contents
	if (is_dir($dir)){
	  if ($dh = opendir($dir)){
	    while (($file = readdir($dh)) !== false){
	    	if($file != '.' && $file != '..')
	    	{
	       	$controllerArr[] = str_replace("Controller.php","",$file);
	       	}
	    }
	    closedir($dh);
	  }
	}

	return $controllerArr;
}


function Size_files($path)
{
    $bytes = sprintf('%u', filesize($path));

    if ($bytes > 0)
    {
        $unit = intval(log($bytes, 1024));
        $units = array('B', 'KB', 'MB', 'GB');

        if (array_key_exists($unit, $units) === true)
        {
            return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
        }
    }

    return $bytes;
}

function set_flashdata($name, $val){
	$_SESSION[$name] = $val;
}

function flashdata($name){
	$temp = $_SESSION[$name];
	unset($_SESSION[$name]);
	return $temp;
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
   return $ipaddress;
}
function previousPage(){   	
	$url 		= 	(isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : null;	
	$refData 	= 	parse_url($url);	
	if($refData){		
		return substr($refData["path"],strrpos($refData["path"],"/")+1);	
	}else{	
		return  "/";	
	}
	
}

function weekStartEnd()
{
	$day = date('w');
	
	//Saturday as first day of the weeek
	//Friday as the last day of the week

	//if it's Saturday or Sunday
	if($day == 0 || $day == 7)
	{
		$start = date ( "Y-m-d" , strtotime ( 'saturday this week' ));
		$end = date ( "Y-m-d" , strtotime ( 'friday next week' ));
	}
	else{
		$start = date ( "Y-m-d" , strtotime ( 'saturday last week' ));
		$end = date ( "Y-m-d" , strtotime ( 'friday this week' ));
	}

	return array("start"=>$start,"end"=>$end);

}

function getMobileOTPErrors($message){
	switch($message){
		case 'invalid_auth_key':
			$msg = 'Invalid Auth Key';
		break;
		case 'invalid_mobile_number':
			$msg = 'Your mobile number is not valid.';
		break;
		case 'no_request_found':
			$msg = 'Resend OTP request is not found';
		break;
		case 'last_otp_request_on_this_number_is_invalid':
			$msg = 'Last OTP sent to your mobile is invalid';
		break;
		case 'otp_expired':
			$msg = 'OTP has been expired.';
		break;
		case 'max_retry_count_exceeded':
			$msg = 'You have exceeded the max retry OTP';
		break;
		case 'OTP retry count maxed out':
			$msg = 'You have exceeded the retry limit for OTP';
		break;
		default:
			$msg = $message;
		break;
	}
	return $msg;
}

function getFileUploadErrors($error){
	$msg = '';
	switch($error){
		case '1':
			$msg =  'Please upload valid file format';
		break;
		case '2':
			$msg =  'File size cannot be more than 1MB';
		break;
		case '3':
			$msg =  'Please upload supported document';
		break;
		case '4':
			$msg =  'Failed to upload the document';
		break;
		default:
			$msg =  '';
		break;
	}
	return $msg;
}
?>