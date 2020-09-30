<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }
    public function index()
    {
        helper(['navbar']);

        $data = ['page_title' => 'E-RAPAT - Admin', 'nav_title' => 'admin'];


        return view('cpanel/admin/view_admin', $data);
    }
}
