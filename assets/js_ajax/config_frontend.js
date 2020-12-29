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
            headerNav.classList.add('shadow-md');
        } else {
            headerNav.classList.remove('shadow-md');
        }
		prevScrollpos = currentScrollPos;
	};
});
