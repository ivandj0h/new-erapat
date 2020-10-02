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

        $builder = $this->db->table('view_sub_type');
        $builder->select('*');
        $result = $builder->get();
        if (count($result->getResultArray()) > 0) {
            return $result->getResult();
        } else {
            return false;
        }
    }
}
