$(document).ready(function () {
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
});

// (function (frontendHeader) {
//     let observer = new IntersectionObserver(entries => {
//         if (entries[0].isIntersecting) {
//             frontendHeader.classList.add('is-floating');
//         } else {
//             frontendHeader.classList.remove('is-floating');
//         }
//     }, {
//         threshold: .25
//     });

//     observer.observe(document.querySelector('section'));
// })(document.querySelector('#frontend-header'));
