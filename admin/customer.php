<?php

@session_start();
include('controllers/c_customers.php');
if (isset($_SESSION['admin_id'])) {
    $customer = new c_customers();
    $customer->index();
} else {
    header('location : index.php');
    
}
