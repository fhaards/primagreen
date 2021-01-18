function openSubNav() {
    document.getElementById("sub-nav").style.height = "19rem";
    document.getElementById("header-nav").style.height = "5rem";
}

function closeSubNav() {
	document.getElementById("sub-nav").style.height = "0%";
}

function openThisCart(index){
    var thiscart = document.getElementById("this_items_"+index);
    thiscart.classList.remove("lg:hidden");
}

function closeThisCart(index){
    var thiscart = document.getElementById("this_items_"+index);
    thiscart.classList.add("lg:hidden");
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
// function initMap() {
//     var mapProp = {
//         center: new google.maps.LatLng(-6.793285909058999, 107.60184618438252),
//         zoom: 5,
//     };
//     var map = new google.maps.Map(document.getElementById("map"), mapProp);
// }