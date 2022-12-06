<!-- đây là model phần sản phẩm -->
<!-- đào duy ẩn -->
<?php
require_once "database.php";
class m_product extends database {
    // lấy ra một sản phẩm
    public function get_product_by_id($id) {
        $sql = "select * from product where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    // lẩy ra danh sách loại sản phảm
    public function get_all_category_type() {
        $sql = "select * from category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    // đếm số lượng sản phẩm với từ khóa tìm kiếm
    public function get_count_search($search)
    {
        $sql = "select count(*) from product where product.name like '%$search%'";
        $this->setQuery($sql);
        return $this->loadRecord($search);
    }
    // lấy ra tất cả các sản phẩm 
    public function get_all_product() {
        $sql = "select * from product";
        $this-> setQuery($sql);
        return $this->loadAllRows();
    }
    // lấy ra tất cả các loại sản phẩm
    public function get_all_product_category() {
        $sql = "select * from product
            join category on category.id = product.id_category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    //thêm sản phẩm 
    public function m_ceate_product($name,$price,$saleOff,$picture,$description, $quantity, $view_number,$id_category) {
        if($id_category == "") {
            $id_category = NULL;
        } 
        $sql = "insert into product(name,price,saleOff,picture,description, quantity, view_number,id_category)
        values(?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->loadRow(array($name,$price,$saleOff,$picture,$description,  $quantity, $view_number,$id_category));
    }
    // sửa sản phẩm
    public function upload_product($name,$price,$saleOff,$picture,$description,$view_number, $quantity, $id_category,$id){
        if($id_category == "") {
            $id_category = NULL;
        } 
        $sql = "update product 
                set 
                name = ?,
                price = ?,
                saleOff = ?,
                picture = ?,
                description = ?,
                view_number = ?,
                quantity = ?,
                id_category =? 
                where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($name,$price,$saleOff,$picture,$description,$view_number, $quantity, $id_category,$id));
    }
    // xóa sản phẩm
    public function delete_product($id){
        $sql = "delete from product where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    } 
}
?>