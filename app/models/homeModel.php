<?php
class home extends defaultModel
{
    public $db;
    
    public function __construct($db)
    {
        $this->db = $db;

        //parent::CheckPageSession();
        
    }

    //Save Enquiry
    public function Save_Enquiry($request = array())
    {
        # code...
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
                    $fullname = $this->db->real_escape_string($data['full_name']);
                    $email    = $this->db->real_escape_string($data['email']);
                    $mobile   = $this->db->real_escape_string($data['mobile']);
                    $subject  = $this->db->real_escape_string($data['subject']);
                    $message  = $this->db->real_escape_string($data['message']);

                    $insert = "INSERT INTO `savin_enquiry` SET `full_name`='".$fullname."',
                                                            `enquiry_email`='".$email."',
                                                            `enquiry_mobile`='".$mobile."',
                                                            `enquiry_subject`='".$subject."',
                                                            `enquiry_message`='".$message."',
                                                            `reg_date`='".$currdate."'";
                    $result = $this->db->query($insert);
                    if(!$result){
                        $error_desc = "<b>Error description:</b> ".$this->db->error;
                                        return json_encode(array(
                                                "status"=>"warning",
                                                "msg"=>$error_desc
                                                ));
                    }
                    
                    return json_encode(array("status"=>"success","msg"=>"Your enquiry has been sent successfully"));

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

        }
        else {
            return json_encode(array("status"=>"warning"));
        } 
    }

}
?>