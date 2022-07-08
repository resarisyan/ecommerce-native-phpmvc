<?php

class Kategori extends Controller
{
    public function index($id = null)
    {
        if ($id != null) {
            $data['judul'] = 'Kategori';
            $data['namaKategori'] = $this->model('KategoriModel')->getKategoriById($id);
            if ($data['namaKategori'] == false) {
                header('Location: ' . BASEURL);
                exit;
            }
            $data['produk'] = $this->model('ProdukModel')->getAllProdukByKategori($id);
            $data['kategori'] = $this->model('KategoriModel')->getAllKategoriActive();
            $this->view('templates/page/header', $data);
            $this->view('templates/page/navbar', $data);
            $this->view('page/kategori', $data);
            $this->view('templates/page/footer', $data);
        } else {
            header('Location: ' . BASEURL);
            exit;
        }
    }
}
