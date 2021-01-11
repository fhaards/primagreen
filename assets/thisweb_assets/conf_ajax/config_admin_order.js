$(document).ready(function () {
	$(".openmodal-csorder").on("click", function () {
		$("#no_order_pemesanan_modal_input").val($(this).data("nopemesanans"));
		$("#no_order_pemesanan_modal").html($(this).data("nopemesanans"));
	});
});


// const tabs = document.querySelectorAll(".tabs");
// const tab = document.querySelectorAll(".tab");
// const panel = document.querySelectorAll(".tab-content");

// function onTabClick(event) {
// 	// deactivate existing active tabs and panel

// 	for (let i = 0; i < tab.length; i++) {
// 		tab[i].classList.remove("active","border-blue-500");
// 	}

// 	for (let i = 0; i < panel.length; i++) {
// 		panel[i].classList.remove("active","border-blue-500");
// 	}

// 	// activate new tabs and panel
// 	event.target.classList.add("active");
// 	let classString = event.target.getAttribute("data-target");
// 	console.log(classString);
// 	document
// 		.getElementById("panels")
// 		.getElementsByClassName(classString)[0]
// 		.classList.add("active");
// }

// for (let i = 0; i < tab.length; i++) {
// 	tab[i].addEventListener("click", onTabClick, false);
// }