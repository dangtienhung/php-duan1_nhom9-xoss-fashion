<?php

class c_cart
{
    public function index()
    {
        include('models/m_cart.php');

        $view = 'views/cart/v_cart.php';
        include('templates/client/layout.php');
    }
}