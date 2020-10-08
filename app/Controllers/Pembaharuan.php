<?php

namespace App\Controllers;

use App\Models\PembaharuanModel;
use App\Models\TypeModel;
use App\Models\SubtypeModel;
use App\Models\RapatModel;

class Pembaharuan extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        helper(['navbar', 'navbar_child', 'alerts', 'menu', 'date', 'form']);
        $this->form_validation = \Config\Services::validation();
    }

    public function index()
    {

        $now = date('Y-m-d');

        $db      = \Config\Database::connect();
        $builder = $db->table('view_user_meeting');
        $result = $builder->where(['end_date' => $now])->get();

        $data = [
            'page_title' => 'E-RAPAT - Pembaharuan',
            'nav_title' => 'pembaharuan',
            'tabs' => 'pembaharuan',
            'rapat' => $result->getResultArray()
        ];

        return view('cpanel/pembaharuan/view_pembaharuan', $data);
    }

    public function cekzoom()
    {

        $now = date('Y-m-d');
        $typeId = 1;

        $db      = \Config\Database::connect();
        $builder = $db->table('view_zoom_meeting');
        $builder->where('DATE(date_activated)', $now);
        $builder->where('type_id', $typeId);
        $result = $builder->get();

        $data = [
            'page_title' => 'E-RAPAT - Pembaharuan',
            'nav_title' => 'pembaharuan',
            'tabs' => 'pembaharuan',
            'zoom' => $result->getResultArray()
        ];

        // var_dump($data['zoom']);
        // die;
        return view('cpanel/pembaharuan/view_cekzoom', $data);
    }

    public function cekoffline()
    {
        $now = date('Y-m-d');
        $subtypemodel = new SubtypeModel();
        $rapatModel = new RapatModel();

        // $db      = \Config\Database::connect();
        // $builder = $db->table('view_user_meeting');
        // $result = $builder->where(['end_date' => $now])->get();

        $data = [
            'page_title' => 'E-RAPAT - Pembaharuan',
            'nav_title' => 'pembaharuan',
            'tabs' => 'pembaharuan',
            'tipe' => $subtypemodel
                ->getWhere([
                    'type_id' => 2
                ])
                ->getResultArray(),
            'rapat' => $rapatModel
                ->getWhere([
                    'type_id' => 2,
                    'end_date' => $now,
                    'email' => session()->get('email')
                ])
                ->getResultArray()
        ];

        // var_dump($data['rapat']);
        // die;
        return view('cpanel/pembaharuan/view_cekoffline', $data);
    }

    public function rapatoffline()
    {
        $typemodel = new TypeModel();
        $where = ['sub_type_id' => $this->request->getPost('sub_type_id')];

        if ($this->form_validation->run($where, 'rapat_offline') == FALSE) {

            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            $rapatModel = new RapatModel();

            $data = [
                'page_title' => 'E-RAPAT - Riwayat',
                'nav_title' => 'riwayat',
                'tabs' => 'riwayat',
                'tipe' => $typemodel,
                'riwayat' => $rapatModel
                    ->getWhere([
                        'type_id' => 2,
                        'email' => session()->get('email')
                    ])
                    ->getResultArray()
            ];

            return view('cpanel/pembaharuan/view_cekoffline', $data);
        }
    }
}
