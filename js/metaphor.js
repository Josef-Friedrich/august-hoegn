$(function() {
	$(".metaphor .image").animate( {
		backgroundPosition : '0px -50px'
	}, 6000);

	setInterval(function() {
		$(".metaphor .image").animate( {
			backgroundPosition : '0px 0px'
		}, 6000);
		$(".metaphor .image").animate( {
			backgroundPosition : '-100px 0px'
		}, 6000);
		$(".metaphor .image").animate( {
			backgroundPosition : '-100px -50px'
		}, 6000);
		$(".metaphor .image").animate( {
			backgroundPosition : '0px -50px'
		}, 6000);
	}, 3000);
});