<?php

@session_start();

include('models/m_staffs.php');

class c_staff
{
    // lấy ra tất cả sản phẩm
    public function get_all_staff()
    {
        $search = '';
        if (isset($_GET['search'])) {
            $search =  $_GET['search'];
        }
        $m_staff = new m_staff();
        $list_staffs = $m_staff->get_all_staff($search);
        $view = 'views/staffs/v_staff.php';
        include('templates/admin/layout.php');
    }
    // thêm nhân viên
    public function add_one_staff()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name-staff'];
            $email = $_POST['email-staff'];
            $password = $_POST['password-staff'];
            $image = $_FILES['picture'];
            $picture = ($image['error'] == 0) ? $image['name'] : '';
            $address = $_POST['address-staff'];
            $phone = $_POST['phone-staff'];
            $role = $_POST['role-staff'];
            if ($picture != '') {
                $file_extension = explode('.', $picture)[1];
                $file_name = time() . '.' . $file_extension;
            }
            $m_staff = new m_staff();
            $result = $m_staff->add_one_staff($name, $password, $email, $address, $phone, $file_name, $role);
            if ($result) {
                $folder = 'public/front-end/images/staff/';
                $path_file = $folder . $file_name;
                move_uploaded_file($image['tmp_name'], $path_file);
            }
            header('location: staff.php');
        }
    }
    // xóa nhân viên
    public function delete_one_staff()
    {
        $m_staff = new m_staff();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $m_staff->delete_one_staff($id);
            if ($result) {
                header('location: staff.php?success=Xóa thành công!');
            } else {
                header('location: staff.php?error=Xóa thất bại!');
            }
        }
    }
    // update sản phẩm
    public function update_staff()
    {
        $m_staff = new m_staff();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $info = $m_staff->get_one_staff_by_id($id);
            $view = 'views/staffs/v_edit_staff.php';
            include('templates/admin/layout.php');
        }
        if (isset($_POST['submit'])) {
            $id = $_POST['id-staff'];
            $name = $_POST['name-staff'];
            $email = $_POST['email-staff'];
            $password = $_POST['password-staff'];
            $image_new = $_FILES['picture-new'];
            $picture = ($image_new['error'] == 0) ? $image_new['name'] : '';
            $address = $_POST['address-staff'];
            $phone = $_POST['phone-staff'];
            $role = $_POST['role-staff'];
            if ($image_new['size'] > 0 && $image_new['error'] == 0) {
                $file_extension = explode('.', $image_new['name'])[1];
                $file_name = time() . '.' . $file_extension;
            } else {
                $file_name = $_POST['picture-old'];
            }
            $result = $m_staff->update_one_staff($id, $name, $password, $email, $address, $phone, $file_name, $role);
            if ($result) {
                $folder = 'public/front-end/images/staff/';
                $path_file = $folder . $file_name;
                move_uploaded_file($image_new['tmp_name'], $path_file);
            }
            header('location: staff.php');
        }
    }
}