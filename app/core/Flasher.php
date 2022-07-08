<?php
//Flash message ketika menambahkan data

class Flasher
{
	public static function setFlash($tipe, $pesan)
	{
		$_SESSION['flash'] =
			[
				'pesan' => $pesan,
				'tipe' => $tipe
			];
	}

	public static function flash()
	{
		if (isset($_SESSION['flash'])) {
			if ($_SESSION['flash']['tipe'] == 'error' || $_SESSION['flash']['tipe'] == 'warning') { ?>
				<script>
					error('<?= $_SESSION['flash']['pesan'] ?>')
				</script>
			<?php } else if ($_SESSION['flash']['tipe'] == 'success') { ?>

				<script>
					success('<?= $_SESSION['flash']['pesan'] ?>')
				</script>
<?php }
			unset($_SESSION['flash']);
		}
	}
}
