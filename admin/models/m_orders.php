<?php

@session_start();

include('database.php');

class m_order extends database
{
    public function getOrderDetailById($id)
    {
        $sql = "select order_date, orders.total as 'total_price', idProduct,order_detail.total, product_name as 'name_product', product_picture as 'picture', order_detail.price, order_detail.quantity FROM orders inner join order_detail on orders.id = order_detail.id_order where orders.id = ?";
        $this->setQuery($sql);
        // lấy dữ liệu 
        return $this->loadAllRows(array($id));
    }

    public function getOrder()
    {
        $sql = "select orders.id, name_customer ,customer.id as 'customer_id', email, order_date, address, phone_number, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity', status FROM orders join customer on orders.id_customer = customer.id join order_detail on orders.id = order_detail.id_order join order_status on orders.order_status = order_status.id GROUP by id_order";
        $this->setQuery($sql);
        // lấy dữ liệu 
        return $this->loadAllRows();
    }

    public function delete_order($id)
    {
        $sql = "delete from orders where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }

    public function switch_status($status, $id)
    {
        $sql = "update orders set order_status = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($status, $id));
    }

    // lấy ra số lượng đơn hàng
    public function get_total_order($email)
    {
        $sql = "select count(*) from customer
        JOIN orders ON customer.id = orders.id_customer 
        WHERE customer.email = ? 
                AND role = 3 
                AND orders.order_status = 2;";
        $this->setQuery($sql);
        return $this->loadRecord(array($email));
    }
    // lấy ra sản phẩm chi tiết
    public function get_order_detail($id)
    {
        $sql = "select * from orders 
                join order_detail on orders.id = order_detail.id_order
                where orders.id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }
}