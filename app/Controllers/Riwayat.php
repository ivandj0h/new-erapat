<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SubtypeModel;

class Riwayat extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        $this->form_validation = \Config\Services::validation();
        helper([
            'navbar',
            'navbar_child',
            'alerts',
            'menu',
            'date',
            'form',
            'tanggal'
        ]);
    }

    public function index()
    {
        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'user' => $this->user,
            'riwayat' =>  $this->rapatonoff
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

            $data = [
                'page_title' => 'E-RAPAT - Riwayat',
                'nav_title' => 'riwayat',
                'tabs' => 'riwayat',
                'riwayat' => $this->rapatonoff
                    ->getWhere([
                        'user_id' => session()->get('id')
                    ])
                    ->getResultArray()
            ];

            return view('cpanel/riwayat/view_riwayat', $data);
        } else {
            $data = [
                'page_title' => 'E-RAPAT - Riwayat',
                'nav_title' => 'riwayat',
                'tabs' => 'riwayat',
                'riwayat' => $this->rapatonoff
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

        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'tipe' => $subtypemodel
                ->getWhere([
                    'type_id' => 2
                ])
                ->getResultArray(),
            'rapat' => $this->rapatonoff
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

        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'tipe' => $subtypemodel
                ->getWhere([
                    'type_id' => 2
                ])
                ->getResultArray(),
            'rapat' => $this->rapatonoff
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

        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'tipe' => $subtypemodel
                ->getWhere([
                    'type_id' => 1
                ])
                ->getResultArray(),
            'rapat' => $this->rapatonoff
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

        $data = [
            'page_title' => 'E-RAPAT - Riwayat',
            'nav_title' => 'riwayat',
            'tabs' => 'riwayat',
            'tipe' => $subtypemodel
                ->getWhere([
                    'type_id' => 1
                ])
                ->getResultArray(),
            'rapat' => $this->rapatonoff
                ->getWhere([
                    'sub_type_id' => $id,
                    'email' => session()->get('email')
                ])
                ->getResultArray()
        ];

        return view('cpanel/riwayat/view_online', $data);
    }
}
