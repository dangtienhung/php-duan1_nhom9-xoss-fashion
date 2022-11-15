<?php
    $url = isset($_GET["url"]) ? $_GET["url"] : "/";
    include 'controllers/c_home.php';
    include 'controllers/c_detail_product.php';
    include 'controllers/c_product.php';

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
        default:
        //In ra layout ko tìm thấy trang chủ
    }