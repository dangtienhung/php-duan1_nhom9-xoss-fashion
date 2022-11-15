<?php
    require_once ("database.php");
class m_register extends database{

    public function add_customer($user_name, $email, $password, $role) {
        $sql = "insert into customer(name_customer, email, passWord, role, active) values (?, ?, ?, ?, 0)";
        $this->setQuery($sql);
        return $this->execute(array($user_name, $email, $password, $role));
    }

    public function get_user_just_added($email, $password) {
        $sql = "select * from customer 
            where email = ? and passWord = ?;";
        $this->setQuery($sql);
        return $this->loadRow(array($email, $password));
    }
}