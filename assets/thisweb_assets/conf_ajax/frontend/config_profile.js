$(document).ready(function () {
	getToken();
	initProvinceAndCity();
	initCityAndDistricts();

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

	$("#thisCity").on("change", ".getProvince", function () {
		getCity();
		// SEND NAME PROVINCE
		$("#inputProvinceName").val(
			$(this).find(":selected").attr("data-nmprovince")
        );
        showHideGetCity();
    });
    
    function showHideGetCity(){
        if ($("#inputProvinceName").val() == "0") {
            $("#getCityHide").hide();
            $("#getSubDistrictsHide").hide();
		} else {
			$("#getCityHide").show();
		}
    }

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
		options += ' <option data-nmprovince="0"> -- SELECT PROVINCE -- </option>';
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

	$("#getCity").on("change", function () {
		getSubDistricts();
		// SEND NAME CITY
		$("#inputCityName").val($(this).find(":selected").attr("data-nmcity"));
		if ($("#inputCityName").val() == "0") {
			$("#getSubDistrictsHide").hide();
		} else {
			$("#getSubDistrictsHide").show();
		}
	});

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

	function initCityAndDistricts() {
		getCity(initSetCityList);
	}

	function setCityList(data) {
		let getCity = $("#getCity");
		var options = "";
		var data = data.data;
		options += ' <option data-nmcity="0"> -- SELECT CITY -- </option>';
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
		getSubDistricts(initSetSubDistrictsList);
	}

	/////////////////////////////// GET SUBDISTRICTS ////////////////////////////////////////////

	$("#getSubDistricts").on("change", function () {
		// SEND NAME CITY
		$("#inputSubDistrictsName").val(
			$(this).find(":selected").attr("data-nmsubdistricts")
		);
		if ($("#inputSubDistrictsName").val() == "0") {
			$("#submitEditAddress").hide();
		} else {
			$("#submitEditAddress").show();
		}
	});

	function getSubDistricts(callback = setSubDistrictsList) {
		var idCity = $("#getCity").val();
		let getSubDistricts = $("#getSubDistricts");
		$.ajax({
			type: "GET",
			url:
				"https://x.rajaapi.com/MeP7c5ne" +
				getToken() +
				"/m/wilayah/kecamatan?idkabupaten=" +
				idCity,
			success: function (data) {
				callback(data);
			},
			beforeSend: function () {
				getSubDistricts.html(" ");
			},
		});
	}

	// function initGetSubDistricts() {
	// 	getSubDistricts(initSetSubDistrictsList);
	// }

	function setSubDistrictsList(data) {
		let getSubDistricts = $("#getSubDistricts");
		var options = "";
		var data = data.data;
		options +=
			'<option data-nmsubdistricts="0"> -- SELECT SUB DISTRICTS -- </option>';
		for (var i = 0; i < data.length; i++) {
			options +=
				'<option value="' +
				data[i].id +
				'" data-nmsubdistricts="' +
				data[i].name +
				'">' +
				data[i].name +
				"</option>";
		}
		getSubDistricts.append(options);
	}

	function initSetSubDistrictsList(data) {
		setSubDistrictsList(data);
		var idSubDistricts = $("#getSubDistricts").data("idSubDistricts");
		$("#getSubDistricts").val(idSubDistricts);
	}
});
