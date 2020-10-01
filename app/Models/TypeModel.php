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

    public function get_byid_type($id)
    {
        $this->where('type_id', $id);
        // $this->db->get('view_sub_type');
    }
}
