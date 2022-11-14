<?php

class c_home
{
    public function index()
    {
        include('models/');
        $view = 'views/home/v_home.php';
        include('templates/client/layout.php');
    }
}