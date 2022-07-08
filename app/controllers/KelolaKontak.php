<?php

class KelolaKontak extends Controller
{
    public function index()
    {
        $data['judul'] = 'Kelola Kontak';
        $data['kontak'] = $this->model('KontakModel')->getAllKontak();

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/navbar', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/kontak', $data);
        $this->view('templates/admin/footer', $data);
    }

    public function getData()
    {
        if ($this->model('KontakModel')->getKontaknById($_POST['id']) == false) {
            header('Location: ' . BASEURL . '/kelolakontak');
            exit;
        }
        //mengubah data array associative menjadi json menggunakan fungsi json_encode
        echo json_encode($this->model('KontakModel')->getKontakById($_POST['id']));
    }

    public function hapus($id = 0)
    {
        $kontak = $this->model('KontakModel')->getKontakById($id);
        if ($kontak == false) {
            echo json_encode(['status' => FALSE]);
            exit;
        } else {
            if ($this->model('KontakModel')->hapusKontak($id) > 0) {
                Flasher::setFlash('success', 'Kontak Berhasil Diubah...');
                echo json_encode(['status' => TRUE]);
            } else {
                echo json_encode(['status' => FALSE]);
            }
        }
    }

    public function balasPesan()
    {
        if ($this->model('KontakModel')->balasPesan($_POST) > 0) {
            Flasher::setFlash('success', 'Pesan Berhasil Dikirim...');
            header('Location: ' . BASEURL . '/kelolakontak');
            exit;
        } else {
            Flasher::setFlash('error', 'Pesan Gagal Dikirim...');
            header('Location: ' . BASEURL . '/kelolakontak');
            exit;
        }
    }
}
