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
        // $getSubDepartment = $this->modelConnect->find();

        // dd($getSubDepartment);
        $data = [
            'page_title' => 'E-RAPAT - Register',
            'nav_title' => 'register'
            // 'getSubDepartment' => $getSubDepartment
        ];

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

                echo 'wwkwkwkw';
            } else {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }
        }
        echo view('cpanel/auth/view_login', $data);
    }
}
