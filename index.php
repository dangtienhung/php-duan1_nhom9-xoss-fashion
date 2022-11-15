<?php
    $url = isset($_GET["url"]) ? $_GET["url"] : "/";
    include 'controllers/c_home.php';
    include 'controllers/c_detail_product.php';
    include 'controllers/c_product.php';
    include 'controllers/c_login.php';
    include 'controllers/c_register.php';

    switch($url) {
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
            $login-> index();
            break;
        case 'check_login.php':
            $check_login = new c_login();
            $check_login -> check_login();
            break;
        case 'logout.php':
            $logout = new c_login();
            $logout -> logOut();
            break;
        case 'register.php':
            $register = new c_register();
            $register -> index();
            break;
        case 'check_register.php':
            $register = new c_register();
            $register -> check_register();
            break;
        default:
        //In ra layout trang chủ không tồn tại (404)
    }