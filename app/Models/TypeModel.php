<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeModel extends Model
{
    protected $table = 'meeting_type';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;

    public function gettypes()
    {
        return $this->findAll();
    }
}
