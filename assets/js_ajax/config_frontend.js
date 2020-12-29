function openSubNav() {
    document.getElementById("sub-nav").style.height = "19rem";
    document.getElementById("header-nav").style.height = "5rem";
}

function closeSubNav() {
	document.getElementById("sub-nav").style.height = "0%";
}

document.addEventListener("DOMContentLoaded", function (event) {
    var prevScrollpos = window.pageYOffset;
	window.onscroll = function () {
        var currentScrollPos = window.pageYOffset;
        var headerNav = document.getElementById("header-nav");
		if(prevScrollpos > 32){
            headerNav.classList.add('border-b','border-gray-300');
        } else {
            headerNav.classList.remove('border-b','border-gray-300');
        }
		prevScrollpos = currentScrollPos;
	};
});
