<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
// use App\Models\DepartmentModel;

class Auth extends Controller
{
    protected $modelConnect;

    public function __construct()
    {
        // $this->modelConnect = new DepartmentModel();
        helper(['form', 'navbar']);
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
                            'fullName' => $user->name . ' ' . $user->name,
                            'email' => $user->email,
                            'logged_in' => true
                        ]);
                        return redirect()->route('admin');
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
        session()->destroy();
        return redirect('/');
    }
}
