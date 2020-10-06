<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        helper(['navbar', 'navbar_child', 'alerts']);
    }
    public function index()
    {

        $data = ['page_title' => 'E-RAPAT - Admin', 'nav_title' => 'admin'];


        return view('cpanel/admin/view_admin', $data);
    }
}
