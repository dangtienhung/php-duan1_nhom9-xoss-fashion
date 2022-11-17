<?php

include('controllers/c_home.php');

@session_start();

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 || $_SESSION['admin_role'] == 2) {
        $index = new c_home();
        $index->show();
    } else {
        header('location: index.php');
    }
} else {
    header('location: notfound.php');
}