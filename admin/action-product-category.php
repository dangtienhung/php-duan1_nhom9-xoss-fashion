<?php

include('controllers/c_product-categories.php');

@session_start();
if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 || $_SESSION['admin_role'] == 2) {
        $index = new c_product_categories();
        $index->add_product_category();
    } else {
        header('location: index.php');
    }
} else {
    header('location: notfound.php');
}