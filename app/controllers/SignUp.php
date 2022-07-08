<?php
class SignUp extends Controller
{
    public function index()
    {
        $data = ['judul' => 'Sign Up'];
        $this->view('templates/page/header', $data);
        $this->view('page/signup', $data);
        $this->view('templates/page/footer', $data);
    }

    public function daftar()
    {
        if (isset($_POST['signup'])) {
            if ($this->model('UserModel')->validation($_POST) == true) {
                $data['user'] = $this->model('UserModel')->getUser($_POST['username'], 1);
                if ($data['user'] == null) {
                    if ($this->model('UserModel')->tambahUser($_POST) > 0) {
                        Flasher::setFlash('success', 'Akun Berhasil Dibuat');
                        header('Location:' . BASEURL . '/login');
                        exit;
                    } else {
                        Flasher::setFlash('error', 'Akun Gagal Dibuat');
                        header('Location: ' . BASEURL . '/signup');
                        exit;
                    }
                } else {
                    Flasher::setFlash('warning', 'Username Sudah Terdaftar');
                    header('Location: ' . BASEURL . '/signup');
                    exit;
                }
            } else {
                Flasher::setFlash('warning', 'Password Harus Lebih Dari 8 Karakter');
                header('Location: ' . BASEURL . '/signup');
                exit;
            }
        } else {
            Flasher::setFlash('Gagal -', 'Dibuat', 'danger', 'Registrasi');
            header('Location: ' . BASEURL . '/signup');
            exit;
        }
    }
}
