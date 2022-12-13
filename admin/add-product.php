<?php

include('controllers/c_product.php');

@session_start();

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 || $_SESSION['admin_role'] == 2) {
        $c_product = new c_product();
        $c_product->c_ceate_product();
    } else {
         echo "<script>window.location =' product.php'</script>";
    }
} else {
     echo "<script>window.location =' notfound.php'</script>";
}