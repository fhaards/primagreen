$(document).ready(function () {
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

	// $("#show_someitems").on("mouseover", ".open_thisitem", function () {
	// 	var index = $("#show_someitems").index(this);
	// 	$(".this_item").show();
	// 	$(".this_item:eq(" + index + ")").show();
	// });

	// $(".open_thisitem").on("mouseleave", function () {
	// 	$(this).find(".this_item").hide();
	// });

	// $(".open_thiscart").hover(
	// 	function (e) {
	// 		$(this).find(".this_cart").toggleClass("md:hidden");
	// 	},
	// 	function (e) {
	// 		$(this).find(".this_cart").toggleClass("md:hidden");
	// 	}
	// );

	// $(".open_thiscart").on("hover", function () {
	// 	$(".this_cart").not($(this).next()).hide();
	// 	$(this).next(".this_cart").fadeIn();
	// });

	// $("#open_thiscart").each(function () {
	// 	$(".open_thiscart").mouseover(function () {
	// 		$("#this_cart").toggleClass("md:hidden");
	// 	});
	// });

	// $("#open_thiscart .open_thiscart").mouseout(function (e) {
	// 	$("#this_cart").toggleClass("md:hidden");
	// });

	// $("#show_someitems").on("mouseover", ".open_thiscart", function() {
	// 	$("#this_cart").not($(this).next()).toggleClass("md:hidden");
	// 	$(this).next("#this_cart").toggleClass("md:hidden");
	// });

	// $(".open_thiscart").on('mouseover', mEnter)
	// $('.this_cart').on('mouseleave', function () {
	// 	$('.this_cart').stop();
	// });
	// function mEnter() {
	// 	$(".this_cart").show();
	// }

	// $("#open_thiscart").each(function (e) {
	// 	$(this).mouseover(
	// 		function (e) {
	// 			$("#this_cart").hide();
	// 		},
	// 		function () {
	// 			$("#this_cart").hide();
	// 		}
	// 	);
	// });

	// $("#show_someitems").on("mouseover", ".open_thiscart", function() {
	// 	$(".this_cart").toggleClass('md:hidden');
	// });

	// $("#show_someitems").on("mouseout", ".open_thiscart", function() {
	// 	$(".this_cart").toggleClass('md:hidden');
	// });
});
