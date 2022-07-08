<?php
class Keranjang extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['login']) || $_SESSION['role'] != '1') {
            Flasher::setFlash('warning', 'Silahkan Login Terlebih Dahulu...');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        $data['judul'] = 'Keranjang';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategoriActive();
        $data['keranjang'] = $this->model('KeranjangModel')->getKeranjangByIdPelanggan();

        // var_dump($data['keranjang']);
        // exit;
        $this->view('templates/page/header', $data);
        $this->view('templates/page/navbar', $data);
        $this->view('page/cart', $data);
        $this->view('templates/page/footer', $data);
    }

    public function tambahKeranjang()
    {
        if (!isset($_SESSION['login']) || $_SESSION['role'] != '1') {
            Flasher::setFlash('warning', 'Silahkan Login Terlebih Dahulu...');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        if ($this->model('KeranjangModel')->tambahKeranjang($_POST) > 0) {
            Flasher::setFlash('success', 'Produk Berhasil Ditambahkan Ke Keranjang...');
            header('Location: ' . BASEURL . '/');
            exit;
        } else {
            Flasher::setFlash('error', 'Produk Gagal Ditambahkan Ke Keranjang...');
            header('Location: ' . BASEURL . '/');
            exit;
        }
    }
}
