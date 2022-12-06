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
        $sql = "select orders.id, name_customer ,customer.id as 'customer_id', email, order_date, address, phone_number, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity', order_status FROM orders join customer on orders.id_customer = customer.id join order_detail on orders.id = order_detail.id_order GROUP by id_order";
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
}