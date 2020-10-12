<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;

class User extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        helper(['navbar', 'navbar_child', 'alerts', 'menu']);
    }

    public function index()
    {
        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - User',
            'nav_title' => 'user',
            'tabs' => 'user',
            'user' => $userModel->where('id', session()->get('id'))->first(),
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
        ];

        return view('cpanel/user/view_user', $data);
    }

    public function changepassword()
    {
        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - User',
            'nav_title' => 'user',
            'tabs' => 'user',
            'user' => $userModel->where('id', session()->get('id'))->first(),
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
        ];

        return view('cpanel/user/view_change_password', $data);
    }

    public function edituser($code = '')
    {
        echo $code;
    }
}
