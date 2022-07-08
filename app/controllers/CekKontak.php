<?php

class CekKontak extends Controller
{
    public function index()
    {
        $data['judul'] = 'Cek Kontak';
        $data['kontak'] = $this->model('KontakModel')->getKontakPelanggan();

        $this->view('templates/pelanggan/header', $data);
        $this->view('templates/pelanggan/navbar', $data);
        $this->view('templates/pelanggan/sidebar', $data);
        $this->view('pelanggan/kontak', $data);
        $this->view('templates/pelanggan/footer', $data);
    }
}
