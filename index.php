<?php
$url = isset($_GET["url"]) ? $_GET["url"] : "/";
include 'controllers/c_home.php';
include 'controllers/c_detail_product.php';
include 'controllers/c_product.php';
include 'controllers/c_login.php';
include 'controllers/c_register.php';
include 'controllers/c_info.php';
include 'controllers/c_404.php';
include 'controllers/c_cart.php';
include 'controllers/c_order.php';

switch ($url) {
    case '/':
    case 'home':
        $index = new c_home();
        $index->index();
        break;
    case 'detail.php':
        $detail = new c_detail();
        $detail->index();
        break;
    case 'product.php':
        $product = new c_product();
        $product->index();
        break;
    case 'add_comment.php':
        $add_comment = new c_detail();
        $add_comment->insertComment();
        break;
    case 'login.php':
        $login = new c_login();
        $login->index();
        break;
    case 'check_login.php':
        $check_login = new c_login();
        $check_login->check_login();
        break;
    case 'logout.php':
        $logout = new c_login();
        $logout->logOut();
        break;
    case 'register.php':
        $register = new c_register();
        $register->index();
        break;
    case 'check_register.php':
        $register = new c_register();
        $register->check_register();
        break;
    case 'info.php':
        $info = new c_info();
        $info->index();
        break;
    case 'change_info.php':
        $info = new c_info();
        $info->change_info();
        break;
    case 'change_pass.php':
        $info = new c_info();
        $info->change_password();
        break;
    case 'cart.php':
        $cart = new c_cart();
        $cart->index();
        break;
    case 'add_to_cart':
        $cart = new c_cart();
        $cart->save_to_cart();
        break;
    case 'delete_item_from_cart':
        $cart = new c_cart();
        $cart->delete_item_from_cart();
        break;
    case 'change_quantity':
        $cart = new c_cart();
        $cart->handle_change_quantity();
        break;
    case 'create_order':
        $cart = new c_cart();
        $cart->create_order();
        break;
    case 'delete_order':
        $info = new c_info();
        $info->delete_order();
        break;
    case 'cancel_order':
        $info = new c_info();
        $info->cancel_order();
        break;
    case 'order.php':
        $order = new c_order();
        $order->index();
        break;
    case 'forget_password.php': {
            $forget_password = new c_login();
            $forget_password->forget_password();
            break;
        }
    case 'process_forget_password.php': {
            $forget_password = new c_login();
            $forget_password->forget_password();
            break;
        }
    default:
        $error404 = new c_404();
        $error404->index();
        break;
}