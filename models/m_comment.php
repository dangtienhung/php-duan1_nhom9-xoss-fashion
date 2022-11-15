<?php
require_once("database.php");
class m_comment extends database
{
     public function getComment()
     {
          $id_product = $_GET['id_product'];
          $sql = "select *, TIME(comment.timeComment) as 'time_comment', DATE(comment.timeComment) as 'date_comment' FROM comment, product , customer , category 
          where customer.id = comment.idPerson and product.id = comment.idItem 
          and product.id_category = category.id  
          and product.id = $id_product";
          $this->setQuery($sql);
          // lấy dữ liệu nhiều dùng 
          return $this->loadAllRows();
     }
     public function insertComment($id_person,$id_product,$content){
          $sql = "Insert into comment(idPerson,idItem,comment_content) Values(?,?,?)";
          $this->setQuery($sql);
          return $this->execute(array($id_person,$id_product,$content));
     }
 
}
