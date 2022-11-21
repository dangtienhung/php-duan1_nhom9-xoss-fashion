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
            $id = $_GET['id_product'];
            $product = $m_product -> getProductById($id);
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
}