<?php

include('controllers/c_info.php');

@session_start();

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 || $_SESSION['admin_role'] == 2 ) {
        $info = new c_info();
        $info -> change_password();
    } else {
        header('location: index.php');
    }
} else {
    header('location: notfound.php');
}