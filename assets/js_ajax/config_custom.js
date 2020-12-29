// PAGE SCROLL STYLE

$(window).bind("scroll", function () {
	if ($(window).scrollTop() > 32) {
		$(".nav-header").addClass("shadow-lg");
		$(".nav-header").removeClass("lg:h-32 h:20");
		$(".submenu-store").addClass("mt-16");
		$(".submenu-store").removeClass("mt-24");
	} else {
		$(".nav-header").removeClass("shadow-lg");
		$(".nav-header").addClass("lg:h-32 h:20");
		$(".submenu-store").addClass("mt-24");
		$(".submenu-store").removeClass("mt-16");
	}
});

$(document).ready(function () {
	// GET NO PEMESANAN WHEN UPLOAD TRANSFER PROOF
	$(".upload-transfer").on("click", function () {
		$("#upNoOrderInput").val($(this).data("nopemesanan"));
		$("#upNoOrderInput2").html($(this).data("nopemesanan"));
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
	$("#checkout-btn").on("click", function() {
		window.location.href = SITE_URL + "cart/checkout-detail";
	});

});

// (function (frontendHeader) {
//     let observer = new IntersectionObserver(entries => {
//         if (entries[0].isIntersecting) {
//             frontendHeader.classList.add('is-floating');
//         } else {
//             frontendHeader.classList.remove('is-floating');
//         }
//     }, {
//         threshold: .25
//     });

//     observer.observe(document.querySelector('section'));
// })(document.querySelector('#frontend-header'));
