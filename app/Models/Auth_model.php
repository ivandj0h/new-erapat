<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model
{

    protected $table = "view_user_department";
    protected $primaryKey = "id";

    public function getLogin($email, $password)
    {
        return $this->findAll();
    }
}
