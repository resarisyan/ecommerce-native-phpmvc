<?php
if (!isset($_SESSION["login"])) {
    header('Location: ' . BASEURL . '/login');
    exit;
} else {
    if ($_SESSION["role"] == 1) {
        header('Location: ' . BASEURL . '/dashboardpelanggan');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/admin.css">

    <!-- Custom Style -->
    <?php
    $kelola = ['kelola produk', 'kelola kategori', 'kelola pelanggan', 'kelola pemesanan', 'kelola kontak', 'kelola artikel'];
    $artikel = ['tambah artikel', 'ubah artikel'];
    if (in_array(strtolower($data['judul']), $kelola)) { ?>
        <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php } else if (in_array(strtolower($data['judul']), $artikel)) { ?>
        <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/summernote/summernote-bs4.min.css">
        <link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/simplemde/simplemde.min.css">
    <?php } ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= BASEURL; ?>/img/logoadmin.png" height="60" width="60">
        </div>