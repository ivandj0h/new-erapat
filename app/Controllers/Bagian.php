<?php

namespace App\Controllers;

use App\Models\SubDepartmentModel;

class Bagian extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        helper([
            'navbar',
            'navbar_child',
            'alerts',
            'menu',
            'form',
            'url',
            'tanggal'
        ]);
    }

    public function index()
    {
        $query = $this->conn->query("SELECT `meeting_sub_department`.`id` AS `id`,`meeting_sub_department`.`department_id` AS `department_id`,`meeting_sub_department`.`sub_department_name` AS `sub_department_name`,`meeting_department`.`department_name` AS `department_name`,`meeting_sub_department`.`is_active` AS `is_active` FROM (`meeting_sub_department` JOIN `meeting_department` on(`meeting_sub_department`.`department_id` = `meeting_department`.`id`))");


        $data = [
            'page_title' => 'E-RAPAT - Bagian',
            'nav_title' => 'bagian',
            'tabs' => 'bagian',
            'bagian' => $query->getResult()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/bagian/view_bagian', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function addbagian()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('meeting_department');
        $data = [
            'page_title' => 'E-RAPAT - Bagian',
            'nav_title' => 'bagian',
            'tabs' => 'bagian',
            'sekretariat' => $builder->get()
        ];
        $user = $this->user->where('id', session()->get('id'))->first()->role_id;
        if ($user == 1) {
            return view('cpanel/bagian/view_add_bagian', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function storebagian()
    {
        $data = [
            'department_id' => intval($this->request->getPost('depid')),
            'sub_department_name' => htmlspecialchars(strip_tags($this->request->getPost('subdepname'))),
            'is_active' => 1
        ];

        $add = $this->subdepartment->insert($data);
        if ($add) {
            session()->setFlashdata('message', 'Data bagian Berhasil di Tambah!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('bagian'));
        } else {
            session()->setFlashdata('message', 'Data bagian Gagal di Tambah!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('bagian'));
        }
    }

    public function editbagian($id = '')
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('meeting_department');
        $subdeptmodel = new SubDepartmentModel();
        $data = [
            'page_title' => 'E-RAPAT - Bagian',
            'nav_title' => 'bagian',
            'tabs' => 'bagian',
            'sekretariat' => $builder->get(),
            'bagian' => $subdeptmodel
                ->where('id', $id)
                ->first()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/bagian/view_edit_bagian', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function updatebagian()
    {
        $id  = $this->request->getPost('id');
        $data = [
            'department_id' => $this->request->getPost('depid'),
            'sub_department_name' => htmlspecialchars(strip_tags($this->request->getPost('subdepartmentname'))),
            'is_active' => $this->request->getPost('isactive'),
        ];

        // var_dump($data);
        // die;

        $updates = $this->subdepartment->update($id, $data);
        if ($updates) {
            session()->setFlashdata('message', 'Data Bagian Berhasil di Update!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('bagian'));
        } else {
            session()->setFlashdata('message', 'Data Bagian Gagal di Update!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('bagian'));
        }
    }

    public function deletebagian($id = '')
    {
        $deletes = $this->subdepartment->where('id', $id)->delete();
        if ($deletes) {
            session()->setFlashdata('message', 'Data Bagian Berhasil di Hapus!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('bagian'));
        } else {
            session()->setFlashdata('message', 'Data Bagian Gagal di Hapus!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('bagian'));
        }
    }
}
