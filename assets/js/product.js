jQuery(document).ready(function($) {
	

	$(document).on('click', '.usefulness_btn', function(e) {
		e.preventDefault();
		let a = $(this);

		jQuery.post(
			'/module/eprestatools/vote', 
			{
				id: a.data('id'),
				vote: a.find('.fto-thumbs-up').length ? 1 : 0
			}, 
			function(json) {
				a.find('span').text('(' + json.count + ')');
				if ( json.message ) alert(json.message);
			}
		)
	});

	$(document).on('click', '[href*="#comments"]', function(e) {
		e.preventDefault();

		$('body, html').stop(true, true).animate({
			scrollTop: $('#comments').offset().top - 200
		});
	});

	$(document).on('click', '.short-box .change-box', function(e) {
		e.preventDefault();

		let obj = jQuery(this).parents('.short-box');
		if ( obj.hasClass('warm') ) {
			obj.removeClass('warm').addClass('cold');
		} else {
			obj.removeClass('cold').addClass('warm');
		}
	});


});