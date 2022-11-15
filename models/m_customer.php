<?php 
require_once ("database.php");

class m_customer extends database{
   
    public function getCustomer(){
    $sql = "select * FROM customer"; 
    $this ->setQuery($sql);
    // lấy dữ liệu 
    return $this -> loadAllRow();
    }


    public function getCustomerById($id_person){
        $sql = "select * FROM customer where id = $id_person"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadRow();
    }

}