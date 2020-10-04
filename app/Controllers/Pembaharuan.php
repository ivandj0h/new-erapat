<?php

namespace App\Controllers;

use App\Models\PembaharuanModel;

class Pembaharuan extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        helper(['navbar', 'alerts', 'menu', 'date']);
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
}
