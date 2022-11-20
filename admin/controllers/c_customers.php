<!-- đây là controllers phần customers -->
<!-- phạm văn hùng -->
<!-- đây là controllers phần customers -->
<!-- phạm văn hùng -->
<?php

class c_customers
{

    /* lấy ra tất cả khách hàng */
    public function index()
    {
        include('models/m_customers.php');
        $c_customers = new m_customer();

        // tìm kiến khách hàng
        $list = $c_customers->read_customer();
        $view = 'views/customers/v_customer.php';
        include('templates/admin/layout.php');
    }

    /* xóa người dùng */
    public function delete_customer()
    {
        include('models/m_customers.php');
        $delete_customer = new m_customer();
        if (isset($_GET['id'])) {
            $id =  $_GET['id'];
            $result = $delete_customer->delete_customer($id);
            if ($result) {
                echo "<script>alert('thành công')</script>";
                header('location: customer.php');
            } else {
                echo "<script>alert('thất bại')</script>";
                header('location: customers.php');
            }
        }
    }

    /* thêm người dùng mới */
    public function create_customer_view()
    {
        $view = 'views/customers/v_add_customer.php';
        include('templates/admin/layout.php');
    }

    public function create_customer()
    {
        include('models/m_customers.php');
        $c_customer = new m_customer();
        if (isset($_POST['btn-submit'])) {
            $name_customer = $_POST['username'];
            $picture = $_FILES['image'];
            $email = $_POST['email'];
            $address= $_POST['address'];
            $phone_number=$_POST['phone_number'];
            $passWord = $_POST['password'];
            $picture_name = ($picture['error'] == 0) ? $picture['name'] : '';
            $role=$_POST['role'];
            $result = $c_customer->create_customer($name_customer, $email, $passWord, $picture, $role, $address, $phone_number);
            if ($result) {
                if ($picture_name != '') {
                    $folder = 'public/admin/images/customer/';
                    $file_extension = explode('.', $picture_name)[1];
                    $file_name = time() . '.' . $file_extension;
                    $path_file = $folder . $file_name;
                    move_uploaded_file($picture['tmp_name'], $path_file);
                }
                header('location: customer.php');
                echo "<script>alert('thành công')</script>";
            } else {
                echo "<script>alert('thêm không thành công')</script>";
            }
        }
    }

    /* edit người dùng */
    public function edit_customer()
    {
        include('models/m_customers.php');

        $customer = new m_customer();
        $each = $customer->read_one_customer();

        $view = 'views/customers/v_edit_customers.php';
        include('templates/admin/layout.php');
    }

    public function handle_edit_customer()
    {
        include('models/m_customers.php');

        $customer = new m_customer();
        if (isset($_POST['btn-submit'])) {
            $id = $_POST['id'];
            $name_customer = $_POST['username'];
            $address=$_POST['address'];
            $phone_number=$_POST['phone_number'];
            $picture = $_FILES['image_new'];
            $new_picture = ($picture['error'] == 0) ? $picture['name'] : '';
            $email = $_POST['email'];
            $passWord = $_POST['password'];
            if ($new_picture != '' && $picture['size'] > 0) {
                $folder = 'public/front-end/images/customer/';
                $file_extension = explode('.', $new_picture)[1];
                $file_name = time() . '.' . $file_extension;
                $path_file = $folder . $file_name;
                move_uploaded_file($picture['tmp_name'], $path_file);
            } else {
                if (isset($_POST['image_old'])) {
                    $photo_old = $_POST['image_old'];
                } else {
                    $photo_old = 'avatar-trang-facebook.jpg';
                }
                $file_name = $photo_old;
            }
            if(isset($_SESSION["user_id"]) && $_SESSION['admin_id'] == $_SESSION['user_id']) {
                $_SESSION['user_picture'] = $file_name;
                $_SESSION['user_name'] = $name_customer;
                $_SESSION['user_email'] = $email;
            }
            $result = $customer->edit_customer($id, $name_customer, $email, $passWord, $picture, $role, $address, $phone_number);
            header('location: customer.php');
        }
    }
}