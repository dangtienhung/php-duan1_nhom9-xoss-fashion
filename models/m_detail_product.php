<?php 
require_once ("database.php");

class m_detail_product extends database{
   
     public function getDetailProduct(){
        $id_product = $_GET['id_product'];
        $sql = "select * FROM product WHERE id = $id_product"; 
        $this ->setQuery($sql);
        // lấy dữ liệu nhiều dùng 
        return $this -> loadAllRows();
     }
     public function SuggestedProduct(){
      $id_cate = $_GET['id_cate'];
      $sql = "select * from product where id_category = $id_cate";
      $this->setQuery($sql);
      return $this->loadAllRows();
   }
}