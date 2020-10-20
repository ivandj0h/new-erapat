<?php

namespace App\Controllers;

use App\Models\ZoomModel;

class Zoom extends BaseController
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
        $query = $this->conn->query("SELECT
        meeting_zoom.id, 
        meeting_zoom.user_id, 
        meeting_users.token, 
        meeting_zoom.idzoom, 
        meeting_users.`name` AS pemilik_zoom, 
        meeting_zoom.date_activated, 
        meeting_zoom.start_time, 
        meeting_zoom.end_time, 
        meeting_zoom.is_active, 
        meeting_zoom.`status`
    FROM
        meeting_zoom
        INNER JOIN
        meeting_users
        ON 
            meeting_zoom.user_id = meeting_users.id ");

        $data = [
            'page_title' => 'E-RAPAT - Zoom',
            'nav_title' => 'zoom',
            'tabs' => 'zoom',
            'zoom' => $query->getResult()
        ];

        // var_dump($data);
        // die;

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/zoom/view_zoom', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function addzoom()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('meeting_department');
        $data = [
            'page_title' => 'E-RAPAT - Zoom',
            'nav_title' => 'zoom',
            'tabs' => 'zoom',
            'sekretariat' => $builder->get()
        ];
        $user = $this->user->where('id', session()->get('id'))->first()->role_id;
        if ($user == 1) {
            return view('cpanel/zoom/view_add_zoom', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function storezoom()
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

            return redirect()->to(base_url('zoom'));
        } else {
            session()->setFlashdata('message', 'Data Zoom Gagal di Tambah!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('zoom'));
        }
    }

    public function editzoom($token = '')
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('meeting_users');
        $zoomModel = new ZoomModel();
        $data = [
            'page_title' => 'E-RAPAT - Zoom',
            'nav_title' => 'zoom',
            'tabs' => 'zoom',
            'user' => $builder->get(),
            'zoom' => $zoomModel
                ->where('token', $token)
                ->first()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/zoom/view_edit_zoom', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function updatezoom()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('meeting_zoom');
        $builder->set('user_id', $this->request->getPost('userid'));
        $builder->set('pemakai_id', 0);
        $builder->set('idzoom', htmlspecialchars(strip_tags($this->request->getPost('zoomname'))));
        $builder->set('date_activated', date('Y-m-d'));
        $builder->set('start_time', date("H:i:s"));
        $builder->set('end_time', date("H:i:s"));
        $builder->set('is_active', intval($this->request->getPost('isactive')));
        $builder->set('status', $this->request->getPost('st'));
        $builder->where('id', $this->request->getPost('id'));
        $updates = $builder->update();

        $db      = \Config\Database::connect();
        $build = $db->table('meeting_users');
        $build->set('zoomid', htmlspecialchars(strip_tags($this->request->getPost('zoomname'))));
        $build->where('token', $this->request->getPost('token'));
        $build->update();

        if ($updates) {

            session()->setFlashdata('message', 'Data Zoom Berhasil di Update!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('zoom'));
        } else {
            session()->setFlashdata('message', 'Data Zoom Gagal di Update!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('zoom'));
        }
    }

    public function Online($id = '')
    {
        $update = $this->zommz
            ->set(['status' => 1])
            ->where('id', $id)
            ->update();

        if ($update) {
            session()->setFlashdata('message', 'Status Zoom ID Berhasil di Aktifkan!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('zoom'));
        } else {
            session()->setFlashdata('message', 'Status Zoom ID Berhasil di Non Aktifkan!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('zoom'));
        }
    }

    public function Offline($id = '')
    {
        $update = $this->zommz
            ->set(['status' => 0])
            ->where('id', $id)
            ->update();

        if ($update) {
            session()->setFlashdata('message', 'Status Zoom ID Berhasil di Aktifkan!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('zoom'));
        } else {
            session()->setFlashdata('message', 'Status Zoom ID Berhasil di Non Aktifkan!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('zoom'));
        }
    }
}
