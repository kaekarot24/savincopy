<?php
class dashboard extends defaultModel
{
    public $db;
    
    public function __construct($db)
    {
        $this->db = $db;

        parent::CheckPageSession();
        
    }

    //check payment status
    public function CheckPayment_Status(int $var = null)
    {
        # code...
        $sql = "SELECT * FROM `savin_payment_info` WHERE `user_id`='".$var."' AND `status`='captured'";
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            return true;
        } else {
            return false;
        }
    }

    //update profile
    public function Update_UserProfile($request = array())
    {
        # code...
        if(isset($request) && !empty($request) && $request['action'] == "updateprofile"){
               
            //data store in variable
            $user_name  = $this->db->real_escape_string($request['data']['profile_form_name']);
            $user_email = $request['data']['profile_form_email'];
            $user_phone = $request['data']['profile_form_phone'];

            //update into database
            $update = "UPDATE `savin_users` SET `full_name`='".$user_name."',
                                                `user_email`='".$user_email."',
                                                `user_contact`='".$user_phone."' WHERE `id`='".$_SESSION['user_account']['userid']."'";
            $result = $this->db->query($update);
            if(!$result){
                $error_desc = $this->db->error;
                                return json_encode(array(
                                        "status"=>"warning",
                                        "msg"=>$error_desc
                                        ));
            }                                    
                
                return json_encode(array("status"=>"success","msg"=>"Your Profile has been updated successfully"));

        } else {
            return json_encode(array(
                "status"=>"warning"
            ));
        }
    }

    //upload user data into database
    public function Upload_UserContent($request = array())
    {
        # code...
        if(isset($request) && $request['action'] == "upload"){

            //request sotre in variable
            $data = $request['data'];

            //convert array into Json
            $Json_images  = $this->db->real_escape_string(json_encode($data['images']));
            $user_content = $this->db->real_escape_string($data['content']);
            $curr_date = _CURRENTTIME;

            //saved into database
            $update = "INSERT INTO `savin_user_content` SET `user_id`='".$_SESSION['user_account']['userid']."',
                                                            `user_uploaded_images`='".$Json_images."',
                                                            `user_uploaded_content`='".$user_content."',
                                                            `reg_date`='".$curr_date."'";
            $result = $this->db->query($update);
            if(!$result){
                $error_desc = $this->db->error;
                                return json_encode(array(
                                        "status"=>"warning",
                                        "msg"=>$error_desc
                                        ));
            }

                return json_encode(array(
                    "status"=>"success",
                    "msg"=>"Your content has been uploaded successfully."
                ));  

        } else {
            return json_encode(array("status"=>"warning"));
        }
    }

    //check activities count according to single package
    public function CheckActivities_Count(int $var = null)
    {
        # code...
        $sql = "SELECT * FROM `savin_payment_info` WHERE `user_id`='".$var."' AND `status`='captured'";
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
            $pay_count = $result->num_rows;

            $sql2 = "SELECT * FROM `savin_user_content` WHERE `user_id`='".$var."'";
            $result2 = $this->db->query($sql2);
            $activity_count = $result2->num_rows;
            
            if(intval($pay_count) === intval($activity_count)){
                 return true;
            }

            return false;

        } else {
            return false;
        }
    }

    //get user activities
    public function GetUser_Activities(int $var = null)
    {
        # code...
        $sql = "SELECT * FROM `savin_user_content` WHERE `user_id`='".$var."' ORDER BY `id` DESC";
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
             foreach($result as $data){
                //change status colour
                if($data['user_task_status']=='send'){
                     $classname = "button-green";
                }
                if($data['user_task_status']=='processing'){
                    $classname = "button-purple";
                }
                if($data['user_task_status']=='awaited approval'){
                    $classname = "button-red";
                }
                if($data['user_task_status']=='pending'){
                    $classname = "button-yellow";
                }
                if($data['user_task_status']=='published'){
                    $classname = "button-blue";
                } 

                 $res[] = array(
                     "id"=>$this->encryptor('encrypt', $data['id']),
                     "time"=>date('d/m/Y', strtotime($data['reg_date'])),
                     "task_status"=>ucwords($data['user_task_status']),
                     "status_class"=>$classname
                 );
             }

             return json_encode(array("status"=>"success","data"=>$res));
        } else {
            return json_encode(array("status"=>"error","msg"=>"No Activities yet"));
        }
    }

    //get user activities
    public function GetUser_Content(string $var = null)
    {
        # code...
        //decrypt id
        $postid = $this->encryptor('decrypt', $var);

        $sql = "SELECT * FROM `savin_user_content` WHERE `id`='".$postid."'";
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
             foreach($result as $data){
                 $res[] = array(
                     "id"=>$this->encryptor('encrypt', $data['id']),
                     "images"=>json_decode($data['user_uploaded_images']),
                     "content"=>$data['user_uploaded_content']
                 );
             }

             return json_encode(array("status"=>"success","data"=>$res));
        } else {
            return json_encode(array("status"=>"error","msg"=>"No Activities yet"));
        }
    }

    //create thumbnail of hotel images
    public function CreateThumbnail_Image($request = array())
    {

            if(!empty($request) && $request['action']=='thumbnail'){
                   
                   $targetDirthumb = $request['uploadthumbpath'];
                   $fileName = $request['filename'];
                   $targetFilePath = $request['uploadimagepath'];
                   $file_ext = $request['fileext'];
   
                   //thumbnail creation
                       $thumbnailFilepath = $targetDirthumb.$fileName;
                       list($width,$height) = getimagesize($targetFilePath);
   
                       $thumb_create = imagecreatetruecolor($request['width'],$request['height']);
   
                       switch($file_ext){
                           case 'jpg':
                               $source = imagecreatefromjpeg($targetFilePath);
                               break;
                           case 'jpeg':
                               $source = imagecreatefromjpeg($targetFilePath);
                               break;
   
                           case 'png':
                               $source = imagecreatefrompng($targetFilePath);
                               break;
                           case 'JPG':
                               $source = imagecreatefromjpeg($targetFilePath);
                               break;
                           default:
                               $source = imagecreatefromjpeg($targetFilePath);
                       }
   
                       imagecopyresized($thumb_create,$source,0,0,0,0,$request['width'],$request['height'],$width,$height);
                       switch($file_ext){
                           case 'jpg' || 'jpeg':
                               imagejpeg($thumb_create,$thumbnailFilepath,100);
                               break;
                           case 'png':
                               imagepng($thumb_create,$thumbnailFilepath,100);
                               break;
   
                           case 'JPG':
                               imagejpeg($thumb_create,$thumbnailFilepath,100);
                               break;
                           default:
                               imagejpeg($thumb_create,$thumbnailFilepath,100);
                       }
            }
   
    }

}
?>