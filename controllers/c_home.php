<?php

class c_home
{
    public function index()
    {
        include('models/m_product.php');
        $m_product= new m_product();
        // Lấy ra sản phẩm nổi bật        
        $featured_products = $m_product -> getfeaturedProducts();
        // Láy ra sản phẩm mới nhất
        $new_products = $m_product -> getNewProduct();
        $view = 'views/home/v_home.php';
        include('templates/client/layout.php');
    }
}