<!-- đây là phần products -->
<!-- đào duy ẩn -->

<?php
@session_start();


class c_product
{
    public function get_all_product_category()
    {   
        include('models/m_product.php');
        $get_all = new m_product();
        $list_product_category = $get_all->get_all_product_category();
        $view = ('views/product/v_product.php');
        include('templates/admin/layout.php');
    }
    public function get_all_product()
    {   
        include('models/m_product.php');
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
        include('models/m_product.php');
        $create_product = new m_product();
        $category_type = $create_product->get_all_category_type();
        if (isset($_POST['btn-submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $saleOff = $_POST['saleOff'];
            $image = $_FILES['picture'];
            $picture = ($image['error'] == 0) ? $image['name'] : '';
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $view_number = $_POST['view_number'];
            $id_category = $_POST['id_category'];
            if ($image == "") {
                echo "không có ảnh";
            } else {
                $folder = "public/front-end/images/products/";
                $file_extension = explode('.', $picture)[1];
                $file_name = time() . '.' . $file_extension;
                $path_file = $folder . $file_name;
                move_uploaded_file($image['tmp_name'], $path_file);
            }
            $create = $create_product->m_ceate_product($name, $price, $saleOff, $file_name, $description,  $quantity, $view_number, $id_category);
             echo "<script>window.location =' product.php'</script>";
        }
        $view = ('views/product/v_add-product.php');
        include('templates/admin/layout.php');
    }
    public function upload_product()
    {   
        include('models/m_product.php');
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
            $image = $_FILES['new-picture'];
            $picture = ($image['error'] == 0) ? $image['name'] : '';
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $view_number = $_POST['view_number'];
            $id_category = $_POST['id_category'];
            if ($image != "" && $image['size']>0) {
                $folder = 'public/front-end/images/products/';
                $file_extension = explode('.', $picture)[1];
                $file_name = time() . '.' . $file_extension;
                $path_file = $folder . $file_name;
                $list_item = $upload_product->get_product_by_id($id);
                move_uploaded_file($image['tmp_name'], $path_file);
            }else{
                if(isset($_POST['picture-old'])){
                    $picture_old = $_POST['picture-old'];
                }else {
                    $picture_old = $list_item->picture;
                }
                 $file_name = $picture_old;
                
            }
            
            $upload = $upload_product->upload_product($name, $price, $saleOff, $file_name, $description, $view_number, $quantity, $id_category, $id);
             echo "<script>window.location =' product.php'</script>";
        }
        $view = ('views/product/v_upload-product.php');
        include('templates/admin/layout.php');
    }
    public function delete_product()
    {   
        include('models/m_product.php');
        $delete_product = new m_product();
        if (isset($_GET['id'])) {
            $id =  $_GET['id'];
            $product_id = $delete_product->get_product_by_id($id);
            $result = $delete_product->delete_product($id);
            if ($result) {
                echo "<script>alert('thành công')</script>";
                 echo "<script>window.location =' product.php'</script>";
            } else {
                echo "<script>alert('thất bại')</script>";
                 echo "<script>window.location =' product.php'</script>";
            }
        }
    }
}
