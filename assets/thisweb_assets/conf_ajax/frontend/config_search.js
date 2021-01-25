$(document).ready(function () {
	$("#searchModal")
		.on("keyup", ".searchKey", function () {
			$("#mainSearch").removeClass("hidden");
			$("#mainSearch").addClass("border-t-2");
			var val = $(this).val();
			if (val.length != 0) {
				$.ajax({
					url: BASE_URL + "search",
					type: "POST",
					dataType: "json",
					data: { key: val },
					beforeSend: function () {
						$("#loadingSearch").show();
						$("#searchResultProducts").html("");
					},
					success: function (data) {
						var searchResultProducts = "";
						var getProductUrl = "";
						var i;
						searchResultProducts += '<div class="flex flex-col">';
						if (data == false) {
							searchResultProducts +=
								"<div class='py-5 mx-auto font-semibold text-gray-500'>Ops, Result Not Found. Try other words </div>";
						} else {
							searchResultProducts +=
								'<h1 class="text-gray-600 font-bold"> Result by name '+val+'</h1>';
							searchResultProducts +=
								'<div class="grid gid-cols-3 w-full">';
							searchResultProducts +=
								'<div class="grid gap-5 md:grid-cols-5 grid-flow-col auto-rows-max overflow-x-scroll py-4">';
							for (i = 0; i < data.length; i++) {
								getProductUrl = BASE_URL + "store/product-list/detail/" + data[i].id_barang + "/" + data[i].nm_barang;
								searchResultProducts += '<a href="' + getProductUrl + '" class="flex flex-col overflow-y-auto max-h-48 rounded-md w-48 md:w-full py-2 px-4 my-1 border-2 hover:border-gray-800 border-gray-200 hover:bg-gray-50 transition duration-300 ease-in-out">';
								searchResultProducts += '<div class="flex flex-col h-12">';
								searchResultProducts += '<h1 class="font-bold text-gray-700">' + data[i].nm_barang + '</h1>';
								searchResultProducts += '<p class="md:block hidden font-semibold text-gray-500 -mt-1 text-xs">' + data[i].nm_barang_bot +'</p>';
								searchResultProducts += '</div>';
								// searchResultProducts += '<div class="text-xs">'+addCommas(data[i].harga)+'</div>';
								searchResultProducts += "</a>";
							}
							searchResultProducts += "</div>";
							searchResultProducts += "</div>";
						}
						searchResultProducts += "</div>";
						$("#loadingSearch").fadeOut(function () {
							$("#searchResultProducts").html(searchResultProducts);
						});
					},
					error: function () {
						$("#loadingSearch").show();
					},
				});
			} else {
				$("#mainSearch").addClass("hidden");
			}
		})
		.on("keydown", ".searchKey", function () {
			// $("#mainSearch").addClass("hidden");
		});

});
