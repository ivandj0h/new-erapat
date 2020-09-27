<?php

namespace App\Controllers;

use \CodeIgniter\Controller;


class Auth extends Controller
{
    public function index()
    {
        helper(['navbar']);
        $data = ['page_title' => 'E-RAPAT - Login', 'nav_title' => 'login'];

        return view('cpanel/auth/view_login', $data);
    }

    public function register()
    {
        helper(['navbar']);
        $data = ['page_title' => 'E-RAPAT - Register', 'nav_title' => 'register'];

        return view('cpanel/auth/view_register', $data);
    }
}
