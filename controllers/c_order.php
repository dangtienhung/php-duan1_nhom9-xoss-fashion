<?php

class c_order {
    public function index() {
        if(isset($_GET['id_order'])) {
            include('models/m_cart.php');
            $m_cart = new m_cart();

            $id = $_GET['id_order'];

            $orders = $m_cart -> getOrderDetailById($id);
            if($orders) {
                $view = 'views/bills/v_orders.php';
                include('templates/client/layout.php');
            }
            else {
                 echo "<script>window.location ='?url=order.php&checkbill='</script>";
            }
        } else {
            setcookie("nofication","Đã Xảy Ra Lỗi, thử lại sau", time() + 2, '/');
            echo "<script>window.location ='?url=info.php&checkbill='</script>";
        }
    }    
}