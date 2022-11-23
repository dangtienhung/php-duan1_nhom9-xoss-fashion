<?php

include('models/m_orders.php');

class c_order
{
    public function get_all_orders()
    {
        $m_orders = new m_order();
        $list_orders = $m_orders->get_all_orders();
        $view = 'views/orders/v_orders.php';
        include('templates/admin/layout.php');
    }
}