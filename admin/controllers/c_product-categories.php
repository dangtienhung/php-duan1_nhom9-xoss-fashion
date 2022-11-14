<!-- đây là phần danh mục sản phảm -->
<!-- đặng tiến hưng -->

<?php

include('models/m_product-categories.php');

class c_product_categories
{
    public function show()
    {
        $view = 'views/product-categories/v_product-categories.php';
        include('templates/admin/layout.php');
    }
}