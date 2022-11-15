<?php

class c_product
{
    public function index()
    {
        include('models/m_product.php');
        $m_product= new m_product();

        include('models/m_category.php');
        $m_category = new m_category();
        //Lấy ra thể loại danh mục sản phẩm
        $categories_type = $m_category->getCategoryType();
        //Lấy ra danh mục sản phẩm
        $categories = $m_category->getCategory();

        //Lấy tất cả sản phẩm
        if(!isset($_GET["id_category"])) {
            $products = $m_product->getProduct();
        } else {        //Lấy sản phẩm theo danh mục
            $id_category = $_GET["id_category"];
            $products = $m_product->getProductByCateory($id_category);
        }

        $view = 'views/products/v_product.php';
        include('templates/client/layout.php');
    }
}