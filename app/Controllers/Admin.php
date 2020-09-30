<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        helper(['navbar', 'alerts']);
    }
    public function index()
    {

        $data = ['page_title' => 'E-RAPAT - Admin', 'nav_title' => 'admin'];


        return view('cpanel/admin/view_admin', $data);
    }
}
