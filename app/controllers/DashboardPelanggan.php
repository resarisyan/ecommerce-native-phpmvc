<?php

class DashboardPelanggan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard Pelanggan';
        $data['pemesanan'] = $this->model('PemesananModel')->getJumlahPemesananPelanggan();
        $data['kontak'] = $this->model('KontakModel')->getJumlahKontakPelanggan();
        $this->view('templates/pelanggan/header', $data);
        $this->view('templates/pelanggan/navbar', $data);
        $this->view('templates/pelanggan/sidebar', $data);
        $this->view('pelanggan/dashboard', $data);
        $this->view('templates/pelanggan/footer', $data);
    }
}
