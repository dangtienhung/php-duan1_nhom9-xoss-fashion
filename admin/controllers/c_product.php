<!-- đây là phần products -->
<!-- đào duy ẩn -->

<?php
@session_start();

include('models/m_product.php');

class c_product
{
    public function get_all_product_category()
    {
        $get_all = new m_product();
        $list_product_category = $get_all->get_all_product_category();
        $view = ('views/product/v_product.php');
        include('templates/admin/layout.php');
    }
    public function get_all_product()
    {
        $get_all_product = new m_product();
        // tìm kiếm
        $search = '';
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            echo 'search: ' . $search;
            $number_count = $get_all_product->get_count_search($search);
            $view = ('views/product/v_product.php');
            include('templates/admin/layout.php');
        }
        $list_all_product = $get_all_product->get_all_product();
        $view = ('views/product/v_product.php');
        include('templates/admin/layout.php');
    }
    public function c_ceate_product()
    {
        $create_product = new m_product();
        $category_type = $create_product->get_all_category_type();
        if (isset($_POST['btn-submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $saleOff = $_POST['saleOff'];
            $image = $_FILES['picture'];
            $picture = ($image['error'] == 0) ? $image['name'] : '';
            $description = $_POST['description'];
            $view_number = $_POST['view_number'];
            $id_category = $_POST['id_category'];
            $create = $create_product->m_ceate_product($name, $price, $saleOff, $picture, $description, $view_number, $id_category);
            if ($create) {
                if ($image = "") {
                    echo "không có ảnh";
                } else {
                    $folder = "public/admin/font-end/images/";
                    $file_extension = explode('.', $picture)[1];
                    $file_name = time() . '.' . $file_extension;
                    $path_file = $folder . $file_name;
                    move_uploaded_file($image['tmp_name'], $path_file);
                }
                header('location: product.php');
            } else {
                header('location: product.php');
            }
        }
        $view = ('views/product/v_add-product.php');
        include('templates/admin/layout.php');
    }
    public function upload_product()
    {
        $upload_product = new m_product();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $list_item = $upload_product->get_product_by_id($id);
            $category_type = $upload_product->get_all_category_type();
        }
        if (isset($_POST['btn-submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $saleOff = $_POST['saleOff'];
            $image = $_FILES['picture'];
            $picture = ($image['error'] == 0) ? $image['name'] : '';
            $description = $_POST['description'];
            $view_number = $_POST['view_number'];
            $id_category = $_POST['id_category'];
            if ($image != "") {
                $product_id = $upload_product->get_product_by_id($id);
                $upload = $upload_product->upload_product($name, $price, $saleOff, $picture, $description, $view_number, $id_category, $id);
                if ($upload) {
                    $folder = 'public/front-end/images/';
                    $file_extension = explode('.', $picture)[1];
                    $file_name = time() . '.' . $file_extension;
                    $path_file = $folder . $file_name;
                    $product_id = $upload_product->get_product_by_id($id);
                    move_uploaded_file($image['tmp_name'], $path_file);
                    header('location: product.php');
                } else {
                    header('location: product.php');
                }
            }else {
                echo "nhập lại";
            }
        }
        $view = ('views/product/v_upload-product.php');
        include('templates/admin/layout.php');
    }
    public function delete_product()
    {
        $delete_product = new m_product();
        if (isset($_GET['id'])) {
            $id =  $_GET['id'];
            $product_id = $delete_product->get_product_by_id($id);
            $result = $delete_product->delete_product($id);
            if ($result) {
                echo "<script>alert('thành công')</script>";
                header('location: product.php');
            } else {
                echo "<script>alert('thất bại')</script>";
                header('location: product.php');
            }
        }
    }
}
