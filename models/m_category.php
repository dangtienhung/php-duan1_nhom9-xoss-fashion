<?php 
require_once ("database.php");
class m_category extends database{
     public function getCategory(){  
        $sql = "select * FROM category"; 
        $this ->setQuery($sql);
        // lấy dữ liệu nhiều dùng 
        return $this -> loadAllRows();
     }
}
 