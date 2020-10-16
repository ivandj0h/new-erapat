<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;
use App\Models\SubtypeModel;
use App\Models\RiwayatModel;

class Riwayat extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        helper(['navbar', 'navbar_child', 'alerts', 'menu', 'date', 'form']);
        $this->form_validation = \Config\Services::validation();
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
            'riwayat' => $rapatModel
                ->getWhere([
                    'user_id' => session()->get('id')
                ])
                ->getResultArray()
        ];

        return view('cpanel/riwayat/view_riwayat', $data);
    }

    public function get_riwayat()
    {
        $where = array(
            'from_date' => $this->request->getPost('from_date'),
            'to_date' => $this->request->getPost('to_date')
        );

        if ($this->form_validation->run($where, 'riwayat') == FALSE) {

            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            $rapatModel = new RapatModel();

            $data = [
                'page_title' => 'E-RAPAT - Riwayat',
                'nav_title' => 'riwayat',
                'tabs' => 'riwayat',
                'riwayat' => $rapatModel
                    ->getWhere([
                        'user_id' => session()->get('id')
                    ])
                    ->getResultArray()
            ];

            return view('cpanel/riwayat/view_riwayat', $data);
        } else {
            $riwayatModel = new RiwayatModel();
            $data = [
                'page_title' => 'E-RAPAT - Riwayat',
                'nav_title' => 'riwayat',
                'tabs' => 'riwayat',
                'riwayat' => $riwayatModel
                    ->getWhere([
                        'end_date' => $where['from_date'],
                        'end_date' => $where['to_date'],
                        'email' => session()->get('email')
                    ])->getResultArray(),
            ];

            return view('cpanel/riwayat/view_riwayat', $data);
        }
    }

    public function cekhistoffline()
    {
        $subtypemodel = new SubtypeModel();
        $rapatModel = new RapatModel();

        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'tipe' => $subtypemodel
                ->getWhere([
                    'type_id' => 2
                ])
                ->getResultArray(),
            'rapat' => $rapatModel
                ->getWhere([
                    'type_id' => 2,
                    'email' => session()->get('email')
                ])
                ->getResultArray()
        ];

        return view('cpanel/riwayat/view_offline', $data);
    }

    public function gethistoffline()
    {
        $id = $this->request->getPost('id');
        $subtypemodel = new SubtypeModel();
        $rapatModel = new RapatModel();

        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'tipe' => $subtypemodel
                ->getWhere([
                    'type_id' => 2
                ])
                ->getResultArray(),
            'rapat' => $rapatModel
                ->getWhere([
                    'sub_type_id' => $id,
                    'email' => session()->get('email')
                ])
                ->getResultArray()
        ];

        return view('cpanel/riwayat/view_offline', $data);
    }

    public function cekhistonline()
    {
        $now = date('Y-m-d');
        $subtypemodel = new SubtypeModel();
        $rapatModel = new RapatModel();

        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'tipe' => $subtypemodel
                ->getWhere([
                    'type_id' => 1
                ])
                ->getResultArray(),
            'rapat' => $rapatModel
                ->getWhere([
                    'type_id' => 1,
                    'end_date' => $now,
                    'email' => session()->get('email')
                ])
                ->getResultArray()
        ];

        return view('cpanel/riwayat/view_online', $data);
    }


    public function gethistonline()
    {
        $id = $this->request->getPost('id');
        $subtypemodel = new SubtypeModel();
        $rapatModel = new RapatModel();

        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'tipe' => $subtypemodel
                ->getWhere([
                    'type_id' => 1
                ])
                ->getResultArray(),
            'rapat' => $rapatModel
                ->getWhere([
                    'sub_type_id' => $id,
                    'email' => session()->get('email')
                ])
                ->getResultArray()
        ];

        return view('cpanel/riwayat/view_online', $data);
    }
}
