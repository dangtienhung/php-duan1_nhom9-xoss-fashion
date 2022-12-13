<?php

include('controllers/c_product-storage.php');

@session_start();

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 || $_SESSION['admin_role'] == 2) {
        $c_product = new c_product_storage();
        $c_product->delete_product();
    } else {
         echo "<script>window.location =' product-storage.php'</script>";
    }
} else {
     echo "<script>window.location =' notfound.php'</script>";
}