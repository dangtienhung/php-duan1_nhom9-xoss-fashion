<?php
require_once ("database.php");
class m_cart extends database{
    public function getOrder() {
        $sql = "select * FROM orders order by order_date desc"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows(array());
    }

    public function getOrderDetailById($id) {
        $sql = "select order_date, orders.total as 'total_price', order_detail.total, name_product, picture, price, quantity FROM orders inner join order_detail on orders.id = order_detail.id_order where orders.id = ?"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows(array($id));
    }

    public function getOrderByIdCustomer($id) {
        $sql = "select orders.id, id_customer, order_date, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity' FROM orders inner join order_detail on orders.id = order_detail.id_order GROUP by id_order having id_customer = ?;"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows(array($id));
    }

    public function createOrder($id, $total_cost) {
        $sql = "insert into orders(id_customer,total) values (?, ?)";
        $this ->setQuery($sql);
        return $this ->execute(array($id, $total_cost));
    }

    public function addDataToOrderDetail($id, $name, $picture, $price, $quantity, $total) {
        $sql = "insert into order_detail(id_order, name_product, picture, price, quantity, total) values (?, ?, ?, ?, ?, ?)";
        $this ->setQuery($sql);
        return $this->execute(array($id, $name, $picture, $price, $quantity, $total));
    }

    public function changeQuantity($id, $quantity) {
        $sql = "update product set quantity = quantity-$quantity where id = $id";
        $this->setQuery($sql);
        return $this->execute(array());
    }

    public function delete_order($id) {
        $sql = "delete from order_detail where id_order = ?";
        $this->setQuery($sql);
        $this->execute(array($id));
        $sql = "delete from orders where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    } 
}