$(window).bind("scroll", function () {
	if ($(window).scrollTop() > 32) {
		$(".nav-header").addClass("shadow-sm");
		$(".nav-header").removeClass("h-32");
	} else {
		$(".nav-header").removeClass("shadow-sm");
		$(".nav-header").addClass("h-32");
	}
});
