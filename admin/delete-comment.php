<?php

@session_start();

include('controllers/c_comments.php');

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 || $_SESSION['admin_role'] == 2) {
        $index = new c_comments();
        $index->get_one_comments();
    } else {
        header('location: index.php');
    }
} else {
    header('location: notfound.php');
}