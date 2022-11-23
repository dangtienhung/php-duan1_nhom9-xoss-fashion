<?php

@session_start();

include('database.php');

class m_order extends database
{
    public function get_all_orders()
    {
        $sql = "select * from orders
                join customer on orders.id_customer = customer.id
                join order_detail on orders.id = order_detail.id_order";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}