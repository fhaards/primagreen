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

function successAddToCartMsg() {
	swal({
		type: "success",
		title: "Success",
		text: "Add items to Cart",
		buttons: false,
		timer: 1500,
		icon: "success",
	});
}

function successMsg() {
	swal({
		type: "success",
		buttons: false,
		timer: 1500,
		icon: "success",
	});
}

function loadMsg() {
	swal({
		text: "loading ..",
		buttons: false,
		allowOutsideClick: false,
		imageWidth: 160,
	});
}
