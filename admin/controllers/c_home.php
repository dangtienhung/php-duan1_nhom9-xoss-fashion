<?php

@session_start();

include('models/m_home.php');

class c_home
{
    public function show()
    {
        $m_home = new m_home();
        $count_products = $m_home->count_products();
        $count_customers = $m_home->count_customers();
        $count_product_categories = $m_home->count_product_categories();
        $count_comment = $m_home->count_comment();
        $count_orders = $m_home->count_order();
        $count_staff = $m_home->count_staff();
        $total_moneys = $m_home->sum_money();
        $doanh_thu_hang_thang = $m_home->doanh_thu_hang_thang();
        $view = 'views/home/v_home.php';
        include('templates/admin/layout.php');
    }
}