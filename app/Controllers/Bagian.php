<?php

namespace App\Controllers;

class Bagian extends BaseController
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
                ->getRow(),
            'department' => $this->department->findAll(),
            'subdepartment' => $this->subdepartment->findAll()
        ];

        // var_dump($data);
        // die;

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/account/view_edit_account', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function addaccount()
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'account' => $this->account
                ->where('id', session()->get('id'))->first(),
            'subdepartment' => $this->subdepartment
                ->findAll()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;
        if ($user == 1) {
            return view('cpanel/account/view_add_account', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function storeaccount()
    {
        $data = [
            'token' => uniqid(),
            'zoomid' => htmlspecialchars(strip_tags($this->request->getPost('zoomid'))),
            'name'  => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'image' => 'default.png',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'roleid'  => 2,
            'active'  => 1,
            'blokir'  => 0,
            'sub_department_id'  => intval($this->request->getPost('sub_department_id')),
        ];

        $add = $this->auths->insert($data);
        if ($add) {
            session()->setFlashdata('message', 'Akun Berhasil di Tambah!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('account'));
        } else {
            session()->setFlashdata('message', 'Akun Gagal di Tambah!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('account'));
        }
    }

    public function updateaccount()
    {
        $db      = \Config\Database::connect();
        $id  = $this->request->getPost('id');
        $roleid  = $this->request->getPost('role_id');
        $token = uniqid();
        $password = password_hash('admin', PASSWORD_DEFAULT);
        $email  = $this->request->getPost('email');
        $name  = $this->request->getPost('name');
        $sub_department_id  = $this->request->getPost('sub_department_id');
        $zoomid = htmlspecialchars(strip_tags($this->request->getPost('zoomid')));

        $builder = $db->table('meeting_users');
        $builder->set('token', $token);
        $builder->set('zoomid', $zoomid);
        $builder->set('name', $name);
        $builder->set('email', $email);
        $builder->set('password', $password);
        $builder->set('role_id', $roleid);
        $builder->set('is_active', 1);
        $builder->set('sub_department_id', $sub_department_id);
        $builder->where('id', $id);
        $updates = $builder->update();

        if ($updates) {
            session()->setFlashdata('message', 'Akun Berhasil di Update!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('account'));
        } else {
            session()->setFlashdata('message', 'Akun Gagal di Update!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('account'));
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

    public function resetaccountpassword($id = '')
    {
        $password = "admin"; // $2y$10$rlSQG0XGwZnCtqv61NLKkONCAL1SUJdVeJ/95FFWOxSEeGJ9rqLwW
        $update = $this->auths
            ->set(['password' => password_hash($password, PASSWORD_DEFAULT)])
            ->where('id', $id)
            ->update();

        if ($update) {
            session()->setFlashdata('message', 'Password Berhasil di Reset!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('account'));
        } else {
            session()->setFlashdata('message', 'Password Gagal di di Reset!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('account'));
        }
    }

    public function leveluser($id = '', $roleid)
    {
        $update = $this->auths
            ->set(['role_id' => $roleid])
            ->where('id', $id)
            ->update();

        if ($update) {
            session()->setFlashdata('message', 'Level User Berhasil di Update!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('account'));
        } else {
            session()->setFlashdata('message', 'Level User Gagal di di Update!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('account'));
        }
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


    public function changeuserspassword()
    {
        $data = [
            'page_title' => 'E-RAPAT - Account',
            'nav_title' => 'account',
            'tabs' => 'account',
            'user' => $this->user->where('id', session()->get('id'))->first(),
        ];

        return view('cpanel/account/view_change_password', $data);
    }
}
