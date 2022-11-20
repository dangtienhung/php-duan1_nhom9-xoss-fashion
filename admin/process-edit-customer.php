<?php

@session_start();
include('controllers/c_customers.php');
    $customer = new c_customers();
    $customer->handle_edit_customer();
