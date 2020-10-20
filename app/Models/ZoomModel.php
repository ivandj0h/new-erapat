<?php

namespace App\Models;

use CodeIgniter\Model;

class ZoomModel extends Model
{
    protected $table = 'view_zoom_users';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;
}
