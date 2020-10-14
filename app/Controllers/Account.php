<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\UserModel;

class Account extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        $this->validation = \Config\Services::validation();
        helper(['navbar', 'navbar_child', 'alerts', 'menu', 'form', 'url', 'unggah']);
    }

    public function index()
    {
        $account = new AccountModel();
        $userModel = new UserModel();
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'account' => $account
                ->orderBy('id', 'DESC')
                ->getResultArray(),
            'user' => $userModel->where('id', session()->get('id'))->first(),
        ];

        return view('cpanel/account/view_account', $data);
    }
}
