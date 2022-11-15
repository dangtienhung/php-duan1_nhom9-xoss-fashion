<?php 
require_once ("database.php");

class m_detail_product extends database{
   
    public function getDetailProduct(){
    $id_product = $_GET['id_product'];
    $sql = "select * FROM product WHERE id = $id_product"; 
    $this ->setQuery($sql);
    // lấy dữ liệu 
    return $this -> loadRow();
    }

    public function inCreaseView() {
        $id_product = $_GET['id_product'];
        $sql = "update product set view_number = view_number + 1 where id = $id_product"; 
        $this ->setQuery($sql);
        return $this ->execute();
    }
    
    public function SuggestedProduct($id_category){
    $sql = "select * from product where id_category = $id_category";
    $this->setQuery($sql);
    return $this->loadAllRows();
    }
}