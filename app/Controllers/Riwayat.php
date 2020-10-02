<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;
use App\Models\TypeModel;

class Riwayat extends BaseController
{

    private $typeModel;

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
            'tabs' => 'riwayat',
            'user' => $userModel,
            'rapat' => $rapatModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('cpanel/riwayat/view_riwayat', $data);
    }
}
