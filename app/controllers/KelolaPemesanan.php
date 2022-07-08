<?php

class KelolaPemesanan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Kelola Pemesanan';
        $data['pemesanan'] = $this->model('PemesananModel')->getAllpemesanan();

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/navbar', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/pemesanan', $data);
        $this->view('templates/admin/footer', $data);
    }

    public function detailpemesanan($id)
    {
        $data['judul'] = 'Detail Pemesanan';
        $data['pemesanan'] = $this->model('PemesananModel')->getDetailPemesanan($id);
        if ($data['pemesanan'] == false) {
            Flasher::setFlash('error', 'Detail Pemesanan Tidak Ditemukan...');
            header('Location: ' . BASEURL . '/kelolapemesanan');
        }
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/navbar', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/detailpemesanan', $data);
        $this->view('templates/admin/footer', $data);
    }

    public function getData()
    {
        if ($this->model('PemesananModel')->getPemesananById($_POST['id']) == false) {
            header('Location: ' . BASEURL . '/kelolapemesanan');
            exit;
        }
        //mengubah data array associative menjadi json menggunakan fungsi json_encode
        echo json_encode($this->model('PemesananModel')->getPemesananById($_POST['id']));
    }

    public function ubahStatus()
    {
        if ($this->model('PemesananModel')->ubahStatus($_POST) > 0) {
            Flasher::setFlash('success', 'Pemesanan Berhasil Diubah...');
            header('Location: ' . BASEURL . '/kelolapemesanan');
            exit;
        } else {
            Flasher::setFlash('error', 'Pemesanan Gagal Diubah...');
            header('Location: ' . BASEURL . '/kelolapemesanan');
            exit;
        }
    }

    public function cetak($kd_pemesanan = null)
    {
        if ($kd_pemesanan) {
            $data = [
                'data_invoice' => $this->pemesanan->getDetailInvoice($kd_pemesanan),
            ];

            if ($data['data_invoice']) {
                if ($data['data_invoice'][0]->status > 1) {
                    $this->view('cetak/invoice', $data);
                } else if ($data['data_invoice'][0]->status == 1) {
                    Flasher::setFlash('warning', 'Status Pemesanan Belum Diproses...');
                    header('Location: ' . BASEURL . '/kelolapemesanan');
                } else {
                    Flasher::setFlash('warning', 'Status Pemesanan Produk Dibatalkan...');
                    header('Location: ' . BASEURL . '/kelolapemesanan');
                }
            } else {
                Flasher::setFlash('warning', 'Pemesanan Tidak Ditemukan...');
                header('Location: ' . BASEURL . '/kelolapemesanan');
            }
        } else {
            Flasher::setFlash('error', 'Kode Pemesanan Kosong...');
            header('Location: ' . BASEURL . '/kelolapemesanan');
        }
    }
}
