<!-- đặng tiến hưng -->

<?php

include_once 'database.php';

class m_login extends database
{
    public function read_check_login($email, $password)
    {
        $sql = "select * from customer 
            where email = ? and passWord = ?;";
        $this->setQuery($sql);
        return $this->loadRow(array($email, $password));
    }
}