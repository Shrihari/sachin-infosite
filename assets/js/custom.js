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
	});

});