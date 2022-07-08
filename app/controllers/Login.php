<?php
class login extends Controller
{
    public function index()
    {
        $data = ['judul' => 'Login Pelanggan'];
        $this->view('templates/page/header', $data);
        $this->view('page/login', $data);
        $this->view('templates/page/footer', $data);
    }

    public function masuk()
    {
        $data['user'] = $this->model('UserModel')->getUser($_POST['username'], 1);
        if ($data['user'] != null) {
            if (md5($_POST['password'], $data['user']['password'])) {
                if (isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('id', $data['user']['id_pelanggan'], time() + 60, '/');
                    setcookie('key', hash('sha256', $data['user']['username']), time() + 60, '/');
                }
                $_SESSION["login"] = $data['user']['id_pelanggan'];
                $_SESSION['nama'] = $data['user']['username'];
                $_SESSION["role"] = 1;
                Flasher::setFlash('success', 'Anda Berhasil Login');
                header('Location:' . BASEURL . '/dashboardpelanggan');
                exit;
            } else {
                Flasher::setFlash('error', 'Username/Password Salah');
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        } else {
            Flasher::setFlash('error', 'Username/Password Salah');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function cookie()
    {
        $data['user'] = $this->model('UserModel')->getUserById($_COOKIE['id'], 1);
        if ($data['user'] != null) {
            if ($_COOKIE['key'] == hash('sha256', $data['user']['username'])) {
                $_SESSION['login'] = $data['user']['id_pelanggan'];
                $_SESSION['nama'] = $data['user']['username'];

                $_SESSION["role"] = 0;
                header('Location: ' . BASEURL . '/dashboardpelanggan');
            } else {
                header('Location: ' . BASEURL . '/login');
            }
        } else {
            header('Location: ' . BASEURL . '/login');
        }
    }
}
