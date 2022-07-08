let BASEURL = 'http://localhost:8090/myecommerce/public/kelolaproduk';
$(function()
{
	$('.tombolTambahData').on('click', function()
	{
	$('#judulModal').html('Tambah Data Produk');
	$('.modal-footer button[type=submit]').html('Tambah Data');
	});

	$('.tampilModalUbah').on('click', function()
	{
		
	$('#judulModal').html('Ubah Data Produk');
	$('.modal-footer button[type=submit]').html('Ubah Data');
	$('.modal-body form').attr('action', BASEURL + '/ubah');
	const id = $(this).data('id');
	console.log(id);
	$.ajax(
		{
		url: BASEURL + '/getdata', 
		data: {id : id},
		method: 'POST', 
		dataType: 'json', 
		success: function(data) 
		{
			$('#nama').val(data.nama_produk);
			$('#harga').val(data.harga);
			$('#kategori').val(data.id_kategori);
			$('#deskripsi').val(data.deskripsi);
			$('#gambarLama').val(data.gambar);
			$('#id').val(data.id_produk);
		}
		});
	});

});