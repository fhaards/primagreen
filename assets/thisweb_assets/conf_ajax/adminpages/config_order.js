$(document).ready(function () {
	$(".openmodal-csorder").on("click", function () {
		$("#no_order_pemesanan_modal_input").val($(this).data("nopemesanans"));
		$("#no_order_pemesanan_modal").html($(this).data("nopemesanans"));
	});
});
