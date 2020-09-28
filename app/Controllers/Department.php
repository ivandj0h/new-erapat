<?php

namespace App\Controllers;

use App\Models\DepartmentModel;

class Department extends BaseController
{
    public function index()
    {
        $users = new DepartmentModel();
        $data = $users->getDepartment();
        return view('user', compact('data'));
    }

    public function addDepartment()
    {
        print_r('wwkwkwk');
    }
}
