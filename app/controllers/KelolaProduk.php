<?php

class KelolaProduk extends Controller
{
    public function index()
    {
        $data['judul'] = 'Kelola Produk';
        $data['produk'] = $this->model('ProdukModel')->getAllProduk();
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/navbar', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/produk', $data);
        $this->view('templates/admin/footer', $data);
    }

    public function tambah()
    {
        if ($this->model('ProdukModel')->tambahProduk($_POST, $_FILES) > 0) {
            Flasher::setFlash('success', 'Produk Berhasil Ditambahkan...');
            header('Location: ' . BASEURL . '/kelolaproduk');
            exit;
        } else {
            Flasher::setFlash('error', 'Produk Gagal Ditambahkan...');
            header('Location: ' . BASEURL . '/kelolaproduk');
            exit;
        }
    }

    public function getdata()
    {
        if ($this->model('ProdukModel')->getProdukById($_POST['id']) == false) {
            header('Location: ' . BASEURL . '/kelolaproduk');
            exit;
        }
        //mengubah data array associative menjadi json menggunakan fungsi json_encode
        echo json_encode($this->model('ProdukModel')->getProdukById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('ProdukModel')->ubahProduk($_POST, $_FILES) > 0) {
            Flasher::setFlash('success', 'Produk Berhasil Diubah...');
            header('Location: ' . BASEURL . '/kelolaproduk');
            exit;
        } else {
            Flasher::setFlash('error', 'Status Berhasil Diubah...');
            header('Location: ' . BASEURL . '/kelolaproduk');
            exit;
        }
    }

    public function hapus($id = 0)
    {
        $produk = $this->model('ProdukModel')->getProdukById($id);
        if ($produk == false) {
            echo json_encode(['status' => FALSE]);
            exit;
        } else {
            unlink("./img/produk/" . $produk['gambar']);
            if ($this->model('ProdukModel')->hapusProduk($id) > 0) {
                Flasher::setFlash('success', 'Produk Berhasil Diubah...');
                echo json_encode(['status' => TRUE]);
            } else {
                echo json_encode(['status' => FALSE]);
            }
        }
    }

    public function editStatus($id)
    {
        $produk = $this->model('ProdukModel')->getProdukById($id);
        $data['id'] = $id;
        if ($produk['status_produk'] == '0') {
            $data['status'] = '1';
        } else {
            $data['status'] = '0';
        }
        if ($this->model('ProdukModel')->ubahStatus($data) > 0) {
            Flasher::setFlash('success', 'Status Produk Berhasil Diubah...');
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
