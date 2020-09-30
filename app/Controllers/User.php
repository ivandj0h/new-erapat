<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        helper(['navbar']);
        $this->session->set('view_data', 'Hi there I am from the session');

        $data = [
            'email' => $this->session,
            'page_title' => 'E-RAPAT - Calendar',
            'nav_title' => 'calendar'
        ];

        // dd($data['email']);
        return view('cpanel/user/view_user', $data);
    }
}
