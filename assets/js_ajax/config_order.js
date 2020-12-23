$(document).ready(function () {
	$(".upload-transfer").on("click", function () {
		$("#upNoOrderInput").val($(this).data("nopemesanan"));
		$("#upNoOrderInput2").html($(this).data("nopemesanan"));
	});

	$("#uploadTransferForm").on("submit", function () {
		var no_pemesanan = $("#upNoOrderInput").val();
		var ket = $("#upKetInput").val();
		$.ajax({
			type: "POST",
			url: BASE_URL + "profile/upload-transfer",
			dataType: "JSON",
			data: {
				no_pemesanan: no_pemesanan,
				ket: ket,
			},
			success: function (data) {
				$("#modal-transfer-proof").hide();
			},
		});
		return false;
	});
});
