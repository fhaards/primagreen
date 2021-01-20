function openSubNav() {
	document.getElementById("sub-nav").style.height = "19rem";
	document.getElementById("header-nav").style.height = "5rem";
}

function closeSubNav() {
	document.getElementById("sub-nav").style.height = "0%";
}

function openThisCart(index) {
	var thiscart = document.getElementById("this_items_" + index);
	thiscart.classList.remove("lg:hidden");
}

function closeThisCart(index) {
	var thiscart = document.getElementById("this_items_" + index);
	thiscart.classList.add("lg:hidden");
}

function openThisFaq(index) {
	var thiscart = document.getElementById("this_faq_" + index);
	thiscart.classList.toggle("hidden");
}

function detailImage(imgs) {
	var expandImg = document.getElementById("expandedImg");
	expandImg.src = imgs.src;
	expandImg.parentElement.style.display = "block";
}

document.addEventListener("DOMContentLoaded", function (event) {
	var prevScrollpos = window.pageYOffset;
	window.onscroll = function () {
		var currentScrollPos = window.pageYOffset;
		var headerNav = document.getElementById("header-nav");
		if (prevScrollpos > 32) {
			headerNav.classList.add("shadow-md");
		} else {
			headerNav.classList.remove("shadow-md");
		}
		prevScrollpos = currentScrollPos;
	};
});
