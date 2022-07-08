<?php

class About extends Controller
{
    public function index()
    {
        $data['judul'] = 'About';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategoriActive();

        $this->view('templates/page/header', $data);
        $this->view('templates/page/navbar', $data);
        $this->view('page/about', $data);
        $this->view('templates/page/footer', $data);
    }
}
