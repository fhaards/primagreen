$(document).ready(function () {
	subTotal();
	calculateCheckout();

	function successMsg() {
        swal({
			type: 'success',
            timer:1500,
            icon: "success"
        });
	}

	$(".show-cart").hide();
	$("#checkout-btn").hide();

	$(".show-cart-menu").click(function () {
		$(".show-cart").animate({ width: "toggle" }, 100);
	});

	$(".close-cart").click(function () {
		$(".show-cart").animate({ width: "toggle" }, 100);
	});

	$(".add_cart").click(function () {
		var produk_id = $(this).data("produkid");
		var produk_nama = $(this).data("produknama");
		var produk_harga = $(this).data("produkharga");
		var quantity = $("#" + produk_id).val();
		$.ajax({
			url: BASE_URL +"cart/add-to-cart",
			method: "POST",
			data: {
				produk_id: produk_id,
				produk_nama: produk_nama,
				produk_harga: produk_harga,
				quantity: quantity,
			},
			success: function (data) {
				$("#detail_cart").html(data);
				if ($("#cekrowcart").val() != "0" || $("#cekrowcart").val() != null) {
					$("#checkout-btn").show();
					$("#notif-cart").show();
				}
				subTotal();
				successMsg();
			},
		});
	});

	$(document).on("click", ".hapus_cart", function () {
		var row_id = $(this).attr("id");
		$.ajax({
			url:BASE_URL +"cart/delete-cart-items",
			method: "POST",
			data: {
				row_id: row_id,
			},
			success: function (data) {
				$("#detail_cart").html(data);
				$("#detail_checkout").html(data);
				if ($("#cekrowcart").val() == "0" || $("#cekrowcart").val() == null) {
					$("#checkout-btn").hide();
					$("#notif-cart").hide();
				}
				subTotal();
				successMsg();
			},
		});
	});

	function subTotal() {
		$.ajax({
			type: "ajax",
			url:BASE_URL + "cart/show-subtotal",
			async: true,
			dataType: "json",
			success: function (data) {
				$("#sub-total-clone").html(data.subtotal);
				$("#sub-total").val(data.subtotal);
				calculateCheckout();
			},
		});
	}

	function calculateCheckout() {

		var set_subtotal = parseInt($("#sub-total").val());
		var set_taxes = 4 / 100 ;
		var res = parseInt(set_subtotal * set_taxes);
		var total = parseInt(set_subtotal + res);
		var final_result = parseInt(total,10); 

		$('#taxes').html(res);
		$('#totalorder-clone').val(final_result);
		$('#totalorder').html(final_result);
	}



});

// $(document).ready(function () {
//     if ($("#cekrowcart").val() == "0" || $("#cekrowcart").val() == null) {
//         $(".coba").html("Kosongan");
//     } else {
//         $(".coba").html("Adaan");
//     }
// });

// $("#cekrowcart").on("blur", function () {
//     if ($("#cekrowcart").val() == "0" || $("#cekrowcart").val() == null) {
//         $(".coba").html("Kosongan");
//     } else {
//         $(".coba").html("Adaan");
//     }
// });

// $(".show-cart-menu").click(function() {
//     $("#show-cart").removeClass("hidden").fade();
// });

// $(".close-cart").click(function() {
//     $("#show-cart").addClass("hidden");
// });

// $('input').on('change', function(){
//     var prev = $(this).data('val');
//     var current = $(this).val();
//     console.log("Prev value " + prev);
//     console.log("New value " + current);
// });

// $(document).ready(function() {
//     var cekRowCart = $('.cekrowcart').val();
//     if (cekRowCart == 0) {
//         $('.coba').html('Kosongan');
//     } else {
//         $('.coba').html('Adaan');
//     }
// });

// $(document).ready(function() {
//     var $number = $('#cekrowcart');
//     $number.on('focus', function() {
//         var $input = $(this);
//         $input.data('originalValue', $input.val());
//     });
//     $number.on('blur', function() {
//         var $input = $(this);
//         if ($input.val().trim() == '0') {
//             $('.coba').html('Kosongan');
//         }
//         if ($input.val() != $input.data('originalValue')) {
//             $('.coba').html('Adaan');
//         }
//     });
// });
