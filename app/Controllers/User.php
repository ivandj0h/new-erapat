<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RapatModel;

class User extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        $this->validation = \Config\Services::validation();
        helper(['navbar', 'navbar_child', 'alerts', 'menu', 'form', 'url', 'unggah']);
    }

    public function index()
    {
        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - User',
            'nav_title' => 'user',
            'tabs' => 'user',
            'user' => $userModel->where('id', session()->get('id'))->first(),
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getRow()
        ];

        // var_dump($data['rapat']);
        // die;

        return view('cpanel/user/view_user', $data);
    }

    public function changepassword()
    {
        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - User',
            'nav_title' => 'user',
            'tabs' => 'user',
            'user' => $userModel->where('id', session()->get('id'))->first(),
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
        ];

        return view('cpanel/user/view_change_password', $data);
    }

    public function edituser($code = '')
    {
        $userModel = new UserModel();
        $rapatModel = new RapatModel();
        $data = [
            'page_title' => 'E-RAPAT - User',
            'nav_title' => 'user',
            'tabs' => 'user',
            'user' => $userModel->where('id', session()->get('id'))->first(),
            'rapat' => $rapatModel
                ->getWhere(['user_id' => session()->get('id')])
                ->getResultArray()
        ];

        return view('cpanel/user/view_edit_user', $data);
    }

    public function updateuser()
    {
        $userModel = new UserModel();

        $email  = $this->request->getPost('email');
        $zoomid = htmlspecialchars(strip_tags($this->request->getPost('zoomid')));

        if ($this->request->getMethod() == 'post') {

            $data = [
                'email' => $email,
                'zoomid' => $zoomid
            ];

            if ($userModel->update($this->request->getPost('id'), $data)) {
                session()->setFlashdata('message', 'Profile User Berhasil di Ubah!');
                session()->setFlashdata('alert-class', 'success');

                return redirect()->to(base_url('user'));
            } else {
                session()->setFlashdata('message', 'Profile User Gagal disimpan!');
                session()->setFlashdata('alert-class', 'alert');

                return redirect()->route('edit')->withInput();
            }
        }
    }

    public function updatepassword()
    {

        if ($this->request->getMethod() == 'post') {

            $pwd = $this->request->getPost('pass1');
            $password = password_hash($pwd, PASSWORD_DEFAULT);

            $data = ['password' => $password];

            $db      = \Config\Database::connect();
            $builder = $db->table('meeting_users');

            $builder->set('password', $data['password']);
            $builder->where('id', session()->get('id'));
            $updates = $builder->update();

            if ($updates) {
                session()->setFlashdata('message', 'Kata Sandi Berhasil di Ubah!');
                session()->setFlashdata('alert-class', 'success');

                return redirect()->to(base_url('user'));
            } else {
                session()->setFlashdata('message', 'Kata Sandi Gagal disimpan!');
                session()->setFlashdata('alert-class', 'alert');

                return redirect()->route('changepassword')->withInput();
            }
        }
    }
}
