<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;

class Rapat extends BaseController
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
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - Calendar',
            'nav_title' => 'calendar',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $rapatModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('cpanel/rapat/view_rapat', $data);
    }
}
