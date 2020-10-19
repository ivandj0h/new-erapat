<?php

namespace App\Models;

use CodeIgniter\Model;

class SekretariatModel extends Model
{
    protected $table = 'meeting_department';
    protected $primaryKey = "id";
    protected $allowedFields = [
        'department_name'
    ];
}
