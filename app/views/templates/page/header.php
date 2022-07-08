<?php
if (strtolower($data['judul']) == 'login admin' || strtolower($data['judul']) == 'login pelanggan') {
	if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
		header('Location: ' . BASEURL . '/login/cookie');
		exit;
	}
	if (isset($_SESSION["login"])) {
		if ($_SESSION["role"] == 0) {
			header('Location: ' . BASEURL . '/dashboardadmin');
			exit;
		} else {
			header('Location: ' . BASEURL . '/dashboardpelanggan');
			exit;
		}
	}
}
$url = ['login', 'sign up'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman <?= $data['judul']; ?></title>
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
	<?php if (!in_array(strtolower($data['judul']), $url)) { ?>
		<link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
	<?php } else { ?>
		<link rel="stylesheet" href="<?= BASEURL; ?>/css/login.css">
	<?php } ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?= BASEURL; ?>/admin-lte/plugins/toastr/toastr.min.css">

</head>

<body>