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
	
	var positions = [0]; // 700, 960, 1320, 1670, 2050, 2420, 2770, 3140, 3510, 3870, 4240, 4600, 4960, 5330, 5690, 6060, 6410];

	for(var i = 1; i < 41; i++)
	{
		positions.push($('#event'+i).offset().top - 250);
	}

	positions.push(15620);

	var cur_pos = 0;

	$(document).keydown(function (evt) {
		if (evt.keyCode == 40) { // down arrow
			if(cur_pos > 40)
				return false;
			else
			{
				$('html, body').animate({scrollTop: positions[++cur_pos]}, '500');
				return false;
			}
		}
	});

	$(document).keydown(function (evt) {

		if (evt.keyCode == 38) { // up arrow

			if(cur_pos < 1)
				return false;
			else
			{
				$('html, body').animate({scrollTop: positions[--cur_pos]}, '500');
				return false;
			}
		}
	});

	$(".image a:not(:first-child)").hide();	


	$('.featured').hide();

	$(window).scroll(function(){
		
		var s = $(window).scrollTop();

		var y = positions.indexOf(s);

		if(y > 0 && y < 41)
			$('#event'+y).fadeIn();
		else
		{
			var y = Math.ceil( (s - 700) / 365 );
			if(y > 0)
				cur_pos = y;
			for(var yi = 1; yi <= y; yi++)
				$('#event'+yi).fadeIn();
		}

		$('#spos').text(s);

		// for(var i = 1; i < 41; i++)
		// {
		// 	positions.push($('#event'+i).offset().top);
		// }

		// switch(s)
		// {
		// 	case 700: $('#event1').fadeIn(); break;
		// 	case 960: $('#event2').fadeIn(); break;
		// 	case 1320: $('#event3').fadeIn(); break;
		// 	case 1670: $('#event4').fadeIn(); break;
		// 	case 2050: $('#event5').fadeIn(); break;
		// 	case 2420: $('#event6').fadeIn(); break;
		// 	case 2770: $('#event7').fadeIn(); break;
		// 	case 3140: $('#event8').fadeIn(); break;
		// 	case 3510: $('#event9').fadeIn(); break;
		// 	case 3870: $('#event10').fadeIn(); break;
		// 	case 4240: $('#event11').fadeIn(); break;
		// 	case 4600: $('#event12').fadeIn(); break;
		// 	case 4960: $('#event13').fadeIn(); break;
		// 	case 5330: $('#event14').fadeIn(); break;
		// 	case 5690: $('#event15').fadeIn(); break;
		// 	case 6060: $('#event16').fadeIn(); break;
		// 	case 6410: $('#event17').fadeIn(); break;
		// 	case 6710: $('#event18').fadeIn(); break;
		// 	case 7060: $('#event19').fadeIn(); break;
		// 	case 7420: $('#event20').fadeIn(); break;
		// 	case 7790: $('#event21').fadeIn(); break;
		// 	case 8160: $('#event22').fadeIn(); break;
		// 	case 8530: $('#event23').fadeIn(); break;
		// 	case 8880: $('#event24').fadeIn(); break;
		// 	// case : $('#event25').fadeIn(); break;
		// 	// case : $('#event26').fadeIn(); break;
		// 	// case : $('#event27').fadeIn(); break;
		// 	// case : $('#event28').fadeIn(); break;
		// 	// case : $('#event29').fadeIn(); break;
		// 	// case : $('#event30').fadeIn(); break;
		// 	// case : $('#event31').fadeIn(); break;
		// 	// case : $('#event32').fadeIn(); break;
		// 	// case : $('#event33').fadeIn(); break;
		// 	// case : $('#event34').fadeIn(); break;
		// 	// case : $('#event35').fadeIn(); break;
		// 	// case : $('#event36').fadeIn(); break;
		// 	// case : $('#event37').fadeIn(); break;
		// 	// case : $('#event38').fadeIn(); break;
		// 	// case : $('#event39').fadeIn(); break;
		// 	// case : $('#event40').fadeIn(); break;
		// }
	});

	// $('.small-content').hide();

	// $('.small-anchor').hover(function(){
	// 	$(this).siblings('.small-content').stop().fadeIn();
	// }, function(){
	// 	$(this).siblings('.small-content').stop().fadeOut();
	// });
});