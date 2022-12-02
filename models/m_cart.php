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
        $sql = "select order_date, orders.total as 'total_price', idProduct,order_detail.total,  product_name as 'name_product', product_picture as 'picture', order_detail.price, order_detail.quantity FROM orders join order_detail on orders.id = order_detail.id_order where orders.id = ?;"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows(array($id));
    }

    public function getOrderByIdCustomer($id) {
        $sql = "select orders.id, id_customer, address, phone_number,order_date, orders.total, id_order, sum(order_detail.quantity) as 'total_quantity', status FROM orders join customer on orders.id_customer = customer.id join order_detail on orders.id = order_detail.id_order join order_status on orders.order_status = order_status.id GROUP by id_order having id_customer = ?;"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows(array($id));
    }

    public function createOrder($id, $total_cost, $status) {
        $sql = "insert into orders(id_customer,total,order_status) values (?, ?, ?)";
        $this ->setQuery($sql);
        return $this ->execute(array($id, $total_cost, $status));
    }

    public function addDataToOrderDetail($id_order, $id, $product_name, $picture,$price, $quantity, $total) {
        $sql = "insert into order_detail(id_order, idProduct, product_name, product_picture, price, quantity, total) values (?, ?, ?, ?, ?, ?, ?)";
        $this ->setQuery($sql);
        return $this->execute(array($id_order, $id, $product_name, $picture, $price, $quantity, $total));
    }

    public function changeQuantity($id, $action ,$quantity) {
        $sql = "update product set quantity = quantity $action $quantity where id = $id";
        $this->setQuery($sql);
        return $this->execute(array());
    }

    public function delete_order($id) {
        $sql = "delete from orders where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }

}