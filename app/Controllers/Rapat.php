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
        helper(['navbar', 'alerts', 'menu', 'zoom', 'form', 'date']);
        $this->form_validation = \Config\Services::validation();
    }

    public function index()
    {

        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - Rapat',
            'nav_title' => 'rapat',
            'tabs' => 'rapat',
            'user' => $userModel,
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
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

        return view('cpanel/rapat/view_rapat_baru', $data);
    }

    public function store()
    {
        if ($this->request->getMethod() == 'post') {
            // Validation
            $data = array(
                // 'error'   => true,
                // 'agenda_error' => form_error('agenda'),
                // 'start_date_error' => form_error('start_date'),
                // 'participants_name_error' => form_error('participants_name'),
                // 'start_time_error' => form_error('start_time'),
                // 'end_time_error' => form_error('end_time')
            );
        }

        var_dump($data);
        die;
    }

    public function detail($code = '')
    {
        $db   = \Config\Database::connect();
        $builder = $db->table('view_user_meeting');
        $result = $builder->getWhere(['unique_code' => $code]);

        // var_dump($result->getResultArray());
        // die;
        $data = [
            'page_title' => 'E-RAPAT - Detail',
            'nav_title' => 'detail',
            'tabs' => 'rapat',
            'rapat' => $result->getRow()
        ];

        return view('cpanel/rapat/view_rapat_detail', $data);
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
