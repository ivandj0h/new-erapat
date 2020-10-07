<?php

namespace App\Models;

use CodeIgniter\Model;

class RapatAddModel extends Model
{
    protected $table = "meeting";
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'other_online_id',
        'zoom_id',
        'sub_type_id',
        'speakers_name',
        'members_name',
        'files_upload',
        'files_upload1',
        'files_upload2',
        'unique_code',
        'agenda',
        'date_requested',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'request_status',
        'remark_status',
        'meeting_status'
    ];
}
