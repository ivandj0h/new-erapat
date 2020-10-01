<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        helper(['navbar', 'alerts', 'menu']);
    }

    public function index()
    {

        /**
         * model initialize
         */
        $userModel = new UserModel();

        $data['page_title'] = 'E-RAPAT - User';
        $data['nav_title'] = 'user';
        $data['tabs'] = 'user';
        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        // var_dump($data['user']);
        // die;
        return view('cpanel/user/view_user', $data);
    }
}
