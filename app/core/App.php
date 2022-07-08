<?php 

//Contoh localhost/phpmvc/public/about/page/10/20
//about disini adalah controller
//page disini adalah method
// 10, 20 disini adalah parameter
class App{
	protected $controller = 'Home'; //controller default
	protected $method = 'index';
	protected $params = [];


	public function __construct() 
	{
		$url = $this->parseURL();
		
		//controller
		//Mengecek apakah ada sebuah file didalam folder controllers yang manaya sesuai yang kita tulis di URL
		if (isset($url[0])) 
		{
			if (file_exists('../app/controllers/' . $url[0] . '.php')) 
			{
				$this->controller = $url[0]; //controller baru yang diketik oleh user di url

				unset($url[0]); //Menghilangkan controllernya dari element arraynya cek menggunakan vardump perbedaannya
				// var_dump($url);
			}
		}
		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;
		//method 
		// Untuk mengecek methodnya apakah ada
		if (isset($url[1])) 
		{
			if (method_exists($this->controller, $url[1])) 
			{
				//Kalau Ada
				$this->method = $url[1];
				unset($url[1]);
				
				// if($this->method == 'detail'){
				// 	require_once '../app/models/Mahasiswa_model.php';
				// 	$model = new Mahasiswa_model;
				// 	$data = $model->getAllMahasiswa();
				// 	foreach ($data as $mhs) {
				// 		$id [] = $mhs['id'];
				// 		}
				// 	if($url == [] || in_array($url[2], $id) == false)
				// 	{
				// 		$this->method= 'index';
				// 	}
				// }
			}
		}

		//params
		if (!empty($url)) 
		{
			$this->params = array_values($url);
		}
		//Jalankan controller & method, serta kirimkan params jika ada
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL() //Membuat method yang bertugas mengambil url lalu memacah sesuai dengan keingan kita
	{
		if(isset($_GET['url']))
		{ 
			$url = rtrim($_GET['url'], '/'); //rtrim() adalah fungsi untuk menghapus sebuah karakter
			$url = filter_var($url, FILTER_SANITIZE_URL); //filter() membersihkan url dari karakter-karakter aneh
			$url = explode('/', $url); //urlnya dipecah menggunakan fungsi explode()
			return $url;
		}
	}
}

//File htaccess adalah file yang bisa digunakan untuk memodifikasi konfigurasi dari server apache, bisa dilakukan per folder