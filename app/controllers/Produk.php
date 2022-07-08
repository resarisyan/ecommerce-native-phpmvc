<?php

class Produk extends Controller
{
    public function index($id = null)
    {
        if ($id != null) {
            $data['judul'] = 'Detail Produk';
            $data['produk'] = $this->model('ProdukModel')->getProdukById($id);
            if ($data['produk'] == false) {
                header('Location: ' . BASEURL);
                exit;
            }
            $data['related'] = $this->model('ProdukModel')->getAllProdukByKategori($data['produk']['id_kategori']);
            $data['kategori'] = $this->model('KategoriModel')->getAllKategoriActive();
            $this->view('templates/page/header', $data);
            $this->view('templates/page/navbar', $data);
            $this->view('page/detailproduk', $data);
            $this->view('templates/page/footer', $data);
        } else {
            header('Location: ' . BASEURL);
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Cari Produk';
        $data['produk'] = $this->model('ProdukModel')->cariProduk();
        $data['kategori'] = $this->model('KategoriModel')->getAllKategoriActive();

        $this->view('templates/page/header', $data);
        $this->view('templates/page/navbar', $data);
        $this->view('page/cariproduk', $data);
        $this->view('templates/page/footer', $data);
    }
}
