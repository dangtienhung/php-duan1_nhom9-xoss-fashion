<!-- đây là phần danh mục sản phảm -->
<!-- đặng tiến hưng -->

<?php

include('models/m_product-categories.php');

class c_product_categories
{
    // render danh sách danh mục sản phẩm
    public function show()
    {
        $product_category = new m_product_category();
        $category_type = $product_category->get_category_type();
        // tìm kiếm sản phẩm
        $search = '';
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            echo 'search: ' . $search;
        }
        // phân trang
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $number_count = $product_category->get_count_search($search);
        $number_in_on_page = 2;
        $number_page = ceil($number_count / $number_in_on_page);
        $clear = $number_in_on_page * ($page - 1);
        $category = $product_category->get_category($search, $number_in_on_page, $clear);
        $view = 'views/product-categories/v_product-categories.php';
        include('templates/admin/layout.php');
    }

    // thêm mới sản phẩm
    public function add_product_category()
    {
        $product_category = new m_product_category();
        if (isset($_POST['submit'])) {
            $name_product_category = $_POST['name-product-category'];
            $desc_product_category = $_POST['desc-product-category'];
            $category_type = $_POST['id_product_type'];
            $result = $product_category->add_product_category($name_product_category, $desc_product_category, $category_type);
            if ($result) {
                header('location: product-categories.php?success=Thêm mới danh mục sản phẩm thành công!');
            } else {
                echo 'Thêm mới thất bại';
                header('location: product-categories.php?error=Thêm mới danh mục sản phẩm thất bại!');
            }
        }
    }

    // update danh mục sản phẩm
    public function update_product_category()
    {
        $product_category = new m_product_category();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category_item = $product_category->get_category_by_id($id);
            $category_type = $product_category->get_category_type();
            $view = 'views/product-categories/v_edit-product-categories.php';
            include('templates/admin/layout.php');
        }
        if (isset($_POST['submit'])) {
            $category_type = $_POST['id-product-category'];
            $name_product_category = $_POST['name-product-category'];
            $desc_product_category = $_POST['desc-product-category'];
            $id_product_type = $_POST['id_product_type'];
            $result = $product_category->update_product_category($category_type, $name_product_category, $desc_product_category, $id_product_type);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
            // die();
            if ($result) {
                header('location: product-categories.php?success=Cập nhật danh mục sản phẩm thành công!');
            } else {
                echo 'Cập nhật thất bại';
                header('location: product-categories.php?error=Cập nhật danh mục sản phẩm thất bại!');
            }
        }
    }

    // xóa danh mục sản phẩm
    public function delete_product_category()
    {
        $product_category = new m_product_category();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $product_category->delete_product_category($id);
            if ($result) {
                header('location: product-categories.php?success=Xóa danh mục sản phẩm thành công!');
            } else {
                header('location: product-categories.php?error=Xóa danh mục sản phẩm thất bại!');
            }
        }
    }
}