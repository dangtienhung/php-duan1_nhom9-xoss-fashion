<?php

@session_start();

class c_register {
    public function index() {
        include('views/login_register/v_register.php');
    }

    public function check_register() {
        $m_customer= new m_customer();

        $customer =$m_customer-> getAllCustomer();

        if(isset($_POST['btn_register'])) {
            if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["address"]) && !empty($_POST["phone_number"]) && !empty($_POST["password"]) && !empty($_POST["rp_password"])) {
                // vòng lặp kiểm tra xem có tài khoản trùng tên hay email ko
                foreach($customer as $account) {
                    if($account->email == $_POST["email"] || $account->name_customer == $_POST["name"]) {
                        $_SESSION['error_register_user'] = "Tên hoặc email đã được sử dụng";
                        header('location:?url=register.php');
                        echo 'Đăng ký thất bại';
                        break;
                    }   
                }  
                 
                if($_POST["password"] == $_POST["rp_password"]) {
                    $user_name = $_POST["name"];
                    $email = $_POST["email"];
                    $address = $_POST["address"];
                    $phone_number = $_POST["phone_number"];
                    $password = $_POST["password"];
                    $role = $_POST["role"];
                    $this -> save_customer($user_name, $email, $address, $phone_number, $password, $role);
                    header("location:?url=home");
                } else {
                    $_SESSION['error_register_user'] = "Mật khẩu không trùng khớp";
                    header('location:?url=register.php');
                    echo 'Đăng ký thất bại';
                }
            } else {
                $_SESSION['error_register_user'] = "Chưa nhập đủ dữ liệu";
                header('location:?url=register.php');
                echo 'Đăng ký thất bại';
            }  
        }
    }

    public function save_customer($user_name, $email, $address, $phone_number, $password, $role) {
        //thêm user vào bảng
        include('models/m_register.php');
        $m_register = new m_register();
        $m_register -> add_customer($user_name, $email, $address, $phone_number, $password, $role);

        //Lấy ra user mới đăng ký để lưu session
        $user = $m_register ->get_user_just_added($email, $password);

        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name_customer;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_role'] = $user->role;
    }
}