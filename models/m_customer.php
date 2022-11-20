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

    public function save_change_info($name, $email, $phone_number, $avatar, $id) {
        $sql = "update customer set name_customer=?, email=?, phone_number=?, picture=? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($name, $email, $phone_number, $avatar, $id));
    }

    public function save_change_pass($new_pass, $id) {
        $sql = "update customer set passWord=? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($new_pass, $id));
    }

}