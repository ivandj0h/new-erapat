<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;
use App\Models\TypeModel;

class Rapat extends BaseController
{

    private $typeModel;

    public function __construct()
    {
        $this->session = session();
        helper(['navbar', 'alerts', 'menu', 'zoom']);
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

    public function get_media_meeting()
    {
        $id = $this->request->getPost('id_type');

        $db      = \Config\Database::connect();
        $builder = $db->table('view_sub_type');
        $result = $builder->getWhere(['type_id' => $id]);
        if (count($result->getResultArray()) > 0) {
            echo json_encode($result->getResult());
        } else {
            return false;
        }
    }

    public function get_zoomid()
    {
        $id = $this->request->getPost('id_type');

        $db      = \Config\Database::connect();
        $builder = $db->table('view_sub_type');
        $result = $builder->getWhere(['type_id' => $id]);
        if (count($result->getResultArray()) > 0) {
            echo json_encode($result->getResult());
        } else {
            return false;
        }
    }
}
