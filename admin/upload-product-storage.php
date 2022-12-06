<?php
    include('controllers/c_product-storage.php');

    @session_start();
    
    if (isset($_SESSION['admin_id'])) {
        if ($_SESSION['admin_role'] == 1 || $_SESSION['admin_role'] == 2) {
            $upload = new c_product_storage();
            $upload->upload_product();
        } else {
            header('location: index.php');
        }
    } else {
        header('location: notfound.php');
    }
?>