<?php

namespace App\Models;

use CodeIgniter\Model;

class SubDepartmentModel extends Model
{
    protected $table = 'meeting_sub_department';
    protected $primaryKey = "id";
    protected $allowedFields = [
        'sub_department_name'
    ];
}
