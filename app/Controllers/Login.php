<?php

namespace App\Controllers;

use App\Models\Auth_model;

class Login extends BaseController
{

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->auth = new Auth_model;
        $this->session = session();
        helper(['form', 'navbar']);
    }

    public function index()
    {
        $data = ['page_title' => 'E-RAPAT - Login', 'nav_title' => 'login', 'footer_title' => 'E-RAPAT'];
        return view('cpanel/auth/view_login', $data);
    }

    public function proses()
    {
        $data = ['page_title' => 'E-RAPAT - Login', 'nav_title' => 'login', 'footer_title' => 'E-RAPAT'];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required',
                'password' => 'required'
            ];

            $validate = $this->validate($rules);
            if ($validate) {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $userModel = new \App\Models\UserModel;
                $user = $userModel->asObject()->where('email', $email)->first();
                if ($user) {
                    if (password_verify($password, $user->password)) {
                        session()->set([
                            'id' => $user->id,
                            'fullName' => $user->name,
                            'email' => $user->email,
                            'role_id' => $user->role_id,
                            'logged_in' => true
                        ]);
                        if (session()->get('role_id') == 1) {
                            return redirect()->route('admin');
                        } else {
                            return redirect()->route('user');
                        }
                    }
                }
                return redirect()->back()->withInput()->with('error', 'Username atau Password Salah!');
            } else {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }
        }
        echo view('cpanel/auth/view_login', $data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
}
