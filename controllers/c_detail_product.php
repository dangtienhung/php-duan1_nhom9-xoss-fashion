<?php
    session_start();
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

        //Lấy ra comment
        $comments = $m_comment -> getComment();

        include('models/m_customer.php');
        $m_customer= new m_customer();

        //Lấy ra người dùng đăng nhập hiện tại
        if(isset($_SESSION["user_id"])) {
            $user = $m_customer-> getCustomerById($_SESSION["user_id"]);
        }

        $view = 'views/detail_product/v_detail.php';
        include('templates/client/layout.php');
    }

    public function insertComment() {
        //Insert comment
        if(isset($_POST["btn_submit"])) {
            include('models/m_comment.php');
            $m_comment = new m_comment();
            $id_product = $_POST["id_product"];
            $id_person = $_SESSION["users"];
            $content = $_POST["comment"];

            $m_comment -> insertComment($id_person,$id_product,$content);

            header("location:?url=detail.php&id_product=$id_product");
        }
    }
}