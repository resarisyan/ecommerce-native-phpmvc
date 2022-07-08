<?php
class Logout extends Controller
{
    public function index()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        setcookie('id', null, -1, '/');
        setcookie('key', null, -1, '/');
        unset($_COOKIE['id']);
        unset($_COOKIE['key']);

        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
