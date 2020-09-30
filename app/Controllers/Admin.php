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
        $session = session();
        $data = ['page_title' => 'E-RAPAT - Calendar', 'nav_title' => 'calendar'];

        return view('cpanel/admin/view_admin', $data);
    }
}
