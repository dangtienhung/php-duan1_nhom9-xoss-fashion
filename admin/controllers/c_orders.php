<?php

include "controllers/PHPMailer/src/PHPMailer.php";
include "controllers/PHPMailer/src/Exception.php";
include "controllers/PHPMailer/src/OAuth.php";
include "controllers/PHPMailer/src/POP3.php";
include "controllers/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('models/m_orders.php');
class c_order
{
    public function get_all_orders()
    {
        $m_orders = new m_order();
        $orders = $m_orders->getOrder();
        $view = 'views/orders/v_orders.php';
        include('templates/admin/layout.php');
    }
    public function get_detail_product()
    {
        $m_orders = new m_order();
        if (isset($_GET['id_order'])) {
            $id = $_GET['id_order'];
            $order_detail = $m_orders->getOrderDetailById($id);
            if ($order_detail) {
                $view = 'views/order_detail/v_order-detail.php';
                include('templates/admin/layout.php');
            } else {
                header('location:orders.php');
            }
        }
    }
    public function delete_order()
    {
        $m_orders = new m_order();
        if (isset($_GET['id_order'])) {
            $id = $_GET['id_order'];
            $m_orders->delete_order($id);
            header('location:orders.php');
        }
    }
    public function change_status()
    {
        $m_orders = new m_order();
        if (isset($_GET['id_order'])) {
            $name_user = $_GET['name'];
            $email_user = $_GET['email'];
            $action = $_GET['action'];
            $id = $_GET['id_order'];
            // gửi php mailer về máy khách hàng
            // if ($action == 2) {
            //     $mail = new PHPMailer(true);
            //     try {
            //         //Server settings
            //         $mail->charSet = "UTF-8";
            //         $mail->Encoding = 'base64';
            //         $mail->SMTPDebug = 2;                                 // bật tính năng gửi success or faild thì vẫn show thông tin mail để ta cấu hình
            //         $mail->isSMTP();                                      // Set mailer to use SMTP
            //         $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            //         $mail->SMTPAuth = true;                               // Enable SMTP authentication
            //         $mail->Username = 'hungdang02042003@gmail.com';                 // SMTP username
            //         $mail->Password = 'wraezcmsphxiaouc';                           // SMTP password
            //         $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            //         $mail->Port = 587;                                    // TCP port to connect to

            //         //Recipients
            //         $mail->setFrom('hungdang02042003@gmail.com', 'XOSS Shop');
            //         $mail->addAddress($email_user, $name_user);           // Name is optional
            //         $mail->addCC('hungdang02042003@gmail.com');

            //         //Content
            //         $mail->isHTML(true);                                  // Set email format to HTML
            //         $mail->Subject = 'Thong bao dat don hàng thanh cong!';
            //         $mail->Body    = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur blanditiis suscipit officiis cumque minima velit
            //         quas necessitatibus, quos natus reprehenderit porro modi delectus, incidunt ex! Esse dignissimos qui rem sit!';

            //         $mail->send();
            //         echo 'Message has been sent';
            //     } catch (Exception $e) {
            //         echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            //     }
            // }
            $m_orders->switch_status($action, $id);
            header('location:orders.php');
        }
    }
}