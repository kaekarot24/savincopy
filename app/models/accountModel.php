<?php
class account extends defaultModel
{
    public $db;
    private $username;
    private $password;
    
    public function __construct($db)
    {
        $this->db = $db;

        parent::CheckLoginSession();
        
    }

    //Register user account method
    public function Register_ByUser($request = array())
    {
        # code...
        if(!empty($request) && $request['action']=="register")
        {
            //data store in variable
            $data = $request['data'];

            //check input validation
            if(empty($data['register_form_name'])){
                 return json_encode(array("status"=>"validation","msg"=>"This field <b>[Name]</b> is mandatory."));
            }
            if(empty($data['register_form_email'])){
                return json_encode(array("status"=>"validation","msg"=>"This field <b>[Email]</b> is mandatory."));
            }
            if(!filter_var($data['register_form_email'], FILTER_VALIDATE_EMAIL)){
                return json_encode(array("status"=>"validation","msg"=>"This field <b>[Email]</b> is valid email address is mandatory."));
            }
            if(empty($data['register_form_phone'])){
                return json_encode(array("status"=>"validation","msg"=>"This field <b>[Phone]</b> is mandatory."));
            }
            if(empty($data['register_form_password'])){
                return json_encode(array("status"=>"validation","msg"=>"This field <b>[Password]</b> is mandatory."));
            }
            if($data['register_form_password']!=$data['register_form_repassword']){
                return json_encode(array("status"=>"validation","msg"=>"This field <b>[Re-Password]</b> is must to match with Password."));
            }

            //check username exist or not
            $checkusername = $this->CheckUsername(trim($data['register_form_username']));
            if(true !== $checkusername){
             
                //store data in variable
                $fullname     = $this->db->real_escape_string($data['register_form_name']);
                $useremail    = $data['register_form_email'];
                $username     = $data['register_form_username'];
                $userpassword = md5($data['register_form_password']);
                $usercontact  = $data['register_form_phone'];
                $usercurrdate = _CURRENTTIME;

                //data saved into database
                $userstore = "INSERT INTO `savin_users` SET `full_name`='".$fullname."',
                                                            `user_email`='".$useremail."',
                                                            `username`='".$username."',
                                                            `user_password`='".$userpassword."',
                                                            `user_contact`='".$usercontact."',
                                                            `user_status`='1',
                                                            `reg_date`='".$usercurrdate."'";
                $checkresult = $this->db->query($userstore);
                if(!$checkresult){
                    $error_desc = $this->db->error;
                                    return json_encode(array(
                                            "status"=>"error",
                                            "msg"=>$error_desc
                                            ));
                }    
                
                return json_encode(array(
                    "status"=>"success",
                    "msg"=>"Your account has been created successfully. Please login to continue.."
                ));
                 
            } else {
                return json_encode(array(
                    "status"=>"error",
                    "msg"=>"This username already exist. Please use another"));
            }

        } else{
            return json_encode(array("status"=>"warning"));
        }
    }

    //check username is exist or not
    private function CheckUsername(string $var = null)
    {
        # code...
        $sql = "SELECT * FROM `savin_users` WHERE `username`='".$var."' LIMIT 0,1";
        $check = $this->db->query($sql);
        if($check->num_rows > 0){
              return true;
        } else {
            return false;
        }
    }

    //login to account
    public function Login_ByUser($request = array())
    {
        # code...
        if($request['action']=="login"){
            
            //all request store in variable
            $data = $request['data'];

            //store username and password
            $this->username = $data['login_form_username'];
            $this->password = md5($data['login_form_password']);

            //Validate and verify reCAPTCHA
            if(isset($data['g-recaptcha-response']) && !empty($data['g-recaptcha-response'])){
                 
                // Verify the reCAPTCHA response 
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.SECRETKEY.'&response='.$data['g-recaptcha-response']);

                // Decode json data 
                $responseData = json_decode($verifyResponse);
                
                if($responseData->success){
                     
                    //check login account exist or not
                    $strCheck = json_decode($this->ChkLoginStatus(), true);
                    if(true === $strCheck['status']){
                            
                         //create session of user account
                         $_SESSION['user_account'] = array(
                             "userid"=>$strCheck['userid'],
                             "username"=>$strCheck['username']);
                             
                         return json_encode(array("status"=>"success","redirect_url"=>GL_SITE_URL."/dashboard"));    
                              
                    } else {
                        return json_encode(array(
                            "status"=>"error",
                            "msg"=>"Wrong Credentials. Please try again"));
                    }

                } else {
                    return json_encode(array(
                        "status"=>"error",
                        "msg"=>"Robot verification failed, please try again."));
              }

            } else {
                return json_encode(array(
                    "status"=>"error",
                    "msg"=>"Please check on the reCAPTCHA box."));
            }

        } else {
            return json_encode(array("status"=>"warning"));
        }

    }

    //check account exist or not
    private function ChkLoginStatus()
    {
        # code...
        $sql = "SELECT * FROM `savin_users` WHERE `username`='".$this->username."' AND `user_password`='".$this->password."' LIMIT 0,1";
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            $resdata = $result->fetch_object();
              return json_encode(array(
                  "status"=>true,
                  "userid"=>$resdata->id,
                  "username"=>$resdata->username
              )); 
        } else {
            return json_encode(array("status"=>false));
        }
    }

}
?>