$(document).ready(function () {
	// GET NO PEMESANAN WHEN UPLOAD TRANSFER PROOF
	$(".upload-transfer").on("click", function () {
		$("#upNoOrderInput").val($(this).data("nopemesanan"));
		$("#upNoOrderInput2").html($(this).data("nopemesanan"));
	});

	$(".open_filter").on("click", function () {
		$(".filter_store").toggleClass('hidden');
	});

	// IF DATA EXIST
	$("#email").change(function () {
		$("#email_result").text("").fadeIn("slow");
		var email = $("#email").val();
		if (email != "") {
			$.ajax({
				url: BASE_URL + "registration/data_exist",
				method: "POST",
				data: {
					email: email,
				},
				success: function (data) {
					$("#email_result").html(data);
				},
			});
		}
	});

	// CLICK CHECKOUT
	$("#checkout-btn").on("click", function () {
		window.location.href = SITE_URL + "cart/checkout-detail";
	});

	$(".add_favorites").click( function () {
		var itemsid = $(this).data("itemsid");
		var userid = $(this).data("userid");
		$.ajax({
			url: BASE_URL + "store/add-favorites",
			method: "POST",
			data: {
				itemsid: itemsid,
				userid: userid
			},
			success: function (data) {
				window.location.href = SITE_URL + "login";
			},
		});
	});
});
