function ajaxStatus(id) {
	confirmDialog("Apakah Status Ini Akan Diubah?", (e) => {
		if (e) {
			$.ajax({
				url: urlStatus + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					if (data.status) {
                        window.location.href = window.location;
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					error(errorThrown);
				}
			})
		}
	});
}

function ajaxDelete(id) {
	confirmDialog("Apakah Anda Yakin Ingin Menghapus Produk Ini?", (e) => {
		if (e) {
			$.ajax({
				url: urlDelete + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					if (data.status) {
                        window.location.href = window.location;
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					error(errorThrown);
				}
			})
		}
	});
}
