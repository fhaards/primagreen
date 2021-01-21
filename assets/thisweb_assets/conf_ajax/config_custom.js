$(document).ready(function () {
	getToken();
	initProvinceAndCity();

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

	// PROFILE PAGES
	$("#change_password").on("click", ".changepw_click", function () {
		var checkBoxes = $(".checkedbox_changepw");
		$(".type_password").toggleClass("hidden");
		checkBoxes.prop("checked", !checkBoxes.prop("checked"));
		checkBoxes.on("click", function () {
			checkBoxes.prop("checked", !checkBoxes.prop("checked"));
		});
	});

	/////////////////////////////// GET PROVINCE ////////////////////////////////////////////
	function getToken() {
		var tmp = null;
		$.ajax({
			async: false,
			type: "get",
			global: false,
			dataType: "json",
			url: "https://x.rajaapi.com/poe",
			success: function (data) {
				tmp = data.token;
			},
		});
		return tmp;
	}

	$("#getProvince").on("change", function () {
		getCity();
		// SEND NAME PROVINCE
		$("#inputProvinceName").val(
			$(this).find(":selected").attr("data-nmprovince")
		);
		$("#getCityHide").show();
	});

	$("#getCity").on("change", function () {
		// SEND NAME CITY
		$("#inputCityName").val($(this).find(":selected").attr("data-nmcity"));
	});

	function getProvince(callback = setProvinceList) {
		$.ajax({
			type: "GET",
			url:
				"https://x.rajaapi.com/MeP7c5ne" + getToken() + "/m/wilayah/provinsi",
			success: function (data) {
				callback(data);
			},
		});
	}

	function initProvinceAndCity() {
		getProvince(initSetProvinceAndCityList);
	}

	function setProvinceList(data) {
		let getProvince = $("#getProvince");
		var data = data.data;
		var options = "";
		for (var i = 0; i < data.length; i++) {
			options +=
				'<option value="' +
				data[i].id +
				'" data-nmprovince="' +
				data[i].name +
				'">' +
				data[i].name +
				"</option>";
		}
		getProvince.append(options);
	}

	function initSetProvinceAndCityList(data) {
		setProvinceList(data);
		var idProvince = $("#getProvince").data("idProvince");
		$("#getProvince").val(idProvince);
		getCity(initSetCityList);
	}

	/////////////////////////////// GET CITY ////////////////////////////////////////////

	function getCity(callback = setCityList) {
		var idProvince = $("#getProvince").val();
		let getCity = $("#getCity");
		$.ajax({
			type: "GET",
			url:
				"https://x.rajaapi.com/MeP7c5ne" +
				getToken() +
				"/m/wilayah/kabupaten?idpropinsi=" +
				idProvince,
			success: function (data) {
				callback(data);
			},
			beforeSend: function () {
				getCity.html(" ");
			},
		});
	}

	function initGetCity() {
		getCity(initSetCityList);
	}

	function setCityList(data) {
		let getCity = $("#getCity");
		var options = "";
		var data = data.data;
		options += ' <option> -- SELECT CITY -- </option>'; 
		for (var i = 0; i < data.length; i++) {
			options +=
				'<option value="' +
				data[i].id +
				'" data-nmcity="' +
				data[i].name +
				'">' +
				data[i].name +
				"</option>";
		}
		getCity.append(options);
	}

	function initSetCityList(data) {
		setCityList(data);
		var idCity = $("#getCity").data("idCity");
		$("#getCity").val(idCity);
	}
});
