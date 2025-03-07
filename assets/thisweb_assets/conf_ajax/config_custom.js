$(document).ready(function () {

	// PRODUCTS LIST
	$("div[class^='t']").mouseover(function () {
		$(this).find("div[id^='sover']").addClass('bg-gray-900 bg-opacity-75');
	});
	$("div[class^='t']").mouseout(function () {
		$(this).find("div[id^='sover']").removeClass('bg-gray-900 bg-opacity-75');
	});

	// $("#open_this_items")
	// 	.live("mouseover", function () {
	// 		$(".product_bg").show();
	// 	})
	// 	.live("mouseleave", function () {
	// 		$(".product_bg").hide();
	// 	});

	// $(".product_hover").live({
	// 	mouseenter: function () {
	// 		$("#products_names").addClass('bg-black bg-opacity-50');
	// 	},
	// 	mouseleave: function () {
	// 		$("#products_names").removeClass('bg-black bg-opacity-50');
	// 	}
	// });

	// GET NO PEMESANAN WHEN UPLOAD TRANSFER PROOF
	$(".upload-transfer").on("click", function () {
		$("#upNoOrderInput").val($(this).data("nopemesanan"));
		$("#upNoOrderInput2").html($(this).data("nopemesanan"));
	});

	$(".open_filter").on("click", function () {
		$(".filter_store").toggle(
			function () {
				$(this).animate({ height: 0 }, 200);
			},
			function () {
				$(this).animate({ height: 1000 }, 200);
			}
		);
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

	$(".add_favorites").click(function () {
		var itemsid = $(this).data("itemsid");
		var userid = $(this).data("userid");
		$.ajax({
			url: BASE_URL + "store/add-favorites",
			method: "POST",
			data: {
				itemsid: itemsid,
				userid: userid,
			},
			success: function (data) {
				window.location.href = SITE_URL + "login";
			},
		});
	});
});
