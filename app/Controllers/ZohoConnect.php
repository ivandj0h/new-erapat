<?php

namespace App\Controllers;

class ZohoConnect extends BaseController
{
    public function __construct()
    {
        helper(['navbar', 'navbar_child']);
    }

    public function index()
    {
        $data = ['page_title' => 'E-RAPAT - Zoho Connect', 'nav_title' => 'zohoconnect'];

        if (session()->get('email')) {
            return view('cpanel/zoho/view_zoho', $data);
        } else {
            return view('errors/response/view_forbidden_user_auth', $data);
        }
    }

    public function zohoforms()
    {
        $data = ['page_title' => 'E-RAPAT - Zoho Connect', 'nav_title' => 'zohoconnect'];

        if (session()->get('email')) {
            return view('cpanel/zoho/view_zoho_forms', $data);
        } else {
            return view('errors/response/view_forbidden_user_auth', $data);
        }
    }

    public function zohoreports()
    {
        $data = ['page_title' => 'E-RAPAT - Zoho Connect', 'nav_title' => 'zohoconnect'];

        if (session()->get('email')) {
            return view('cpanel/zoho/view_zoho_reports', $data);
        } else {
            return view('errors/response/view_forbidden_user_auth', $data);
        }
    }
}
