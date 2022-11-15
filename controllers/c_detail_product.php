<?php

class c_detail
{
    public function index()
    {
        include('models/m_detail_product.php');
        $m_detail_product= new m_detail_product();
        // tăng số lượt view mỗi làn click vào xem
        $m_detail_product -> inCreaseView();
        // Lấy ra chi tiết sản phẩm       
        $detail_product = $m_detail_product -> getDetailProduct();
        // Láy ra sản phẩm liên quan
        $id_category = $detail_product->id_category;
        $suggested_products = $m_detail_product -> SuggestedProduct($id_category);

        include('models/m_comment.php');
        $m_comment = new m_comment();
        
        include('models/m_customer.php');
        $m_customer= new m_customer();
        
        //Insert comment
        if(isset($_POST["btn_submit"])) {
            $email = $_POST["email"];
            $name = $_POST["name"];
            $content = $_POST["comment"];
            $customer = $m_customer -> getCustomerByEmailAndName($email, $name);
            $id_person = $customer->id;
            $m_comment -> insertComment($id_person,$detail_product->id,$content);
        }


        //Lấy ra comment
        $comments = $m_comment -> getComment();

        $view = 'views/detail_product/v_detail.php';
        include('templates/client/layout.php');
    }
}