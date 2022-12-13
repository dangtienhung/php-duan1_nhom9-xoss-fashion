<?php

include('controllers/c_staffs.php');

@session_start();

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1) {
        $index = new c_staff();
        $index->update_staff();
    } else {
         echo "<script>window.location =' index.php'</script>";
    }
} else {
     echo "<script>window.location =' notfound.php'</script>";
}