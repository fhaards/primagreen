function openSubNav() {
	document.getElementById("sub-nav").style.height = "19rem";
	document.getElementById("header-nav").style.height = "5rem";
}

function closeSubNav() {
	document.getElementById("sub-nav").style.height = "0%";
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

function searchingClick() {
	var searching = document.getElementById("searching");
	var mainSearch = document.getElementById("mainSearch");
	searching.classList.remove("sm:rounded-full");
	mainSearch.classList.remove("hidden");
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

		// if (prevScrollpos > 300) {
		// 	if (prevScrollpos > currentScrollPos) {
		// 		headerNav.style.top = "0";
		// 	} else {
		// 		headerNav.style.top = "-150px";
		// 	}
		// }

		prevScrollpos = currentScrollPos;
	};
});

/* 
function openThisCart(index) {
	var thiscart = document.getElementById("this_items_" + index);
	thiscart.classList.remove("lg:hidden");
}

function closeThisCart(index) {
	var thiscart = document.getElementById("this_items_" + index);
	thiscart.classList.add("lg:hidden");
}
*/
