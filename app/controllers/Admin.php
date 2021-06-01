<?php


class Admin extends Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard Admin';
        $this->view('admin/index', $data);
    }

    public function all_events()
    {
        $data['judul'] = 'Semua Event';
        $this->view('admin/all_events', $data);
    }

    public function add_event() {
        $data['judul'] = 'Tambah Event Baru';
        $this->view('admin/add_event', $data);
    }
}