<?php

@session_start();

include('controllers/c_staffs.php');

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1) {
        $index = new c_staff();
        $index->get_all_staff();
    } else {
         echo "<script>window.location =' home.php'</script>";
    }
} else {
     echo "<script>window.location =' notfound.php'</script>";
}