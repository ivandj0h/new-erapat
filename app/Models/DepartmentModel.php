<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'view_sub_department';

    public function getDepartment()
    {
        return $this->findAll();
    }

    public function getSubDepartmentWithoutAdmin()
    {
        return $this->select('*')->from($this->table)->where('sub_department_name !=', 1);
    }
}
