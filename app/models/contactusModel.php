<?php
class contactus extends defaultModel
{
    public $db;
    
    public function __construct($db)
    {
        $this->db = $db;

        //parent::CheckPageSession();
        
    }

    //Save Enquiry
    public function Save_Contact($request = array())
    {
        if(!empty($request) && $request['action']=="save")
        {
            //store request data in variable
            $data = $request['data'];
            $currdate = date('Y-m-d', strtotime(_CURRENTTIME));

            //Validate and verify reCAPTCHA
            if(isset($data['g-recaptcha-response']) && !empty($data['g-recaptcha-response'])){
                 
                  // Verify the reCAPTCHA response 
                  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.SECRETKEY.'&response='.$data['g-recaptcha-response']);

                  // Decode json data 
                  $responseData = json_decode($verifyResponse);
                  if($responseData->success){
                      
                        //convert real escape string
                        $fullname = $this->db->real_escape_string($data['template_contactform_name']);
                        $email    = $this->db->real_escape_string($data['template_contactform_email']);
                        $mobile   = $this->db->real_escape_string($data['template_contactform_phone']);
                        $subject  = $this->db->real_escape_string($data['template_contactform_subject']);
                        $msg      = $this->db->real_escape_string($data['template_contactform_message']);

                        $insert = "INSERT INTO `savin_contact` SET `savin_name`='".$fullname."',
                                                                `savin_email`='".$email."',
                                                                `savin_phone`='".$mobile."',
                                                                `savin_subject`='".$subject."',
                                                                `savin_message`='".$msg."',
                                                                `reg_date`='".$currdate."'";
                        $result = $this->db->query($insert);
                        if(!$result){
                            $error_desc = $this->db->error;
                                            return json_encode(array(
                                                    "status"=>"error",
                                                    "msg"=>$error_desc
                                                    ));
                        }

                        return json_encode(array("status"=>"success","msg"=>"Your content has been uploaded successfully."));

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

}
?>