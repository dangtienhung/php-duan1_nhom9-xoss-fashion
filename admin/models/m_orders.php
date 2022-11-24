<?php

@session_start();

include('database.php');

class m_order extends database
{
    public function getOrderDetailById($id) {
        $sql = "select order_date, orders.total as 'total_price', order_detail.total, name_product, picture, price, quantity FROM orders inner join order_detail on orders.id = order_detail.id_order where id_order = ?"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows(array($id));
    }

    public function getOrder() {
        $sql = "select orders.id, name_customer, order_date, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity' FROM orders join customer on orders.id_customer = customer.id join order_detail on orders.id = order_detail.id_order GROUP by id_order"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows();
    }

    public function delete_order($id) {
        $sql = "delete from orders where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    } 
}