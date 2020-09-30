<?php

namespace App\Controllers;

class User extends BaseController
{

    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        helper(['navbar']);
        $data = ['page_title' => 'E-RAPAT - User', 'nav_title' => 'user'];


    }
}
