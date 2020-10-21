<?php

namespace App\Models;

use CodeIgniter\Model;

class ZoomsModel extends Model
{
    protected $table = "meeting_zoom";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'user_id',
        'idzoom',
        'date_activated',
        'start_time',
        'end_time',
        'is_active',
        'status'
    ];
}
