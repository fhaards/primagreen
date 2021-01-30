$(document).ready(function () {
	function loadingMsg() {
		swal({
			text: "Loading ..",
			buttons: false,
			closeOnClickOutside: false,
			imageWidth: 160,
		});
	}

	$("#isProductTable").on("click", ".delete-products", function () {
		var getId = $(this).data("isidproductdelete");
		swal({
			title: "Are You Sure ?",
			text: "Delete this product ?",
			icon: "warning",
			// buttons: ["Cancel", "Remove"],
			button: {
				text: "Yes, delete it!",
				closeModal: false,
			},
			dangerMode: true,
			closeOnEsc: false,
		}).then(function (isConfirm) {
			if (isConfirm) {
				$.ajax({
					type: "POST",
					url: BASE_URL + "product/product-delete/" + getId,
					dataType: "JSON",
					data: { id: getId },
					beforeSend: function () {
						// loadingMsg();
					},
					success: function (data) {
						swal({
							title: "Deleted",
							text: "Product has successfully deleted",
							icon: "success",
							timer: 3000,
						}).then(function () {
							location.reload();
						});
					},
				});
			} else {
				swal("Cancelled", "Your product is still in table", "error");
			}
		});
	});

	$(".open-features-edit").on("click", function () {
		$("#idFeaturesEdit").val($(this).data("idfeatures"));
		$("#nmFeaturesEdit").val($(this).data("nmfeatures"));

		var getImgFeatures = $(this).data("urlimgfeatures");
		var setUrlImgFeatures = "";
		if (getImgFeatures == "") {
			setUrlImgFeatures = BASE_URL + "uploads/default_img.jpg";
		} else {
			setUrlImgFeatures = BASE_URL + "uploads/features/" + getImgFeatures;
		}
		// console.log(BASE_URL + "uploads/features/" + getImgFeatures);
		$("#baseUrlImgFeatures").val(getImgFeatures);
		$("#loadImgFeatureEdit").attr("src", setUrlImgFeatures);
	});
});
