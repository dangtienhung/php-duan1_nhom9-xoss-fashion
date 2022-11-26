<!-- đặng tiến hưng -->

<?php

@session_start();

include('database.php');

class m_home extends database
{
    // đếm số lượng sản phẩm
    public function count_products()
    {
        $sql = "SELECT COUNT(*) AS total FROM product";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // đếm số lượng khách hàng
    public function count_customers()
    {
        $sql = "SELECT COUNT(*) FROM customer
                where customer.role = 3";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // đếm số lượng nhân viên
    public function count_staff()
    {
        $sql = "SELECT COUNT(*) FROM customer
                where customer.role = 2";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // đếm số lượng các loại sản phẩm
    public function count_product_categories()
    {
        $sql = "SELECT COUNT(*) FROM category";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // đếm số lượng bình luận
    public function count_comment()
    {
        $sql = "SELECT COUNT(*) FROM comment";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // đếm số lượng đơn hàng
    public function count_order()
    {
        $sql = "SELECT COUNT(*) FROM orders";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
}