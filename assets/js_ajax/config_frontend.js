function openSubNav() {
    document.getElementById("sub-nav").style.height = "19rem";
    document.getElementById("header-nav").style.height = "5rem";
}

function initMap() {
    var mapProp = {
        center: new google.maps.LatLng(-6.793285909058999, 107.60184618438252),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("map"), mapProp);
}
// function initMap() {
//     const uluru = {
//         lat: -25.344,
//         lng: 131.036
//     };
//     const map = new google.maps.Map(document.getElementById("map"), {
//         zoom: 4,
//         center: uluru,
//     });
//     const marker = new google.maps.Marker({
//         position: uluru,
//         map: map,
//     });
// }

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
