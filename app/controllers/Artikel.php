<?php

class Artikel extends Controller
{
    public function index($id = null)
    {
        if ($id == null) {
            $data['judul'] = 'Artikel';
            $data['artikel'] = $this->model('ArtikelModel')->getAllArtikel();
            $data['kategori'] = $this->model('KategoriModel')->getAllKategoriActive();

            // $data['nama'] = $this->model('User_model')->getUser();
            $this->view('templates/page/header', $data);
            $this->view('templates/page/navbar', $data);
            $this->view('page/artikel', $data);
            $this->view('templates/page/footer', $data);
        } else {
            $data['judul'] = 'Artikel';
            $data['kategori'] = $this->model('KategoriModel')->getAllKategoriActive();

            $artikel = $this->model('ArtikelModel')->getArtikelById($id);

            if ($artikel == false) {
                header('Location: ' . BASEURL . '/kelolaartikel');
                exit;
            }
            $data['artikel'] = $artikel;
            // $data['nama'] = $this->model('User_model')->getUser();
            $this->view('templates/page/header', $data);
            $this->view('templates/page/navbar', $data);
            $this->view('page/artikel-detail', $data);
            $this->view('templates/page/footer', $data);
        }
    }
}
