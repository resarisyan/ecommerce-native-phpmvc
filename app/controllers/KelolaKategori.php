<?php

class KelolaKategori extends Controller
{
    public function index()
    {
        $data['judul'] = 'Kelola Kategori';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/navbar', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/kategori', $data);
        $this->view('templates/admin/footer', $data);
    }

    public function tambah()
    {
        if ($this->model('KategoriModel')->tambahKategori($_POST, $_FILES) > 0) {
            Flasher::setFlash('success', 'Kategori Berhasil Ditambahkan...');
            header('Location: ' . BASEURL . '/kelolakategori');
            exit;
        } else {
            Flasher::setFlash('error', 'Kategori Gagal Ditambahkan...');
            header('Location: ' . BASEURL . '/kelolakategori');
            exit;
        }
    }

    public function getdata()
    {
        if ($this->model('KategoriModel')->getKategoriById($_POST['id']) == false) {
            header('Location: ' . BASEURL . '/kelolakategori');
            exit;
        }
        //mengubah data array associative menjadi json menggunakan fungsi json_encode
        echo json_encode($this->model('KategoriModel')->getKategoriById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('KategoriModel')->ubahKategori($_POST, $_FILES) > 0) {
            Flasher::setFlash('success', 'Kategori Berhasil Diubah...');
            header('Location: ' . BASEURL . '/kelolakategori');
            exit;
        } else {
            Flasher::setFlash('error', 'Kategori Gagal Diubah...');
            header('Location: ' . BASEURL . '/kelolakategori');
            exit;
        }
    }

    public function hapus($id = 0)
    {
        $kategori = $this->model('KategoriModel')->getKategoriById($id);
        if ($kategori == false) {
            echo json_encode(['status' => FALSE]);
            exit;
        } else {
            if ($this->model('KategoriModel')->hapusKategori($id) > 0) {
                Flasher::setFlash('success', 'Kategori Berhasil Dihapus...');
                echo json_encode(['status' => TRUE]);
            } else {
                echo json_encode(['status' => FALSE]);
            }
        }
    }

    public function editStatus($id)
    {
        $katgori = $this->model('KategoriModel')->getKategoriById($id);
        $data['id'] = $id;
        if ($katgori['status_kategori'] == '0') {
            $data['status'] = '1';
        } else {
            $data['status'] = '0';
        }
        if ($this->model('KategoriModel')->ubahStatus($data) > 0) {
            Flasher::setFlash('success', 'Status Kategori Berhasil Diubah...');
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
