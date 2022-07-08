<?php

class Kelolapelanggan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Kelola pelanggan';
        $data['pelanggan'] = $this->model('PelangganModel')->getAllpelanggan();

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/navbar', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/pelanggan', $data);
        $this->view('templates/admin/footer', $data);
    }

    public function getdata()
    {
        if ($this->model('PelangganModel')->getPelangganById($_POST['id']) == false) {
            header('Location: ' . BASEURL . '/kelolapelanggan');
            exit;
        }
        //mengubah data array associative menjadi json menggunakan fungsi json_encode
        echo json_encode($this->model('PelangganModel')->getPelangganById($_POST['id']));
    }

    public function hapus($id = 0)
    {
        $pelanggan = $this->model('PelangganModel')->getPelangganById($id);
        if ($pelanggan == false) {
            echo json_encode(['status' => FALSE]);
            exit;
        } else {
            if ($this->model('PelangganModel')->hapusPelanggan($id) > 0) {
                Flasher::setFlash('success', 'Pelanggan Berhasil Dihapus...');
                echo json_encode(['status' => TRUE]);
            } else {
                echo json_encode(['status' => FALSE]);
            }
        }
    }

    public function editStatus($id)
    {
        $katgori = $this->model('PelangganModel')->getPelangganById($id);
        $data['id'] = $id;
        if ($katgori['status_pelanggan'] == '0') {
            $data['status'] = '1';
        } else {
            $data['status'] = '0';
        }
        if ($this->model('PelangganModel')->ubahStatus($data) > 0) {
            Flasher::setFlash('success', 'Status Pelanggan Berhasil Diubah...');
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
