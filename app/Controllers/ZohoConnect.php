<?php

namespace App\Controllers;

class ZohoConnect extends BaseController
{
    public function __construct()
    {
        helper(['navbar']);
    }

    public function index()
    {
        $data = ['page_title' => 'E-RAPAT - Zoho Connect', 'nav_title' => 'zohoconnect'];
        // return view('errors/response/view_unavailable', $data);
        return view('cpanel/zoho/view_zoho', $data);
    }
}
