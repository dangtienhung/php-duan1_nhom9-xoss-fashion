<?php

@session_start();
include('controllers/c_customers.php');
if (isset($_SESSION['id'])) {
    
} else {
    echo 'lỗi';
    $customer = new c_customers();
    $customer->index();
}