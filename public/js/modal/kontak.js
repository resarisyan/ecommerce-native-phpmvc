$(function()
{
	$('.tampilModalBalas').on('click', function()
	{
	const id = $(this).data('id');
    console.log(id);
    $('#id').val(id);
	});

});