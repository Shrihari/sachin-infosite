$(document).ready(function(){
	
	var s = skrollr.init();
	
	$('#image1').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			}
		}
	});

	$(".image a:not(:first-child)").hide();

	// $('.small-content').hide();

	// $('.small-anchor').hover(function(){
	// 	$(this).siblings('.small-content').stop().fadeIn();
	// }, function(){
	// 	$(this).siblings('.small-content').stop().fadeOut();
	// });
});