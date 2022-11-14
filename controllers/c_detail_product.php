<?php

class c_detail
{
    public function index()
    {
        include('models/m_detail_product.php');
        $m_detail_product= new m_detail_product();
        // Lấy ra chi tiết sản phẩm       
        $detail_product = $m_detail_product -> getDetailProduct();
        // Láy ra sản phẩm mới nhất
        $new_products = $m_product -> getNewProduct();
        $view = 'views/home/v_home.php';
        include('templates/client/layout.php');
    }
}