$(document).ready(function () {
	function successMsg() {
		swal({
			type: "success",
			buttons: false,
			timer: 1500,
			icon: "success",
		});
	}
	$("#faq-list-tbody").on("click", ".editFaq", function () {
		$("#faqEditId").val($(this).data("faq-id"));
		$("#faqEditQuestion").val($(this).data("faq-question"));
		$("#faqEditAnswer").val($(this).data("faq-answer"));
	});

	$("#faq-list-tbody").on("click", ".deleteFaq", function () {
		var id = $(this).data("faq-delete-id");
		swal({
			title: "Are You Sure ?",
			text: "Remove this question",
			icon: "warning",
			buttons: ["Cancel", "Remove"],
			dangerMode: true,
		}).then(function (isConfirm) {
			if (isConfirm) {
				$.ajax({
					url: BASE_URL + "settings/faq/faq-delete/",
					method: "POST",
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function (data) {
						swal({
							type: "success",
							buttons: false,
							title: "Success",
							text: "the question succesfully removed",
							timer: 1500,
							icon: "success",
						}).then(function () {
							window.location.href = BASE_URL + "settings/faq";
						});
					},
				});
			} else {
				swal("Cancelled", "Cancelled delete question", "error");
			}
		});
	});

	// faqList();
	// $("#faqlist-table").dataTable();
	// function faqList() {
	//     $("#faq-list-tbody").html("<tr><td colspan='4'> Loading , request a data .. </td></tr>");
	//     $.ajax({
	//         type: "ajax",
	//         url: BASE_URL + "settings/faq/faq-list",
	//         async: false,
	//         dataType: "json",
	//         success: function(data) {
	//             var showFaq = "";
	//             var i;
	//             var length = 50;
	//             for (i = 0; i < data.length; i++) {
	//                 showFaq += '<tr id="' +data[i].id_faq +'">';
	//                 showFaq += "<td>" + data[i].question.substring(0, length);+"</td>";
	//                 showFaq += "<td>" + data[i].answer.substring(0, length); +"</td>";
	//                 showFaq += "<td>" + data[i].date_add +"</td>";
	//                 showFaq += "<td>";
	//                 showFaq += "<button class='editfaq' @click='openModalEditFaq' data-faq-id='"+data[i].id_faq+"' data-faq-question='"+data[i].question+"' data-faq-answer='"+data[i].answer+"'>";
	//                 showFaq += "Edit" ;
	//                 showFaq += "</button></td>";
	//                 showFaq += "</tr>";
	//             }
	//             $("#faq-list-tbody").html(showFaq);
	//         },
	//     });
	// }
});
