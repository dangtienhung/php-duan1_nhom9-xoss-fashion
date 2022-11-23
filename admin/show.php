<?php

@session_start();
include('controllers/c_info.php');
if (isset($_SESSION['admin_name'])) {
    $info = new c_info();
    $info->show();
} else {
    echo 'lỗi';
    
}