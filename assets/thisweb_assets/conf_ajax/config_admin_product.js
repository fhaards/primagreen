// $(document).ready(function () {

	// filter_data(1);

	// function filter_data(page) {
	// 	var action = "fetch_data";
	// 	var type = get_filter("type");

	// 	$(".filter_data").html("<tr><td>loading .. </td></tr>");
	// 	$.ajax({
	// 		url: BASE_URL + "product/product-list/" + page,
	// 		method: "POST",
	// 		dataType: "JSON",
	// 		data: {
	// 			action: action,
	// 			type: type,
	// 		},
	// 		success: function (data) {
	// 			$(".filter_data").html(data.product_list);
	// 		},
	// 	});
	// }

	// function get_filter(class_name) {
	// 	var filter = [];
	// 	$("." + class_name + ":checked").each(function () {
	// 		filter.push($(this).val());
	// 	});
	// 	return filter;
	// }

	// $(".common_selector").click(function () {
	// 	filter_data(1);
	// });
// });
