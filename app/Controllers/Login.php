<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        helper(['form', 'navbar', 'navbar_child', 'proses']);
    }

    public function index()
    {
        if (session()->get('role_id') == 1) {
            return redirect()->route('admin');
        } elseif (session()->get('role_id') == 2) {
            return redirect()->route('user');
        } else {
            $data = ['page_title' => 'E-RAPAT - Login', 'nav_title' => 'login', 'footer_title' => 'E-RAPAT'];
            return view('cpanel/auth/view_login', $data);
        }
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
                $user = $this->user->asObject()->where('email', $email)->first();

                if ($user) {
                    if ($user->is_active == 1) {
                        if (password_verify($password, $user->password)) {
                            session()->set([
                                'id' => $user->id,
                                'fullName' => $user->name,
                                'email' => $user->email,
                                'role_id' => $user->role_id,
                                'logged_in' => true,
                                'is_active' => 1
                            ]);
                            if (session()->get('role_id') == 1) {
                                return redirect()->route('admin');
                            } else {
                                return redirect()->route('user');
                            }
                        } else {
                            $no = $user->blokir;
                            $this->auths
                                ->set(['blokir' => $no += 1])
                                ->where('id', $user->id)
                                ->update();

                            if ($no == 2) {
                                $this->auths
                                    ->set(['is_active' => 0])
                                    ->where('id', $user->id)
                                    ->update();
                            }
                            return redirect()->back()->withInput()->with('error', 'Password Salah!');
                        }
                    } else {
                        return redirect()->back()->withInput()->with('error', 'Maaf, Akun Anda Telah di Blokir! <br /> hubungi <strong>Administrator</strong>');
                    }
                }
            } else {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }
        }
        echo view('cpanel/auth/view_login', $data);
    }


    public function cek()
    {
        $data = ['page_title' => 'E-RAPAT - Cek', 'nav_title' => 'cek', 'footer_title' => 'E-RAPAT'];
        echo view('cpanel/auth/view_cek', $data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
}
