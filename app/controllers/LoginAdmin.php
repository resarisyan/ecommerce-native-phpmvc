<?php
class LoginAdmin extends Controller
{
    public function index()
    {
        $data = ['judul' => 'Login Admin'];
        $this->view('templates/page/header', $data);
        $this->view('page/login', $data);
        $this->view('templates/page/footer', $data);
    }

    public function masuk()
    {
        $data['user'] = $this->model('UserModel')->getUser($_POST['username'], 0);
        if ($data['user'] != null) {
            if (md5($_POST['password'], $data['user']['password'])) {
                if (isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('id', $data['user']['id_admin'], time() + 60, '/');
                    setcookie('key', hash('sha256', $data['user']['username']), time() + 60, '/');
                }
                $_SESSION["login"] = $data['user']['id_admin'];
                $_SESSION["role"] = 0;
                Flasher::setFlash('success', 'Anda Berhasil Login');
                header('Location:' . BASEURL . '/dashboardadmin');
                exit;
            } else {
                Flasher::setFlash('error', 'Username/Password Salah');
                header('Location: ' . BASEURL . '/loginadmin');
                exit;
            }
        } else {
            Flasher::setFlash('error', 'Username/Password Salah');
            header('Location: ' . BASEURL . '/loginadmin');
            exit;
        }
    }

    public function cookie()
    {
        $data['user'] = $this->model('UserModel')->getUserById($_COOKIE['id'], 0);
        if ($data['user'] != null) {
            if ($_COOKIE['key'] == hash('sha256', $data['user']['username'])) {
                $_SESSION['login'] = $data['user']['id_admin'];
                $_SESSION["role"] = 0;
                header('Location: ' . BASEURL . '/dashboardadmin');
            } else {
                header('Location: ' . BASEURL . '/loginadmin');
            }
        } else {
            header('Location: ' . BASEURL . '/loginadmin');
        }
    }
}
