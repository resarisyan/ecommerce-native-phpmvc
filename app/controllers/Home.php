<?php

class Home extends Controller
{
	public function index()
	{
		$data['judul'] = 'Home';
		$data['produk'] = $this->model('ProdukModel')->getAllProdukActive();
		$data['produk_desc'] = $this->model('ProdukModel')->getAllProdukActiveDesc();

		$data['kategori'] = $this->model('KategoriModel')->getAllKategoriActive();

		$this->view('templates/page/header', $data);
		$this->view('templates/page/navbar', $data);
		$this->view('page/home', $data);
		$this->view('templates/page/footer', $data);
	}
}
