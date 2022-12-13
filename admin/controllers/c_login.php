<?php
include_once 'models/m_login.php';

@session_start();

class c_login
{
    public function check_login()
    {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['current-password'];
            $this->save_login_session($email, $password);
            if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != 3) {
                 echo "<script>window.location =' home.php'</script>";
            } else {
                $_SESSION['error_login'] = "Sai thông tin đăng nhập";
                 echo "<script>window.location =' index.php'</script>";
            }
        }
    }
    public function save_login_session($email, $password)
    {
        $m_login = new m_login();
        $admin = $m_login->read_check_login($email, $password);
        if (!empty($admin)) {
            $_SESSION['admin_id'] = $admin->id;
            $_SESSION['admin_name'] = $admin->name_customer;
            $_SESSION['admin_email'] = $admin->email;
            $_SESSION['admin_picture'] = $admin->picture;
            $_SESSION['admin_role'] = $admin->role;
            //  echo "<script>window.location =' index.php'</script>";
        }
    }
    // đăng xuất
    public function check_logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['admin_picture']);
        unset($_SESSION['admin_role']);
        unset($_SESSION['error_login']);
         echo "<script>window.location =' index.php'</script>";
    }
}