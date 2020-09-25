<?php

namespace App\Controllers;

class Authentication extends BaseController
{
    public function index()
    {
        $data = ['page_title' => 'E-RAPAT - Authentication'];
        return view('cpanel/auth/view_login', $data);
    }
}
