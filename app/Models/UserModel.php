<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'view_user_department';

    public function getUsers()
    {
        return $this->findAll();
    }
}
