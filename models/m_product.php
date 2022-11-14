<?php

    require_once ("database.php");
    class m_product extends database{
        public function getProduct(){
            $sql = "select * FROM product"; 
            $this ->setQuery($sql);
            // lấy dữ liệu nhiều dùng 
            return $this -> loadAllRows();
        } 

        public function getfeaturedProducts(){
            $sql = "select * from product where view_number >= 10";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }  

        public function getNewProduct() {
            // Sản phẩm được coi là sản phẩm mới trong khoảng từ ngày add đến 20 ngày sau
            $sql = "SELECT * FROM `product` ORDER BY id DESC LIMIT 0, 5;";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        public function getProductByCateory($id_category) {
            // Sản phẩm được coi là sản phẩm mới trong khoảng từ ngày add đến 20 ngày sau
            $sql = "SELECT * FROM `product` where id_category";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
    }