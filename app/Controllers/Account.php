<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        helper([
            'navbar',
            'navbar_child',
            'alerts',
            'menu',
            'form',
            'url',
            'unggah',
            'tanggal'
        ]);
    }

    public function index()
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'account' => $this->account
                ->orderBy('id', 'DESC')
                ->orderBy('is_active', 'DESC')
                ->findAll(),
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/account/view_account', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function detailAccount($token = '')
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'account' => $this->account
                ->getWhere(['token' => $token])
                ->getRow()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/account/view_detail_account', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function editAccount($token = '')
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'account' => $this->account
                ->getWhere(['token' => $token])
                ->getRow()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/account/view_edit_account', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function restricted_account()
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
        ];
        return view('errors/response/view_restricted_cpanel_page', $data);
    }

    public function aktifkan($id = '')
    {
        $update = $this->auths
            ->set(['is_active' => 1])
            ->set(['blokir' => 0])
            ->where('id', $id)
            ->update();

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

    public function blokir($id = '')
    {
        $update = $this->auths
            ->set(['is_active' => 0])
            ->where('id', $id)
            ->update();

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

    public function accountaccess($token = '')
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'roles' => $this->roles
                ->orderBy('id', 'DESC')
                ->findAll(),
            'account' => $this->account
                ->getWhere(['token' => $token])
                ->getRow()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/account/view_access_account', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }
}
