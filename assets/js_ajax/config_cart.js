
$(document).ready(function () {
	subTotal();
	$(".checkout-final-btn").hide();

	// calculateCheckout();

	$('.selectkurir').click(function(){
		setKurir($(this).val());
	});

	function setKurir(value) {
		$("#setkurir").html(value);
		$("#setkurir-clone").val(value);
		calculateCheckout();

	}

	function successMsg() {
		swal({
			type: "success",
			timer: 1500,
			icon: "success",
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
			url: BASE_URL + "cart/add-to-cart",
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
			url: BASE_URL + "cart/delete-cart-items",
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
			url: BASE_URL + "cart/show-subtotal",
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
		var isCourierChoosen = !isNaN(parseInt($("#setkurir-clone").val()));
		var set_subtotal = parseInt($("#sub-total").val());
		var set_taxes = 4 / 100;
		var res = parseInt(set_subtotal * set_taxes);
		var set_courier = isCourierChoosen ? parseInt($("#setkurir-clone").val()) : 0;
		var total_sub = parseInt(set_subtotal + set_courier);
		var total = parseInt(total_sub + res);
		var final_result = parseInt(total, 10);

		// console.log( final_result);

		$("#taxes").html(res);
		$("#totalorder-clone").val(final_result);
		$("#totalorder").html(final_result);
		if(set_courier != 0){
			$(".checkout-final-btn").show();
			$(".sel-courier ").hide();
		} 
	}
});

// function tes(element) {
// 	console.log(element);
// 	console.log(element.value);
// }

	// $(".selectkurir").change(function () {
	// 	calculateCheckout();
	// 	var setValHargaKurir = $(".setkurir input[type=radio]:checked").val();
	// 	if ($(this).prop("checked")) {
	// 		$("#setkurir-clone").val(setValHargaKurir);
	// 		$("#setkurir").html(setValHargaKurir);
	// 	}
	// });

// $('input:radio').each(function(){
// 	var setValHargaKurir = $('.select-kurir').val();
// 	var className = $(this).prop('select-kurir');
// 	$('input:radio[class="'+className +'"]').prop('checked',this.checked);
// 	$('.testerings').html(setValHargaKurir);
// });

// $(".selectkurir").change(function () {
// 	var id_kurir = $(this).prop('id');
// 	var harga_kurir = $(this).val();
// 	$.ajax({
// 	   url   : BASE_URL + 'cart/show-courier',
// 	   data  : {'harga_kurir' : harga_kurir, 'id_kurir' : id_kurir},
// 	   dataType: 'json',
// 	   success : function(data) {
// 		   $('.testerings').html(data.harga_kurir);
// 	   }
// 	});
// });
