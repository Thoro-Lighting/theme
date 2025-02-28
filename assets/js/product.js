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

	initProductDescSwiper()
});

function initProductDescSwiper() {
	const swiperContainer = document.querySelector(
	  '[data-js="swiper-product-desc"]'
	);

	if(!swiperContainer) return;

	new Swiper(swiperContainer, {
		spaceBetween: 10,
		slidesPerView: 1,
		watchSlidesProgress: true,
		enabled: true,
		nextButton: '[data-js="swiper-product-desc"] .swiper-product-button-next',
		prevButton: '[data-js="swiper-product-desc"] .swiper-product-button-prev',
		scrollbar: '[data-js="swiper-product-desc"] .swiper-scrollbar',
	});
  }