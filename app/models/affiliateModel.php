<?php
class affiliate extends defaultModel
{
    public $db;
    
    public function __construct($db)
    {
        $this->db = $db;

        //parent::CheckPageSession();
        
    }

    //Save Enquiry
    public function Save_Affiliate($request = array())
    {
        # code...
        if(!empty($request) && $request['action']=="save")
        {
            //store request data in variable
            $data = $request['data'];
            $currdate = date('Y-m-d', strtotime(_CURRENTTIME));

            if($request['type']=='individual'){

                //convert real escape string
                $fullname = $this->db->real_escape_string($data['affiliate_individual_name']);
                $email    = $this->db->real_escape_string($data['affiliate_individual_email']);
                $mobile   = $this->db->real_escape_string($data['affiliate_individual_phone']);
                $medialink  = $this->db->real_escape_string($data['affiliate_individual_medialink']);

                $insert = "INSERT INTO `savin_affiliate` SET `affiliate_name`='".$fullname."',
                                                        `affiliate_email`='".$email."',
                                                        `affiliate_phone`='".$mobile."',
                                                        `affiliate_socialmedia_link`='".$medialink."',
                                                        `affiliate_type`='".$request["type"]."',
                                                        `reg_date`='".$currdate."'";
                $result = $this->db->query($insert);
                if(!$result){
                    $error_desc = "<b>Error description:</b> ".$this->db->error;
                                    return json_encode(array(
                                            "status"=>"warning",
                                            "msg"=>$error_desc
                                            ));
                }
            }

            if($request['type']=='company'){

                //convert real escape string
                $fullname = $this->db->real_escape_string($data['affiliate_company_name']);
                $email    = $this->db->real_escape_string($data['affiliate_company_email']);
                $mobile   = $this->db->real_escape_string($data['affiliate_company_phone']);
                $desg     = $this->db->real_escape_string($data['affiliate_company_designation']);
                $comp     = $this->db->real_escape_string($data['affiliate_company_compname']);
                $webs     = $this->db->real_escape_string($data['affiliate_company_website']);


                $insert = "INSERT INTO `savin_affiliate` SET `affiliate_name`='".$fullname."',
                                                        `affiliate_email`='".$email."',
                                                        `affiliate_phone`='".$mobile."',
                                                        `affiliate_designation`='".$desg."',
                                                        `affiliate_company_name`='".$comp."',
                                                        `affiliate_website_link`='".$webs."',
                                                        `affiliate_type`='".$request["type"]."',
                                                        `reg_date`='".$currdate."'";
                $result = $this->db->query($insert);
                if(!$result){
                    $error_desc = "<b>Error description:</b> ".$this->db->error;
                                    return json_encode(array(
                                            "status"=>"warning",
                                            "msg"=>$error_desc
                                            ));
                }
            }

            if($request['type']=='news'){

                //convert real escape string
                $fullname = $this->db->real_escape_string($data['affiliate_news_name']);
                $email    = $this->db->real_escape_string($data['affiliate_news_email']);
                $mobile   = $this->db->real_escape_string($data['affiliate_news_phone']);
                $mlink    = $this->db->real_escape_string($data['affiliate_news_medialink']);
                $webs     = $this->db->real_escape_string($data['affiliate_news_website']);


                $insert = "INSERT INTO `savin_affiliate` SET `affiliate_name`='".$fullname."',
                                                        `affiliate_email`='".$email."',
                                                        `affiliate_phone`='".$mobile."',
                                                        `affiliate_socialmedia_link`='".$mlink."',
                                                        `affiliate_website_link`='".$webs."',
                                                        `affiliate_type`='".$request["type"]."',
                                                        `reg_date`='".$currdate."'";
                $result = $this->db->query($insert);
                if(!$result){
                    $error_desc = "<b>Error description:</b> ".$this->db->error;
                                    return json_encode(array(
                                            "status"=>"warning",
                                            "msg"=>$error_desc
                                            ));
                }
            }
            
            return json_encode(array("status"=>"success"));

        }

        return json_encode(array("status"=>"error"));
    }

}
?>