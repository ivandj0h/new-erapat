<?php

namespace App\Controllers;

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

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/zoom/view_zoom', $data);
        } else {
            return redirect()->to(base_url('restricted'));
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
