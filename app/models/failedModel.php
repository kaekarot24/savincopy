<?php
class failed extends defaultModel
{
    public $db;
    
    public function __construct($db)
    {
        $this->db = $db;

        parent::CheckPageSession();
        
    }

    //check order id
    public function Check_Order(string $var = null)
    {
        # code...
        $sql = "SELECT * FROM `savin_payment_info` WHERE `order_id`='".$var."' AND `status`!='captured'";
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
              return json_encode(array(
                  "status"=>true,
                  "data"=>$result->fetch_array()
              ));
        } else {
            return json_encode(array("status"=>false));
        }
    }
         
}
?>