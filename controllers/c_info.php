<?php
include_once('models/m_customer.php');

@session_start();

class c_info {

    public function index() {
        $m_customer = new m_customer();
        if(isset($_SESSION['user_id'])) {
            $user = $m_customer -> getCustomerById($_SESSION["user_id"]);

            include('models/m_cart.php');
            $m_cart = new m_cart();
            $orders = $m_cart -> getOrderByIdCustomer($_SESSION["user_id"]);
        } else {
            header("location:?url=login.php");
        }
        $view='views/info/v_info.php';
        include('templates/client/layout.php');
    }

    public function change_info() {
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
            $avatar = isset($_POST["current_picture"]) ? $_POST["current_picture"] : "";

            if($_FILES["avatar"]["size"] != 0) {
                $avatar = $_FILES["avatar"]["name"];
            }
            if(isset($_SESSION["admin_id"]) && $_SESSION['admin_id'] == $_SESSION['user_id']) {
                $_SESSION['admin_picture'] = $avatar;
                $_SESSION['admin_name'] = $name;
                $_SESSION['admin_email'] = $email;
            }
            $m_customer = new m_customer();
            $m_customer -> save_change_info($name, $email, $phone_number, $avatar, $_SESSION["user_id"]);
            move_uploaded_file($_FILES["avatar"]["tmp_name"],"admin/public/front-end/images/customer/".$_FILES["avatar"]["name"]);
            header("location:?url=info.php");
        }
    }

    public function change_password() {
        $m_customer = new m_customer();
        if(isset($_SESSION['user_id'])) {
            $user = $m_customer -> getCustomerById($_SESSION['user_id']);
        }
        if(isset($_POST["btn-change"])){
            if(!empty($_POST["passWord"]) && !empty($_POST["rePassWord"]) && !empty($_POST["new-password"])){
                if($_POST["passWord"] == $user->passWord){ 
                    if($_POST["new-password"] == $_POST["rePassWord"]) { 
                        $passWord = $_POST["new-password"];
                        $m_customer -> save_change_pass($passWord, $_SESSION['user_id']);
                        setcookie("nofication","Thay đổi thành công", time() + 2, '/');
                    } else {
                        setcookie("nofication","Mật khẩu nhập lại không trùng khớp!", time() + 2, '/');
                    }
                } else {
                    setcookie("nofication","Nhập sai mật khẩu", time() + 2, '/');
                }
            } else {
                setcookie("nofication","Chưa nhập đủ thông tin", time() + 2, '/');
            }
        }
        header("location:?url=info.php");
    }

    public function delete_order() {
        if(isset($_GET['id_order'])) {
            include('models/m_cart.php');
            $m_cart = new m_cart();

            $id = $_GET['id_order'];

            $m_cart -> delete_order($id);
            setcookie("nofication","Xóa thành công", time() + 2, '/');
        } else {
            setcookie("nofication","Đã Xảy Ra Lỗi, thử lại sau", time() + 2, '/');
        }
        header("location:?url=info.php&checkbill=");
    }
    public function cancel_order() {
        if(isset($_GET['id_order'])) {
            include('models/m_cart.php');
            $m_cart = new m_cart();

            $id = $_GET['id_order'];
            $order_detail = $m_cart -> getOrderDetailById($id);
            foreach ($order_detail as $key => $value) {
                $m_cart -> changeQuantity($value->idProduct, '+' ,$value->quantity);
            }
            $m_cart -> delete_order($id);
            setcookie("nofication","Hủy thành công", time() + 2, '/');
        } else {
            setcookie("nofication","Đã Xảy Ra Lỗi, thử lại sau", time() + 2, '/');
        }
        header("location:?url=info.php&checkbill=");
    }
}