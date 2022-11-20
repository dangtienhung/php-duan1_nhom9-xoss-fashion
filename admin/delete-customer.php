<?php

@session_start();

include('controllers/c_customers.php');


    $delete_customer = new c_customers();
    $delete_customer->delete_customer();
