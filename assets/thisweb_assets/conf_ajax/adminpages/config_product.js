$(document).ready(function () {
	function loadingMsg() {
		swal({
			text: "Loading ..",
			buttons: false,
			closeOnClickOutside: false,
			imageWidth: 160,
		});
	}

	// swal({
	// 	title: 'Now loading',
	// 	allowEscapeKey: false,
	// 	allowOutsideClick: false,
	// 	timer: 2000,
	// 	onOpen: () => {
	// 	  swal.showLoading();
	// 	}
	//   }).then(
	// 	() => {},
	// 	(dismiss) => {
	// 	  if (dismiss === 'timer') {
	// 		console.log('closed by timer!!!!');
	// 		swal({
	// 		  title: 'Finished!',
	// 		  type: 'success',
	// 		  timer: 2000,
	// 		  showConfirmButton: false
	// 		})
	// 	  }
	// 	}
	//   )

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
});
