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

    // tính tổng số tiền
    public function sum_money()
    {
        $sql = "SELECT SUM(total) FROM orders
                WHERE orders.order_status = 2";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // thống kê doanh thu hàng tháng
    public function doanh_thu_hang_thang()
    {
        $sql = "SELECT SUM(total) AS total, MONTH(orders.order_date) AS month
                FROM orders
                WHERE orders.order_status = 2
                GROUP BY MONTH(orders.order_date)";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}