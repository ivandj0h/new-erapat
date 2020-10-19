<?php

namespace App\Controllers;

class Sekretariat extends BaseController
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
        // $db      = \Config\Database::connect();
        $builder = $this->conn->table('meeting_department');

        $data = [
            'page_title' => 'E-RAPAT - Sekretariat',
            'nav_title' => 'sekretariat',
            'tabs' => 'sekretariat',
            'sekretariat' => $builder->get()
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/sekretariat/view_sekretariat', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function addsekretariat()
    {
        $data = [
            'page_title' => 'E-RAPAT - Sekretariat',
            'nav_title' => 'sekretariat',
            'tabs' => 'sekretariat',
            'account' => $this->account
                ->where('id', session()->get('id'))->first(),
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;
        if ($user == 1) {
            return view('cpanel/sekretariat/view_add_sekretariat', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function storesekretariat()
    {
        $data = [
            'department_name' => htmlspecialchars(strip_tags($this->request->getPost('sekretariat')))
        ];

        $add = $this->sekretariat->insert($data);
        if ($add) {
            session()->setFlashdata('message', 'Data Sekretariat Berhasil di Tambah!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('sekretariat'));
        } else {
            session()->setFlashdata('message', 'Data Sekretariat Gagal di Tambah!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('sekretariat'));
        }
    }

    public function editsekretariat($id = '')
    {
        $data = [
            'page_title' => 'E-RAPAT - Sekretariat',
            'nav_title' => 'sekretariat',
            'tabs' => 'sekretariat',
            'sekretariat' => $this->sekretariat
                ->getWhere(['id' => $id])
                ->getRow(),
        ];

        $user = $this->user->where('id', session()->get('id'))->first()->role_id;

        if ($user == 1) {
            return view('cpanel/sekretariat/view_edit_sekretariat', $data);
        } else {
            return redirect()->to(base_url('restricted'));
        }
    }

    public function updatesekretariat()
    {
        $id  = $this->request->getPost('id');
        $data = [
            'department_name' => htmlspecialchars(strip_tags($this->request->getPost('sekretariat')))
        ];

        $updates = $this->sekretariat->update($id, $data);
        if ($updates) {
            session()->setFlashdata('message', 'Data Sekretariat Berhasil di Update!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('sekretariat'));
        } else {
            session()->setFlashdata('message', 'Data Sekretariat Gagal di Update!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('sekretariat'));
        }
    }

    public function deletesekretariat($id = '')
    {
        $deletes = $this->sekretariat->where('id', $id)->delete();
        if ($deletes) {
            session()->setFlashdata('message', 'Data Sekretariat Berhasil di Hapus!');
            session()->setFlashdata('alert-class', 'success');

            return redirect()->to(base_url('sekretariat'));
        } else {
            session()->setFlashdata('message', 'Data Sekretariat Gagal di Hapus!');
            session()->setFlashdata('alert-class', 'alert');

            return redirect()->to(base_url('sekretariat'));
        }
    }
}
