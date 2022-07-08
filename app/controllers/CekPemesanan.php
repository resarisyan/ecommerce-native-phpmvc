<?php

class CekPemesanan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Cek Pemesanan';
        $data['pemesanan'] = $this->model('PemesananModel')->getAllPemesananPelanggan();

        $this->view('templates/pelanggan/header', $data);
        $this->view('templates/pelanggan/navbar', $data);
        $this->view('templates/pelanggan/sidebar', $data);
        $this->view('pelanggan/pemesanan', $data);
        $this->view('templates/pelanggan/footer', $data);
    }

    public function detailpemesanan($id)
    {
        $data['judul'] = 'Detail Pemesanan';
        $data['pemesanan'] = $this->model('PemesananModel')->getDetailPemesananPelanggan($id);
        if ($data['pemesanan'] == false) {
            Flasher::setFlash('error', 'Detail Pemesanan Tidak Ditemukan...');
            header('Location: ' . BASEURL . '/kelolapemesanan');
        }
        $this->view('templates/pelanggan/header', $data);
        $this->view('templates/pelanggan/navbar', $data);
        $this->view('templates/pelanggan/sidebar', $data);
        $this->view('pelanggan/detailpemesanan', $data);
        $this->view('templates/pelanggan/footer', $data);
    }
}
