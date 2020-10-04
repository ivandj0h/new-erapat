<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;

class Riwayat extends BaseController
{

    private $typeModel;

    public function __construct()
    {
        $this->session = session();
        helper(['navbar', 'alerts', 'menu', 'date']);
    }

    public function index()
    {

        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'user' => $userModel,
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
        ];

        return view('cpanel/riwayat/view_riwayat', $data);
    }
}
