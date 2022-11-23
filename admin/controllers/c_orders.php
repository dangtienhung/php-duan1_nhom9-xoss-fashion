<?php

include('models/m_orders.php');

class c_order
{
    public function get_all_orders()
    {
        $m_orders = new m_order();
        $orders = $m_orders -> getOrder();
        $view = 'views/orders/v_orders.php';
        include('templates/admin/layout.php');
    }
    public function get_detail_product() {
        $m_orders = new m_order();
        if(isset($_GET['id_order'])) {
            $id = $_GET['id_order'];
            $order_detail = $m_orders -> getOrderDetailById($id);
            if($order_detail) {
                $view = 'views/order_detail/v_order-detail.php';
                include('templates/admin/layout.php');
            } else {
                header('location:orders.php');
            }
        }
    }
    public function delete_order() {
        $m_orders = new m_order();
        if(isset($_GET['id_order'])) {
            $id = $_GET['id_order'];
            $m_orders -> delete_order($id);
            header('location:orders.php');
        }
    }
}