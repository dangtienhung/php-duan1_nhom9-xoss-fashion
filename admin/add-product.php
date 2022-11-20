<?php

include('controllers/c_product.php');

@session_start();

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 || $_SESSION['admin_role'] == 2) {
        $c_product = new c_product();
        $c_product->c_ceate_product();
    } else {
        header('location: product.php');
    }
} else {
    header('location: notfound.php');
}