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

        public function getfeaturedProducts(){
            $sql = "select * from product where view_number >= 50";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }  

        public function getNewProduct() {
            // Sản phẩm được coi là sản phẩm mới trong khoảng từ ngày add đến 20 ngày sau
            $sql = "select * from product where DAY(date_added) < DAY(current_date) AND DAY(date_added) > DAY(current_date) - 20";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
    }