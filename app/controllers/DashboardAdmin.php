<?php

class DashboardAdmin extends Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['produk'] = $this->model('ProdukModel')->getJumlahProduk();
        $data['pelanggan'] = $this->model('PelangganModel')->getJumlahPelanggan();
        $data['pemesanan'] = $this->model('PemesananModel')->getJumlahPemesanan();
        $data['artikel'] = $this->model('ArtikelModel')->getJumlahArtikel();
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/navbar', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/dashboard', $data);
        $this->view('templates/admin/footer', $data);
    }
}
