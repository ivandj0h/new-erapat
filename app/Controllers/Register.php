<?php

namespace App\Controllers;


class Register extends BaseController
{
    protected $modelConnect;

    public function __construct()
    {
        helper(['form', 'navbar', 'navbar_child']);
    }

    public function index()
    {
        $data = ['page_title' => 'E-RAPAT - Register', 'nav_title' => 'register'];
        return view('errors/response/view_not_implemented', $data);
    }
}
