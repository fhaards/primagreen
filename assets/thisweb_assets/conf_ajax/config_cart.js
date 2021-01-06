$(document).ready(function () {
	//START CART CONFIGURATION

	subTotal();
	function successMsg() {
		swal({
			type: "success",
			showConfirmButton: false,
			timer: 1500,
			icon: "success",
		});
	}

	function loadMsg() {
		swal({
			// imageUrl: "assets/image/loading2.gif",
			text: "loading ..",
			showConfirmButton: false,
			allowOutsideClick: false,
			imageWidth: 160,
		});
	}

	$(".checkout-final-btn").hide();

	$(".selectkurir").click(function () {
		setKurir($(this).val());
	});

	$(".selectedkurir").click(function () {
		$(".selectedkurir")
			.addClass("shadow-md bg-gray-100")
			.removeClass("bg-green-500 text-white");
		$(this)
			.removeClass("shadow-md bg-gray-100")
			.addClass("bg-green-500 text-white");
	});

	$(".selectkurir:checked").parent().removeClass("shadow-md");

	function setKurir(value) {
		$("#setkurir-clone").val(value);
		getCourierData();
		calculateCheckout();
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
		var icon_container = $(this).children(".flex");
		icon_container.children(".load-icon").show();
		icon_container.children(".cart-icon").hide();
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
				icon_container.children(".load-icon").hide();
				icon_container.children(".cart-icon").show();
				$("#detail_cart").html(data);
				if ($("#cekrowcart").val() != "0" || $("#cekrowcart").val() != null) {
					$("#checkout-btn").show();
					$("#notif-cart").show();
				}
				subTotal();
			},
		});
	});

	$(".filter_data").on("click", ".add_cart", function () {
		var produk_id = $(this).data("produkid");
		var produk_nama = $(this).data("produknama");
		var produk_harga = $(this).data("produkharga");
		var quantity = $("#" + produk_id).val();
		loadMsg();
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
				successMsg();
				$("#detail_cart").html(data);
				if ($("#cekrowcart").val() != "0" || $("#cekrowcart").val() != null) {
					$("#checkout-btn").show();
					$("#notif-cart").show();
				}
				subTotal();
			},
		});
	});

	$(document).on("click", ".hapus_cart", function () {
		var row_id = $(this).attr("id");
		loadMsg();
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
				var setsubtotal = addCommas(data.subtotal);
				$("#sub-total-clone").html(setsubtotal);
				$("#sub-total").val(data.subtotal);
				calculateCheckout();
			},
		});
	}

	function addCommas(numberString) {
		var resultString = numberString + "",
			x = resultString.split("."),
			x1 = x[0],
			x2 = x.length > 1 ? "." + x[1] : "",
			rgxp = /(\d+)(\d{3})/;
		while (rgxp.test(x1)) {
			x1 = x1.replace(rgxp, "$1" + "," + "$2");
		}
		return x1 + x2;
	}

	function calculateCheckout() {
		var isCourierChoosen = !isNaN(parseInt($("#setkurir-harga").val()));
		var set_subtotal = parseInt($("#sub-total").val());
		var set_taxes = 4 / 100;
		var res = parseInt(set_subtotal * set_taxes);
		var set_courier = isCourierChoosen
			? parseInt($("#setkurir-harga").val())
			: 0;
		var total_sub = parseInt(set_subtotal + set_courier);
		var total = parseInt(total_sub + res);
		var final_result = parseInt(total, 10);

		var clone_res = addCommas(res);
		var clone_final_result = addCommas(final_result);

		$("#taxes").html(clone_res);
		$("#totalorder-clone").val(final_result);
		$("#totalorder").html(clone_final_result);
		if (set_courier != 0) {
			$(".checkout-final-btn").show();
			$(".sel-courier ").hide();
		}
	}

	function getCourierData() {
		var idCourier = $("#setkurir-clone").val();
		$.ajax({
			type: "ajax",
			url: BASE_URL + "cart/show-courierbyid/" + idCourier,
			async: false,
			dataType: "json",
			success: function (data) {
				var showHargaKurir = data.harga_kurir;
				$("#setkurir-harga-clone").html(showHargaKurir);
				$("#setkurir-harga").val(showHargaKurir);
				return false;
			},
		});
	}

	///LOADING STORE//////////////////////////////////////////////////////////////////

	filter_data(1);

	function filter_data(page) {
		var action = "fetch_data";
		var type = get_filter("type");
		var size = get_filter("size");
		var minimum_price = $("#hidden_minimum_price").val();
		var maximum_price = $("#hidden_maximum_price").val();
		var sorted_name = $("#get-sorted").val();

		// loadMsg();
		$(".filter_data").html(
			'<div class="flex flex-col w-full bg-red-300"><div class="mx-auto text-gray-800 font-bold mx-auto">Loading .. <img src="../assets/image/loading2.gif" class="mr-4 h-6 w-6"></div></div>'
		);
		$.ajax({
			url: BASE_URL + "store/product-list/" + page,
			method: "POST",
			dataType: "JSON",
			data: {
				action: action,
				type: type,
				size: size,
				minimum_price: minimum_price,
				maximum_price: maximum_price,
				sorted_name: sorted_name,
			},
			success: function (data) {
				// successMsg();
				$(".filter_data").html(data.product_list);
				$("#pagination_link").html(data.pagination_link);
			},
		});
	}

	function get_filter(class_name) {
		var filter = [];
		$("." + class_name + ":checked").each(function () {
			filter.push($(this).val());
		});
		return filter;
	}

	$(document).on("click", ".pagination li a", function (event) {
		event.preventDefault();
		var page = $(this).data("ci-pagination-page");
		filter_data(page);
	});

	$(".common_selector").click(function () {
		filter_data(1);
	});

	$(".sort_selector").change(function () {
		setSorted($(this).val());
		filter_data(1);
	});

	function setSorted(value) {
		$("#get-sorted").val(value);
		filter_data(value);
	}

	$("#price_range").slider({
		range: true,
		min: 1000,
		max: 1000000,
		values: [1000, 1000000],
		step: 500,
		stop: function (event, ui) {
			$("#price_show").html(
				addCommas(ui.values[0]) + " - " + addCommas(ui.values[1])
			);
			// $("#price_show").html(ui.values[0] + " - " + ui.values[1]);
			$("#hidden_minimum_price").val(ui.values[0]);
			$("#hidden_maximum_price").val(ui.values[1]);
			filter_data(1);
		},
	});
});