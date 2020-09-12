<?php
class defaultModel
{
    public $db;
    
    public function __construct($db)
    {
        $this->db = $db;
        
    }

    public function enqueue_files($loadFiles,$type,$remote='local')
    {
        if(is_array($loadFiles))
        {
            foreach($loadFiles as $key => $filePath)
            {
                $filePath = $loadFiles;
                if($remote == 'local'){
                    $filePath = GL_SITE_URL.'/'.$jsFile;
                }
                $this->loadFile($filePath, $type);
            }
        }
        else {
            $filePath = $loadFiles;
            if($remote == 'local'){
                $filePath = GL_SITE_URL.'/'.$loadFiles;
            }
            $this->loadFile($filePath, $type);
        }
    }

    private function loadFile($filePath, $type)
    {
        if ($type=='css') {
            $this->loadCss($filePath);
        }
        else if ($type=='js') {
            $this->loadJs($filePath);
        }
    }

    private function loadCss($filePath){
        ?>
<link href="<?php echo $filePath; ?>" rel="stylesheet" /><?php echo "\n\r";
    }

    private function loadJs($filePath){
        ?><script src="<?php echo $filePath; ?>" type="text/javascript"></script><?php echo "\n\r";
    }

    function encryptor($action, $string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'tripr';
        $secret_iv = 'tripr2523@';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        //do the encyption given text/string/number
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    //check page session
    public function CheckPageSession(){
         //check session
        if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){
              header("Location: account");
        }
    }

