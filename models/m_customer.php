<?php 
require_once ("database.php");

class m_customer extends database{
   
    public function getAllCustomer(){
        $sql = "select * FROM customer"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows();
    }


    public function getCustomerById($id_person){
        $sql = "select * FROM customer where id = $id_person"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadRow();
    }

    public function save_change_info($email, $phone_number, $avatar, $id) {
        $sql = "update customer set email=?, phone_number=?, picture=? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($email, $phone_number, $avatar, $id));
    }

}