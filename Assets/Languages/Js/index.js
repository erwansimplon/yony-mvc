$(document).ready(function(){
		var slider3 = new jsSlide({
		id: 'sliderImg',
		autoplay: true,
		timingFunction: 'ease-in-out',
		duration: 3000,
		intervalTiming: 6000
	});
	
	$(".nav li").mouseover(function () {
		$(this).siblings().addClass("fade");
	}).mouseout(function () {
		$(this).siblings().removeClass("fade");
	});
	
	$(".menu-collapsed").click(function() {
		$(this).toggleClass("menu-expanded");
	});
});