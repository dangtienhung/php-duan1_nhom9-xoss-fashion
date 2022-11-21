<?php
require_once ("database.php");
class m_cart extends database{
    public function getOrder() {
        $sql = "select * FROM orders order by order_date desc"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows(array());
    }

    public function getOrderById($id) {
        $sql = "select * FROM orders inner join order_detail on orders.id = order_detail.id_order where orders.id = ?"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadRow(array($id));
    }

    public function getOrderByIdCustomer($id) {
        $sql = "select * FROM orders inner join order_detail on orders.id = order_detail.id_order GROUP by orders.id having orders.id_customer = ?"; 
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
}