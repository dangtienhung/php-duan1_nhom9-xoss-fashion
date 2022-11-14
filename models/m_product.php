<?php

    require_once ("database.php");
    class m_product extends database{
        public function getProduct(){
            $sql = "select * FROM product INNER JOIN category
            ON product.id_category=category.id"; 
            $this ->setQuery($sql);
            // lấy dữ liệu nhiều dùng 
            return $this -> loadAllRows();
        }
    }