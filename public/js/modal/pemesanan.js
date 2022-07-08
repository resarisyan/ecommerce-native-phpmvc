let BASEURL = 'http://localhost:8090/myecommerce/public/kelolapemesanan';
$(function()
{
	$('.tampilModalUbah').on('click', function()
	{
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
			$('#status').val(data.status_pemesanan);
			$('#id').val(data.id_pemesanan);
		}
		});
	});

});