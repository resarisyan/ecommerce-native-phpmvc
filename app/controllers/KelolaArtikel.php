<?php

class KelolaArtikel extends Controller
{
    public function index()
    {
        $data['judul'] = 'Kelola Artikel';
        $data['artikel'] = $this->model('ArtikelModel')->getAllArtikel();

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/navbar', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/artikel', $data);
        $this->view('templates/admin/footer', $data);
    }

    public function tambah($save = null)
    {
        if ($save == null) {
            $data['judul'] = 'Tambah Artikel';
            $this->view('templates/admin/header-admin', $data);
            $this->view('templates/admin/navbar', $data);
            $this->view('templates/admin/sidebar', $data);
            $this->view('admin/editorartikel', $data);
            $this->view('templates/admin/footer', $data);
        } else if ($save == 'save') {
            if ($this->model('ArtikelModel')->tambahArtikel($_POST, $_FILES) > 0) {
                Flasher::setFlash('success', 'Artikel Berhasil Ditambahkan...');
                header('Location: ' . BASEURL . '/kelolaartikel');
                exit;
            } else {
                Flasher::setFlash('error', 'Artikel Gagal Ditambahkan...');
                header('Location: ' . BASEURL . '/kelolaartikel');
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/kelolaartikel/tambah');
        }
    }

    public function ubah($id = null, $save = null)
    {
        if ($save == null) {
            $artikel = $this->model('ArtikelModel')->getArtikelById($id);
            if ($artikel == false) {
                header('Location: ' . BASEURL . '/kelolaartikel');
                exit;
            } else {
                $data['judul'] = 'Ubah Artikel';
                $data['artikel'] = $artikel;
                $this->view('templates/admin/header-admin', $data);
                $this->view('templates/admin/navbar', $data);
                $this->view('templates/admin/sidebar', $data);
                $this->view('admin/editorartikel', $data);
                $this->view('templates/admin/footer', $data);
            }
        } else if ($save == 'save') {
            if ($this->model('ArtikelModel')->ubahArtikel($_POST, $_FILES) > 0) {
                Flasher::setFlash('success', 'Artikel Berhasil Diubah...');
                header('Location: ' . BASEURL . '/kelolaartikel');
                exit;
            } else {
                Flasher::setFlash('error', 'Artikel Gagal Diubah...');
                header('Location: ' . BASEURL . '/kelolaartikel');
                exit;
            }
        }
    }

    public function hapus($id = 0)
    {
        if ($this->model('ArtikelModel')->hapusArtikel($id) > 0) {
            Flasher::setFlash('success', 'Artikel Berhasil Dihapus...');
            header('Location: ' . BASEURL . '/kelolaartikel');
            exit;
        } else {
            Flasher::setFlash('error', 'Artikel Gagal Dihapus...');
            header('Location: ' . BASEURL . '/kelolaartikel');
            exit;
        }
    }
}
