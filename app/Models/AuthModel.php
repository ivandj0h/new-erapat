<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = "meeting_users";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'token',
        'zoomid',
        'name',
        'email',
        'image',
        'password',
        'role_id',
        'is_active',
        'blokir',
        'sub_department_id'
    ];
}
