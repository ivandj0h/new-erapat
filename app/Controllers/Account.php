<?php

namespace App\Controllers;

use App\Models\AccountModel;

class Account extends BaseController
{

    protected $aktifkan;

    public function __construct()
    {
        $this->aktifkan = new AccountModel();
        $this->validation = \Config\Services::validation();
        helper(['navbar', 'navbar_child', 'alerts', 'menu', 'form', 'url', 'unggah']);
    }

    public function index()
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'account' => $this->aktifkan
                ->orderBy('id', 'DESC')
                ->findAll(),
            'user' => $this->user->where('id', session()->get('id'))->first(),
        ];

        return view('cpanel/account/view_account', $data);
    }

    function aktifkan($id = '')
    {
        $update = $this->aktifkan->update($id, ['is_active' => 1]);

        if ($update) {
            session()->setFlashdata('message', 'Akun Berhasil di Aktifkan!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('account'));
        } else {
            session()->setFlashdata('message', 'Akun Berhasil di Blokir!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('account'));
        }
    }

    function blokir($id = '')
    {
        $update = $this->aktifkan->update($id, ['is_active' => 0]);

        if ($update) {
            session()->setFlashdata('message', 'Akun Berhasil di Aktifkan!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('account'));
        } else {
            session()->setFlashdata('message', 'Akun Berhasil di Blokir!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('account'));
        }
    }
}
