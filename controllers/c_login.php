<?php
include_once 'models/m_login.php';

@session_start();

class c_login
{
    public function index() {
        include('views/login_register/v_login.php');
    }
    public function check_login()
    {
        if (isset($_POST['btn_login'])) {
            if(isset($_POST['email']) && isset($_POST['current-password'])) {
                $email = $_POST['email'];
                $password = $_POST['current-password'];
                $this->save_login_session($email, $password);
                if (isset($_SESSION['user_id'])) {
                    header('location:?url=home');
                } else {
                    $_SESSION['error_login_user'] = "Sai thông tin đăng nhập";
                    header('location:?url=login.php');
                    echo 'Đăng nhập thất bại';
                }
            } else {
                $_SESSION['error_login_user'] = "Chưa nhập đủ dữ liệu";
                header('location:?url=login.php');
                echo 'Đăng nhập thất bại';
            }
        }
    }
    public function save_login_session($email, $password)
    {
        $m_login = new m_login();
        $user = $m_login->read_check_login($email, $password);
        if (!empty($user)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name_customer;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_picture'] = $user->picture;
            $_SESSION['user_role'] = $user->role;
            // header('location: index.php');
        }
    }

    public function logOut() {
        session_destroy();
        header('location:?url=login.php');
    }
}