<?php

namespace App\Models;

use CodeIgniter\Model;

class ZoomsModel extends Model
{
    protected $table = "meeting_zoom";
    protected $primaryKey = "id";
    protected $allowedFields = ['status'];
}
