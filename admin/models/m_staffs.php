<?php

include('database.php');

@session_start();

class m_staff extends database
{
    // lấy ra danh sách tất cá nhân viên
    public function get_all_staff($search)
    {
        $sql = "select * from customer 
                where role = 2 and name_customer like '%$search%';";
        $this->setQuery($sql);
        return $this->loadAllRows(array($search));
    }
    // thêm nhân viên
    public function add_one_staff($name, $password, $email, $address, $phone, $img, $role)
    {
        $sql = "insert into customer(name_customer, passWord, email, address, phone_number, picture, role)
                values(?, ?, ?, ?, ?, ?, ?);";
        $this->setQuery($sql);
        return $this->execute(array($name, $password, $email, $address, $phone, $img, $role));
    }
    // xóa nhân viên
    public function delete_one_staff($id)
    {
        $sql = "delete from customer where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
    // lấy sản phẩm theo id
    public function get_one_staff_by_id($id)
    {
        $sql = "select * from customer where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    // cập nhật thông tin nhân viên
    public function update_one_staff($id, $name, $password, $email, $address, $phone, $img, $role)
    {
        $sql = "update customer
                set
                name_customer = '$name',
                passWord = '$password',
                email = '$email',
                address = '$address', 
                phone_number = '$phone',
                picture = '$img',
                role = '$role'
                where 
                id = '$id';";
        $this->setQuery($sql);
        return $this->execute(array($name, $password, $email, $address, $phone, $img, $role, $id));
    }
}