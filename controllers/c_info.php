<?php
include_once('models/m_customer.php');

@session_start();

class c_info {

    public function index() {
        $m_customer = new m_customer();
        $user = $m_customer -> getCustomerById($_SESSION["user_id"]);

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
            $avatar = isset($_POST["current_picture"]) ? $_POST["current_picture"] : "";

            if($_FILES["avatar"]["size"] != 0) {
                $avatar = $_FILES["avatar"]["name"];
            }
            $m_customer = new m_customer();
            $m_customer -> save_change_info($email, $phone_number, $avatar, $_SESSION["user_id"]);
            move_uploaded_file($_FILES["avatar"]["tmp_name"],"admin/public/front-end/images/customer/".$_FILES["avatar"]["name"]);
            header("location:?url=info.php");
        }
    }
}