<?php
    session_start();
    include('controllers/c_customers.php');
    $customer = new c_customers();
    $customer->edit_customer();
