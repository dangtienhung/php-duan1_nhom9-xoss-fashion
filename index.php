<?php
    $url = isset($_GET["url"]) ? $_GET["url"] : "/";
    print($url);
    die;
    include 'controllers/c_home.php';
    include 'controllers/c_detail_product.php';
    
    switch($url) {
        case '/':
        case 'home':
            $index = new c_home();
            $index->index();
            break;
        case 'detail.php':
            $detail = new c_detail();
            $deatil->index();
            break;
        default:
        //In ra layout ko tìm thấy trang chủ
    }