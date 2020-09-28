<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'meeting_users';

    public function getUsers()
    {
        return $this->findAll();
    }
}
