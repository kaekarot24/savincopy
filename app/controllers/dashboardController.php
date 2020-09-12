<?php
$dashboard = new dashboard($db);

//update profile info
if($params[1] == "updateprofile"){

    //sore request in variable
    $data = $_REQUEST;

    echo $dashboard->Update_UserProfile(array(
        "action"=>"updateprofile",
        "data"=>$data
    ));

}

//get activities
if($params[1] == "getactivities"){
  
    echo $dashboard->GetUser_Activities($_SESSION['user_account']['userid']);
}

//get preview contents
if($params[1] == "previewcontent"){
   
    echo $dashboard->GetUser_Content($_REQUEST['userid']);
}

//upload content
if($params[1] == "uploadcontent")
{
    if(isset($_REQUEST) && !empty($_REQUEST))
    {

        //Check activities limit count
        $CheckStatus = $dashboard->CheckActivities_Count($_SESSION['user_account']['userid']);
        if(true === $CheckStatus){
              echo json_encode(array(
                  "status"=>"error",
                  "type"=>"limit",
                  "msg"=>"Your limit is reached according to package only one activity allowed."
              ));
        } 
        else 
        {
            if(!empty($_FILES['content_images'])){
                
                // File upload configuration
                $targetDir = ABSOLUTE_PATH.'../assets/images/users/content_images/';

                $allowTypes = array('jpg', 'png', 'jpeg', 'JPG', 'JPEG');

                $Countimg = count($_FILES['content_images']['name']);

                for($i=0; $i<$Countimg; $i++){
                    
                    $fname = explode(".", basename($_FILES['content_images']['name'][$i]));
                    $file_ext = $fname[1];
                    $fileName = "IMG_".md5($fname[0].time()).".".$file_ext;

                    //upload image path
                    $targetFilePath = $targetDir.$fileName;

                    // Check whether file type is valid 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                    if(in_array($fileType, $allowTypes)){

                        // Upload file to the server            
                        $keyFilename = $fileName;
                        $temp_file_loc = $_FILES['content_images']['tmp_name'][$i];

                        //Local PATH saved in database
                        $ImgPath_600x600 = "assets/images/users/content_images/".$keyFilename;

                        //Local PATH
                        $svpath = $targetDir.$keyFilename;

                        //Image upload 600x600 Size
                        $dashboard->CreateThumbnail_Image(array(
                            "action"=>"thumbnail",
                            "uploadthumbpath"=>$targetDir,
                            "filename"=>$keyFilename,
                            "uploadimagepath"=>$temp_file_loc,
                            "fileext"=>$file_ext,
                            "width"=>600,
                            "height"=>600
                        ));
                        
                        //create array of images path store in json
                        $imgary_path[] = $ImgPath_600x600;

                    }

                }
                
                    //get content into variable
                    $usercontent = $_REQUEST['content_message'];

                    echo $dashboard->Upload_UserContent(array(
                        "action"=>"upload",
                        "data"=>array(
                            "images"=>$imgary_path,
                            "content"=>$usercontent
                        )
                    ));
                

            } else 
                {
                  echo json_encode(array("status"=>"error","msg"=>"File is empty not allowed. Please try again"));
                }
        }        
    } else {
        echo  json_encode(array("status"=>"warning"));
    }

}

?>