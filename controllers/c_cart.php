<?php

@session_start();

class c_cart
{
    public function index()
    {
        if(!isset($_SESSION['user_id'])) {
            header('location:?url=login.php');
        }

        $view = 'views/cart/v_cart.php';
        include('templates/client/layout.php');
    }

    public function save_to_cart() {
        include('models/m_product.php');
        $m_product = new m_product();

        if(isset($_GET['id_product'])) {
            //Lấy ra sản phẩm
            $id = $_GET['id_product'];
            $product = $m_product -> getProductById($id);

            //set số lượng
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

            $price = $product->saleOff == 0 ? $product->price : $product->price*($product->saleOff / 100);

            if(empty($_SESSION['carts'][$id])) {
                $_SESSION['carts'][$id]['name'] = $product->name; 
                $_SESSION['carts'][$id]['id'] = $product->id; 
                $_SESSION['carts'][$id]['picture'] = $product->picture; 
                $_SESSION['carts'][$id]['price'] = $price; 
                $_SESSION['carts'][$id]['quantity'] = $quantity;
                $_SESSION['carts'][$id]['max_quantity'] = $product->quantity;

            } else {
                if($_SESSION['carts'][$id]['quantity'] < $product->quantity) {
                    $_SESSION['carts'][$id]['quantity'] = $_SESSION['carts'][$id]['quantity'] + $quantity;
                } else {
                    setcookie('nofication', 'số lượng vượt quá giới hạn', time() + 2, '/');
                    header('location:?url=product.php');
                }
            } 

        } else {
            setcookie('nofication', 'Thêm không thành công', time() + 2, '/');
            header('location:?url=cart.php');
        }

        setcookie('nofication', 'Thêm thành công', time() + 2, '/');
        header('location:?url=cart.php');
    }

    public function delete_item_from_cart() {
        if(isset($_GET['id_product'])) {
            $id = $_GET['id_product'];
            unset($_SESSION['carts'][$id]);
        } else {
            setcookie('nofication', 'Xóa không thành công', time() + 2, '/');
            header('location:?url=cart.php');
        }
        setcookie('nofication', 'Xóa thành công', time() + 2, '/');
        header('location:?url=cart.php');
    }

    public function handle_change_quantity() {
        if(isset($_GET['id_product'])) {
            $id=$_GET['id_product'];
            if($_SESSION['carts'][$id]['quantity'] < $_SESSION['carts'][$id]['max_quantity'] && $_SESSION['carts'][$id]['quantity'] > 0) {
                if($_GET['set'] == "incre") {
                    $_SESSION['carts'][$id]['quantity']++;
                }

                if($_GET['set'] == "decre") {
                    $_SESSION['carts'][$id]['quantity']--;
                }
            }
            if($_SESSION['carts'][$id]['quantity'] == 0) {
                unset($_SESSION['carts'][$id]);
            }
        }
        header('location:?url=cart.php');
    }

    public function create_order() {
        include('models/m_cart.php');
        $m_cart = new m_cart();
        if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != 1) {
            if(isset($_POST['btn_create']) && !empty($_SESSION['carts'])) {
                $id = $_SESSION['user_id'];
                $total_cost = $_POST['results'];
                $m_cart -> createOrder($id, $total_cost);

                //Lấy ra order
                $order = $m_cart -> getOrder();
                $id_order = $order[0]->id;
                foreach ($_SESSION['carts'] as $value) {
                    $total_item_cost = $value['price'] * $value['quantity'];
                    $m_cart -> addDataToOrderDetail($id_order, $value['name'], $value['picture'], $value['price'], $value['quantity'],$total_item_cost);
                    $m_cart -> changeQuantity($value["id"], $value['quantity']);
                }
                setcookie('nofication', 'Đã Tạo Hóa Đơn Thành Công, xem chi tiết trong phần quản lý', time() + 2, '/');
                unset($_SESSION['carts']);
                header('location:?url=info.php&checkbill=');
            } else {
                setcookie('nofication', 'Chưa có sản phẩm', time() + 2, '/');
                header('location:?url=cart.php');
            }
        } else {
            setcookie('nofication', 'Tài khoản admin không dùng để mua sản phẩm, xin vui lòng tạo tài khoản người dùng', time() + 2, '/');
            header('location:?url=cart.php');
        }
    }

}