    //check login session
    public function CheckLoginSession(){
        //check session
        if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){
              header("Location: dashboard");
        }
    }

    //check page permission
    public function CheckPagePermission($request = array()){

        if(!empty($request)){
            
            //data store in variable
            $roleid = $request['role'];
            $pagename = $request['pagename'];

            //get pageid
            $pageid = $this->GetPageId_ByPagename(array(
                "action"=>"pagename",
                "pagename"=>$pagename
            ));

            //check permission exist or not
            $strCheck = json_decode($this->CheckPagePermission_Exist(array(
                "roleid"=>$roleid,
                "pageid"=>$pageid
            )), true);

            if(false === $strCheck['status']){
                header("Location: page_permission");
            }
        }     
    }

    //get pageid by pagename
    private function GetPageId_ByPagename($request = array()){

           if($request['action']=='pagename'){
            $sql = "SELECT * FROM `bedu_menu` WHERE `page_name`='".$request['pagename']."'";
            $result = $this->db->query($sql);
            $rowdata = $result->fetch_object();

                return $rowdata->id;
           }

           if($request['action']=='pageid'){
            $sql = "SELECT * FROM `bedu_menu` WHERE `id`='".$request['pageid']."'";
            $result = $this->db->query($sql);
            $rowdata = $result->fetch_object();

                return $rowdata->page_name;
           }
           
    }

    //check permission is exist or not
    private function CheckPagePermission_Exist($request = array()){
          $sql = "SELECT * FROM `bedu_roles_permission` WHERE `role_id`='".$request['roleid']."' AND `page_id`='".$request['pageid']."'";
          $result = $this->db->query($sql);
          if($result->num_rows > 0){
              $response = array("status"=>true);
          } else {
              $response = array("status"=>false);
          }
        return json_encode($response);  
    }

    //get user role permission
    public function GetUserRole_Permission($request = array()){
 
           $sql = "SELECT * FROM `bedu_roles_permission` WHERE `role_id`='".$request['roleid']."'";
           $result = $this->db->query($sql);
           if($result->num_rows > 0){
                  foreach($result as $data){
                      $res[] = $this->GetPageId_ByPagename(array(
                          "action"=>"pageid",
                          "pageid"=>$data['page_id']
                      ));
                  }
                $response = array("status"=>"success","data"=>$res);  
           } else {
                $response = array("status"=>"empty","data"=>array());
           }
        return json_encode($response);     
    }

    //get role details
    public function GetRole_Details($request = array()){

         $sql = "SELECT * FROM `bedu_roles` WHERE `id`='".$request['id']."'";
         $result = $this->db->query($sql);
         $rowdata = $result->fetch_object();
         
         return $rowdata;
    }

    //get user details
    public function GetUser_Details($request = array()){

         $sql = "SELECT * FROM `savin_users` WHERE `id`='".$request['id']."'";
         $result = $this->db->query($sql);
         $rowdata = $result->fetch_object();
         
         return $rowdata;
    }



    //Get pagename
    public function get_pagename($request = array()){

        if($request['tab'] == 'pagedetails'){

           $checkval = explode("?", $request['uri']);

           switch($checkval[0]){
              
                case 'home':
                $pagename = 'Home';
                $description = 'An end-to-end digital PR agency, which helps its clients communicate better with their audiences. Our expertise includes media planning & buying, digital advertising, Public Relations consultation, Social Media Management, and AV content development';
                $keywords = 'Press Release, Digital Marketing, Social Media Marketing, Article Publication, Press Dissemination, Influencer Marketing, Content Marketing, Branded Article, Public Relation, PR';
                $status   = 'current'; 
                break;

                case 'aboutus':
                $pagename = 'About Us';
                $description = 'Founded in the year 2017, Savin Communication is an end-to-end digital PR agency, which helps its clients communicate better with their audiences. We are headquartered in NOIDA, in the heart of the business district of Delhi/NCR';
                $keywords = 'Press Release, Digital Marketing, Social Media Marketing, Article Publication, Press Dissemination, Influencer Marketing, Content Marketing, Branded Article, Public Relation, PR';
                $status   = 'current'; 
                break;

                
                case 'publicrelations':
                $pagename = 'Press Release Dissemination';
                $description = 'We cannot emphasize the importance of Public Relations in today’s business milieu. With each passing year, PR is proving to be essential to maintain a brand’s shelf life and continue to earn the trust of clients and customers';
                $keywords = 'Press Release, Digital Marketing, Social Media Marketing, Article Publication, Press Dissemination, Influencer Marketing, Content Marketing, Branded Article, Public Relation, PR';
                $status   = 'current'; 
                break;

                case 'socialmediamarketing':
                $pagename = 'Social Media Marketing';
                $description = 'India is one of the top 4 users of Internet in the world, next only to China. Digital Marketing is a billion-dollar industry today and it is on its way to be much more than that! Apart from being a career propellant, digital marketing is also your window into the future of business';
                $keywords = 'Press Release, Digital Marketing, Social Media Marketing, Article Publication, Press Dissemination, Influencer Marketing, Content Marketing, Branded Article, Public Relation, PR';
                $status   = 'current'; 
                break;

                case 'influencermarketing':
                $pagename = 'Influencer Marketing';
                $description = 'Influencer marketing is the new fuel on which the advertising world runs. Statistics show that 70% or more of consumers belonging to the millennial generation buy products after getting influenced by someone on social media';
                $keywords = 'Press Release, Digital Marketing, Social Media Marketing, Article Publication, Press Dissemination, Influencer Marketing, Content Marketing, Branded Article, Public Relation, PR';
                $status   = 'current'; 
                break;

                case 'affiliate':
                $pagename = 'Become Our Affiliate';
                $description = 'A PR agency like Savin Communication is already focused on a wide variety of audiences, which means more contacts, more connections. Specialization in specific industries is another reason why you would want to affiliate with us';
                $keywords = 'Press Release, Digital Marketing, Social Media Marketing, Article Publication, Press Dissemination, Influencer Marketing, Content Marketing, Branded Article, Public Relation, PR';
                $status   = 'current'; 
                break;

                case 'contactus':
                $pagename = 'Contact Us';
                $description = 'Get in touch with us';
                $keywords = 'Press Release, Digital Marketing, Social Media Marketing, Article Publication, Press Dissemination, Influencer Marketing, Content Marketing, Branded Article, Public Relation, PR, Contact';
                $status   = 'current'; 
                break;

                case 'package':
                $pagename = 'Package Pricing';
                $description = 'Article coverages affordable packages available';
                $keywords = 'Press Release, Digital Marketing, Social Media Marketing, Article Publication, Press Dissemination, Influencer Marketing, Content Marketing, Branded Article, Public Relation, PR';
                $status   = 'current'; 
                break;

                case 'account':
                $pagename = 'MY ACCOUNT';
                $description = '';
                $keywords = 'Press Release, Digital Marketing, Social Media Marketing, Article Publication, Press Dissemination, Influencer Marketing, Content Marketing, Branded Article, Public Relation, PR';
                $status   = 'current'; 
                break;

                case 'success':
                $pagename = 'Payment Success';
                $description = '';
                $keywords = '';
                $status   = 'current'; 
                break;

                case 'failed':
                $pagename = 'Payment Failed';
                $description = '';
                $keywords = '';
                $status   = 'current'; 
                break;

                case 'failed':
                $pagename = 'Payment Failed';
                $description = '';
                $keywords = '';
                $status   = 'current'; 
                break;

                case 'dashboard':
                $pagename = 'Dashboard';
                $description = '';
                $keywords = '';
                $status   = 'current'; 
                break;
           }
        }

          return json_encode(array("pagename"=>$pagename,"status"=>$status,"description"=>$description,"keywords"=>$keywords));
    }
   
}

?>