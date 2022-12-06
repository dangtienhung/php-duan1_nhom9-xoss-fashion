<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
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
            $id = $_GET['id_order'];
            $action = $_GET['action'];
            $email_user = $_GET['email'];
            $name_user = $_GET['name'];
            // gửi php mailer về máy khách hàng
            if ($action == 2) {
                $total_order = $m_orders->get_total_order($email_user);
                $list_order_detail = $m_orders->get_order_detail($id);
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->CharSet = "UTF-8";
                    $mail->Encoding = 'base64';
                    $mail->SMTPDebug = 0;                                 // bật tính năng gửi success or faild thì vẫn show thông tin mail để ta cấu hình
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'hungdang02042003@gmail.com';                 // SMTP username
                    $mail->Password = 'wraezcmsphxiaouc';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('hungdang02042003@gmail.com', 'XOSS Shop');
                    $mail->addAddress($email_user, $name_user);           // Name is optional
                    $mail->addCC('hungdang02042003@gmail.com');

                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Thông báo đặt hàng thành công!';
                    $body = '';
                    $body .= '<p>Xin chào, ' . $name_user . '!</p>';
                    $body .= '<hr/>';
                    $body .= '<h2>THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA</h2>';
                    $body .= '<table>';
                    $body .= '<thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Ngày đặt hàng</th>
                                </tr>
                            </thead>';
                    foreach ($list_order_detail as $each) {
                        $date = date_create($each->order_date);
                        $date = date('d/m/Y');
                        $body .= "<tr>
                                            <td center>" . $each->product_name . "</td>
                                            <td center>" . $each->price . ".00</td>
                                            <td center>" . $each->quantity . "</td>
                                            <td center>" . $date . "</td>
                                        </tr>";
                    }
                    $body .= '</table>';
                    $body .= '<p>Cảm ơn bạn đã đặt hàng tại XOSS Shop!</p>';
                    $mail->Body    = $body;

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            }
            $m_orders->switch_status($action, $id);
            header('location:orders.php');
        }
    }
}