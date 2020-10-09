<?php

namespace App\Controllers;

class ErapatFormConnect extends BaseController
{
    public function __construct()
    {
        helper(['navbar', 'navbar_child']);
    }

    public function index()
    {
        $data = ['page_title' => 'E-RAPAT - Erapat Connect', 'nav_title' => 'erapatconnect'];

        if (session()->get('email')) {
            return view('cpanel/erapat/view_erapat', $data);
        } else {
            return view('errors/response/view_forbidden_user_auth', $data);
        }
    }
}
