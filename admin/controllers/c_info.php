<?php
    @session_start();
class c_info
{


    public function show()
    {
        include('models/m_customers.php');
        $m_customer = new m_customer();
        if(isset($_SESSION['admin_id']) && $_SESSION['admin_role'] == 2) {
            $user = $m_customer -> getCustomerById();
        } else {
            header("notfound.php");
        }
        // tìm kiến khách hàng
        $view = 'views/info/v_show.php';
        include('templates/admin/layout.php');
    }
    public function index()
    {
        include('models/m_customers.php');
        $m_customer = new m_customer();
        if(isset($_SESSION['admin_id']) && $_SESSION['admin_role'] == 1) {
            $user = $m_customer -> getCustomerById();
        } else {
            header("notfound.php");
        }
        // tìm kiến khách hàng
        $view = 'views/info/v_info.php';
        include('templates/admin/layout.php');
    }
    public function change_info() {
        include('models/m_customers.php');
        if(isset($_POST["btn_save"])) {
            if(empty($_POST["email"])) {
                $email = $_POST["current_email"];
            } else {
                $email = $_POST["email"];
            }

            if(empty($_POST["phoneNumber"])) {
                $phone_number = $_POST["current_phone_number"];
            } else {
                $phone_number = $_POST["phoneNumber"];
            }

            if(empty($_POST["user_name"])) {
                $name = $_POST["current_name"];
            } else {
                $name = $_POST["user_name"];
            }
            if(isset($_SESSION["admin_id"]) ) {
                $_SESSION['admin_name'] = $name;
                $_SESSION['admin_email'] = $email;
            }
            $m_customer = new m_customer();
            $m_customer -> save_change_info($name, $email, $phone_number, $_SESSION["admin_id"]);
            header("location: info.php");
        }
    }
public function password(){

        include('models/m_customers.php');
        $m_customer = new m_customer();
        if(isset($_SESSION['admin_id']) && $_SESSION['admin_role'] == 1 ) {
            $user = $m_customer -> getCustomerById($_SESSION["admin_id"]);
        } else {
            header("notfound.php");
        }
        $view = 'views/info/v_change_pass.php';
        include('templates/admin/layout.php');
}
    public function change_password() {
        include('models/m_customers.php');
        $m_customer = new m_customer();
        if(isset($_SESSION['admin_id'])) {
            $user = $m_customer -> getCustomerById($_SESSION['admin_id']);
        }
        if(isset($_POST["btn-change"])){
            if(!empty($_POST["passWord"]) && !empty($_POST["rePassWord"]) && !empty($_POST["new-password"])){
                if($_POST["passWord"] == $user->passWord){ 
                    if($_POST["new-password"] == $_POST["rePassWord"]) { 
                        $passWord = $_POST["new-password"];
                        $m_customer -> save_change_pass($passWord, $_SESSION['admin_id']);
                        setcookie("nofication","Thay đổi thành công", time() + 3, '/');
                    } else {
                        setcookie("nofication","Mật khẩu nhập lại không trùng khớp!", time() + 3, '/');
                    }
                } else {
                    setcookie("nofication","Nhập sai mật khẩu", time() + 3, '/');
                }
            } else {
                setcookie("nofication","Chưa nhập đủ thông tin", time() + 3, '/');
            }
        }
        header("location: info.php");
    }
}