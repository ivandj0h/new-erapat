<?php

namespace App\Controllers;


class Cetak extends BaseController
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
            'page_title' => 'E-RAPAT - Cetak',
            'nav_title' => 'cetak',
            'tabs' => 'cetak',
            'user' => $this->user,
            'riwayat' =>  $this->rapatonoff
                ->getWhere([
                    'user_id' => session()->get('id')
                ])
                ->getResultArray()
        ];

        return view('cpanel/cetak/view_cetak', $data);
    }
}
