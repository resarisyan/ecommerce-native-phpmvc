<?php

class Kontak extends Controller
{
    public function index()
    {
        $data['judul'] = 'Kontak';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategoriActive();

        $this->view('templates/page/header', $data);
        $this->view('templates/page/navbar', $data);
        $this->view('page/kontak', $data);
        $this->view('templates/page/footer', $data);
    }

    public function kirim()
    {
        if (!isset($_SESSION['login']) || $_SESSION['role'] != '1') {
            Flasher::setFlash('warning', 'Silahkan Login Terlebih Dahulu...');
            header('Location: ' . BASEURL . '/login');
            exit;
        } else if (!isset($_POST['submit'])) {
            Flasher::setFlash('warning', 'Pesan Gagal Dikirim...');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        if ($this->model('KontakModel')->kirimPesan($_POST) > 0) {
            Flasher::setFlash('success', 'Pesan Berhasil Dikirim...');
            header('Location: ' . BASEURL . '/');
            exit;
        } else {
            Flasher::setFlash('error', 'Pesan Gagal Dikirim...');
            header('Location: ' . BASEURL . '/');
            exit;
        }
    }
}
