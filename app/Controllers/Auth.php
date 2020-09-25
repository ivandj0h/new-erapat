<?php

namespace App\Controllers;

use \CodeIgniter\Controller;


class Auth extends Controller
{
    public function index()
    {
        helper(['navbar']);
        $data = ['page_title' => 'E-RAPAT - Authentication'];

        return view('view_login', $data);
    }
}
