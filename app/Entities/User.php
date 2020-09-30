<?php

namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity
{
    public function setPassword(string $passwords)
    {
        // $salt = uniqid('', true);
        // $this->attributes['salt'] = $salt;
        // $this->attributes['password'] = md5($salt . $pass);

        $this->attributes['password'] = password_hash($passwords, PASSWORD_DEFAULT);

        return $this;
    }
}
