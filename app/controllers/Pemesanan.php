<?php
class Pemesanan extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['login']) || $_SESSION['role'] != '1') {
            Flasher::setFlash('warning', 'Silahkan Login Terlebih Dahulu...');
            header('Location: ' . BASEURL . '/login');
            exit;
        } else if (!isset($_POST['submit'])) {
            Flasher::setFlash('warning', 'Pemesanan Gagal...');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        if ($this->model('PemesananModel')->tambahPemesanan($_POST) > 0) {
            Flasher::setFlash('success', 'Pemesanan Berhasil Ditambahkan...');
            header('Location: ' . BASEURL . '/');
            exit;
        } else {
            Flasher::setFlash('error', 'Pemesanan Gagal Ditambahkan...');
            header('Location: ' . BASEURL . '/');
            exit;
        }
    }
}
