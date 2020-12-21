$(window).bind("scroll", function () {
	if ($(window).scrollTop() > 32) {
		$(".nav-header").addClass("shadow-lg");
		$(".nav-header").removeClass("lg:h-32 h:20");
	} else {
		$(".nav-header").removeClass("shadow-lg");
		$(".nav-header").addClass("lg:h-32 h:20");
	}
});
