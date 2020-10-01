<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;
use App\Models\TypeModel;

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

    public function baru()
    {
        $typeModel = new TypeModel();
        $data = [
            'page_title' => 'E-RAPAT - Calendar',
            'nav_title' => 'calendar',
            'tabs' => 'rapat',
            'alltype' => $typeModel->orderBy('id', 'DESC')->findAll()
        ];

        // var_dump($data['alltype']);
        // die;
        return view('cpanel/rapat/view_rapat_baru', $data);
    }

    function get_media_meeting()
    {
        $typeModel = new TypeModel();
        $id_type = $this->request->getPost('id_type');
        // var_dump($id_type);
        // die;
        $data = $typeModel->get_byid_type($id_type);
        echo json_encode($data);
    }
}
