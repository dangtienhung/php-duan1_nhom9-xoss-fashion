<!-- đây là model phần customer -->
<!-- phạm văn hùng -->
<!-- đây là model phần customer -->
<!-- phạm văn hùng -->
<?php

include('database.php');

class m_customer extends database
{
    /* lấy ra tất cả các người dùng */
    public function read_customer()
    {
        $sql = "select customer.id,customer.name_customer,customer.picture,customer.address,customer.phone_number,customer.email,role.role_name as role_name from customer join role on customer.role=role.id ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /* lấy ra 1 người dùng */
    public function read_one_customer()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "select * from customer where id = '$id'";
        // $sql = "select customer.id,customer.name_customer,customer.email,role.role_name as role_name from customer join role on customer.role=role.id ";
        
        $this->setQuery($sql);
        return $this->loadRow();
    }

    /* thêm người dùng */
    public function create_customer($name_customer, $email, $passWord, $picture,$role)
    {
        $sql = "insert into customer(name_customer,passWord,email,picture,role) 
        values(?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute(array($name_customer, $email, $passWord, $picture,$role));
    }
    /* chỉnh sửa người dùng */
    public function edit_customer($id, $name_customer, $email, $passWord, $picture,$role)
    {
        $sql = "update customer 
        set 
        ame_customer = ?,
        email = ?,
        passWord = ?,
        picture = ?,
        role=? 
        where 
        id = ? ";
        $this->setQuery($sql);
        return $this->execute(array($name_customer, $email, $passWord, $picture,$role, $id));
    }
    /* xóa người dùng */
    public function delete_customer($id)
    {
        $sql = "delete from customer where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}