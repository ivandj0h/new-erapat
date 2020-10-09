<?php

namespace App\Models;

use CodeIgniter\Model;

class SubtypeModel extends Model
{
    protected $table = 'view_sub_type';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;

    public function get_sub_type()
    {
        return $this->findAll();
    }
}
