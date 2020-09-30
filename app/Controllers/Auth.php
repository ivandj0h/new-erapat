<?php

namespace App\Controllers;


class Auth extends BaseController
{
    protected $modelConnect;

    public function __construct()
    {
        helper(['form', 'navbar']);
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        $data = [
            'page_title' => 'No Direct Access',
            'nav_title' => 'forbidden'
        ];

        echo view('errors/response/view_forbidden', $data);
    }

    public function register()
    {
        $data = ['page_title' => 'E-RAPAT - Register', 'nav_title' => 'register'];
        return view('errors/response/view_unavailable', $data);
    }

    public function login()
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
