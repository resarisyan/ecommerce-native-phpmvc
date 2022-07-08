let BASEURL = 'http://localhost:8090/myecommerce/public/kelolakategori';
$(function()
{
	$('.tombolTambahData').on('click', function()
	{
	$('#judulModal').html('Tambah Data Kategori');
	$('.modal-footer button[type=submit]').html('Tambah Data');
	});

	$('.tampilModalUbah').on('click', function()
	{
		
	$('#judulModal').html('Ubah Data Kategori');
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
			$('#nama').val(data.nama_kategori);
			$('#id').val(data.id_kategori);
			$('#gambarLama').val(data.gambar_kategori);

		}
		});
	});

});