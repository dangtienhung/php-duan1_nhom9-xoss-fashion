<?php
class c_info
{

    public function index()
    {
        include('models/m_customers.php');
        $c_customers = new m_customer();

        // tìm kiến khách hàng
        $list = $c_customers->read_customer();
        $view = 'views/info/v_info.php';
        include('templates/admin/layout.php');
    }
    public function detail_info(){
        include('models/m_customers.php');

        $customer = new m_customer();
        $each = $customer->read_one_customer();

        $view = 'views/info/v_detail_info.php';
        include('templates/admin/layout.php');
    }
}