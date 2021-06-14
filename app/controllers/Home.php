<?php 

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Donasi Pohon';
        $this->view('home/index', $data);
    }
    public function error() {
        $this->view('error/404');
    }
}