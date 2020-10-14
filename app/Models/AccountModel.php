<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'view_user_department';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'token',
        'zoomid',
        'name',
        'email',
        'image',
        'password',
        'is_active'
    ];
}
