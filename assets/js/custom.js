$(document).ready(function(){
	
	var s = skrollr.init();

	for (var i = 0; i < 34; i++) 
	{
		$('#image'+i).magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			gallery: {
				enabled: true
			}
		});
	}
	

	$(".image a:not(:first-child)").hide();

	// $('.small-content').hide();

	// $('.small-anchor').hover(function(){
	// 	$(this).siblings('.small-content').stop().fadeIn();
	// }, function(){
	// 	$(this).siblings('.small-content').stop().fadeOut();
	// });
});