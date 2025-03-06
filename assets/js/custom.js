/*
 * Custom code goes here.
 * A template should always ship with an empty custom.js
 */

(function () {

  var _self = this;

  _self.verify = function(element) {
    var name = element.attr('name'), val=element.val(), required=element.prop('required');
    if ( required && !val ) return false;
    if( !val ) return true;
    switch(name){
      case 'email':
        return /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z]{2,63}$/.test(val);
      break;
      case 'phone':
        return /^[\(\)\s\-\+\d\.x\#]{5,20}$/.test(val);
      break;
      case 'firstname':
      case 'lastname':
        return /^[^0-9!<>,;?=+()@#"°{}_$%:¤|]*$/.test(val);
      case 'password':
      case 'new_password':
        return /^.{5,}$/.test(val);
      break;
    }
    return true;
  }

  _self.summary_sticky = function() {
    var $obj = $('#module-steasycheckout-default #summary_sticky');
    if ( !$obj.length ) return;
    if ( $(window).width() < 992 ) return;

    var $content = $('#content .col-lg-8 .steco_column');

    $(window).on('scroll', function() {
      $obj.css('margin-top', 0);

      var margin = Math.max(jQuery(window).scrollTop() + $('.st_mega_menu_container').outerHeight() - $obj.offset().top, 0);
      margin = Math.min(margin, $content.offset().top + $content.outerHeight() - $obj.offset().top - $obj.outerHeight() - $('.st_mega_menu_container').outerHeight());

      $obj.css('margin-top', Math.max(margin, 0));

      $obj.toggleClass('has-sticky', margin > 0);
    });
  }

  _self.home_tabs = function() {
  	$('.nav-link').each(function() {
      var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
          if (mutation.attributeName === "class") {
            var attributeValue = $(mutation.target).prop(mutation.attributeName);
            if ( attributeValue.search(/active/) != -1 ) {
              var $header = $($(mutation.target).attr('href') + '-t');
              $header.siblings('.nav-header').removeClass('active');
              $header.addClass('active');

              $header.parents('.pc_slider_block_container').first().attr('data-tab', $(mutation.target).attr('href').replace('#', ''));
            }
          }
        });
      });
      observer.observe(this, {
        attributes: true
      });
    });

    _self.facets_classes = function() {
      var has_something = false;
      jQuery('#search_filters .facet').each(function(i, v) {
        if ( jQuery(v).find('input[checked], option[selected], .checkbox-inline.active').length ) {
          jQuery(v).addClass('active');
          has_something = true;
        } else if ( jQuery(v).find('.st-range').length ) {
          var $range = jQuery(v).find('.st-range');
          if ( parseFloat($range.data('min')) != parseFloat($range.data('lower')) || parseFloat($range.data('max')) != parseFloat($range.data('upper')) ) {
            jQuery(v).addClass('active');
            has_something = true;
          }
        }
      });

      if ( has_something || jQuery('#main .js-search-filters-clear-all').length ) {
        jQuery('#search_filters').addClass('active');
        jQuery('.hide_filter_page').addClass('filter-active');
      } else {
        jQuery('.hide_filter_page').removeClass('filter-active');
      }
    }

    _self.facets_js = function() {
    }

    _self.product_updated = function() {
      $('.product-information .product-reference').toggle($.trim($('.product-information .product-reference .pro_extra_info_content').text()) != '');
      $('.prod_weight').toggle(parseInt($.trim($('.prod_weight span').text())) > 0);
    }

    _self.product_fixed_add_to_cart = function() {
      let $div = $('.product_first_section');
      if ( !$div.length ) return;

      let top = jQuery(window).scrollTop();
      let $trigger = $('#container_sticky_cart_all');

      if ( top > $trigger.offset().top + $trigger.height() ) {
        if ( !$('body').hasClass('show-fixed-add-to-cart') ) {
          $div.css('height', $div.height());
          $('body').addClass('show-fixed-add-to-cart');
          $('.sticky-box').addClass('container flex_container');
          
        }
      } else {
        $div.removeAttr('style');
        $('body').removeClass('show-fixed-add-to-cart');
        $('.sticky-box').removeClass('container flex_container');
        
      }
    }
  	
  }

  _self.product_tabs_column = function () {
	    let $tabs = $("#product .tabs-sticky .nav-tabs .nav-link");
	    if ($tabs.length == 0) return;

	    let $contents = $("#product .tabs-sticky .tab-content > div");
	    let $title = $(".title_block").first();

	    $tabs
	      .on("click", function (e) {
	        e.stopPropagation();
	        e.preventDefault();

	       $contents = $("#product .tabs-sticky .tab-content > div");
	        let $tab = $(this);

	        $("body, html").animate({
	          scrollTop: $contents.eq($tabs.index($tab)).offset().top - 160,
	        });
	      })
	      .each(function () {
	        let $tab = $(this);

	        let $header = $title.clone();
	                 
	      });

	    $contents.show();
	  };

    _self.mobile_product_top_sticky = function() {
      let $div = $('body.mobile_device #js-product-list-top');
      if ( $div.length == 0 ) return;

      let scroll = $(window).scrollTop();
      let top = $div.parent().offset().top;
      let header = $('#mobile_bar').height();

      if ( scroll > 0 && scroll + header > top && $div.is(':visible') ) {
        $div.parent().css('padding-top', $div.height());
        $div.css({
          position: 'fixed',
          top: header + 'px',
          zIndex: 5
        }).addClass('is-sticky');

      } else {
        $div.removeAttr('style').removeClass('is-sticky');
        $div.parent().removeAttr('style');
      }
    }

	  _self.product_tabs_column_sticky = function() {
	    let $div = $('.tabs-sticky .nav-tabs, .manufacturer-sticky');
	    if ( $div.length == 0 ) return;
	    
	    let scroll = $(window).scrollTop();
	    let top = $div.parent().offset().top;
	    let header = $('#st_header').height() + $('#mobile_bar').height();

	    $div.find('.nav-link, .short_list .btn-line').removeClass('active');

	    if ( scroll > 0 && scroll + header > top && $div.is(':visible') ) {
      //  $div.parent().css('padding-top', $div.height());
	      $div.css({
	        position: 'fixed',
	        top: header + 'px',
	        zIndex: 100
	      }).addClass('is-sticky');

	      $div.find('.nav-link, .short_list .btn-line').each(function() {
	        let $section = $($(this).attr('href'));

	        if ( $section.offset().top < scroll + header + $div.height() && $section.offset().top + $section.height() > scroll + header + $div.height() ) {
	          $(this).addClass('active');
	        }
	      })
	    } else {
	      $div.removeAttr('style').removeClass('is-sticky');
	      $div.parent().removeAttr('style');

        $div.find('.nav-link, .short_list .btn-line').first().addClass('active');
	    }
	  }
	  
	  _self.product_left_content_sticky = function() {
		    let div = $('.left-sticky');
		    if ( div.length == 0 ) return;

		    let column = div.parent().parent();
		    
		    let scroll = $(window).scrollTop();
		    
		    let top = Math.min(Math.max(scroll - column.offset().top, 0), column.height() - div.height());

		    div.parent().css('position', 'relative');
		    $('.product_left_column').addClass('image-sticky');

		    if ( top > 0 && $('.product_left_column').offset().top == $('.box-right').offset().top ) {
		      div.stop(true, true).animate({
		        position: 'absolute',
		        top: top + 50,
		        left: 0
		      });
		      
		      $('.product_left_column').addClass('image-sticky');
        
		    } else {
		      div.stop(true, true).css({
		        position: 'relative',
		        top: 0,
		        left: 0
		      });
		      
		      $('.product_left_column').removeClass('image-sticky');
		    }
		  }
	  

    _self.filter_count_set = function(qty) {
      let dom = jQuery('.filter_count');
      dom.html(qty + '<span class="count_name">' + _self.odmien(qty, dom.data('one'), dom.data('two'), dom.data('five')) + '</span>');
    }

    _self.search_placeholder = function() {
      let obj = jQuery('.search_widget_text');
      let txt = obj.attr('placeholder');
      let timeOut;
      let txtLen = txt.length;
      let char = 0;
      obj.attr('placeholder', '|');
      (function typeIt() {
          timeOut = setTimeout(function () {
              char++;
              let type = txt.substring(0, char);
              obj.attr('placeholder', type + '|');
              typeIt();

              if (char == txtLen) {
                  obj.attr('placeholder', obj.attr('placeholder').slice(0, -1)) // remove the '|'
                  clearTimeout(timeOut);

                  setTimeout(function() {
                    char = 0;
                    obj.attr('placeholder', '|');
                    typeIt();
                  }, Math.round(Math.random() * (6000 - 2000)) + 2000)
              }

          }, Math.round(Math.random() * (200 - 30)) + 30);
      }());
    }

    _self.odmien = function(qty, one, two, five) {
      if (qty == 1) return one;
      qty = qty % 100;

      if ( jQuery.inArray(qty % 10, [2,3,4]) != -1 && jQuery.inArray(qty % 10, [12,13,14]) == -1 ) return two;
      return five;
  }

	  

  $(document).on('input blur','.form-group input, .form-group select, .form-group textarea', function(){
      $(this).closest('.form-group').toggleClass('st-has-error', !_self.verify($(this)));
      $(this).closest('.form-group').toggleClass('st-not-empty', $(this).val() != '');
      $(this).closest('.form-group').toggleClass('st-is-empty', $(this).val() == '');
  });

  $(document).on('click','.animation_placeholder .form-control-placeholder', function(){
      $(this).prev('.form-control').focus();
  });

  jQuery(document).ready(function($) {
    _self.home_tabs();
    _self.facets_classes();
    _self.facets_js();
    _self.product_updated();
    _self.product_fixed_add_to_cart();
    _self.product_tabs_column();
    _self.product_tabs_column_sticky();
    _self.mobile_product_top_sticky();
    _self.search_placeholder();
    _self.product_left_content_sticky();


    $(window).on('scroll', function() {
      _self.product_fixed_add_to_cart();
      _self.product_tabs_column_sticky();
      _self.mobile_product_top_sticky();
      _self.product_left_content_sticky();
    });
    
    prestashop.on('stUpdateCart', function(t) {
        if ( typeof t.resp != 'undefined' ) {
          jQuery.each(t.resp.cart.products, function(i, v) {
              jQuery('[data-id-product="' + v.id_product + '"] [data-q]').attr('data-q', Math.max(v.stock_quantity - v.quantity)).find('em').text(Math.max(v.stock_quantity - v.quantity));
          });
        }

          if ( t.reason.linkAction == 'delete-from-cart' ) {
            var $q = jQuery('[data-id-product="' + t.reason.idProduct + '"] [data-q]');
            $q.attr('data-q', $q.data('iq')).find('em').text($q.data('iq'));
          }
      });
    

    prestashop.on('updateProductList', function(t) {
      if ( t.pagination.current_page == 1 )  
        jQuery('.one_page_desc').show();
      else
        jQuery('.one_page_desc').hide();
      
      custom_swiper_options_init();

      _self.filter_count_set(t.pagination.total_items);
      _self.facets_classes();
      _self.facets_js();

      if ( !$('#js-product-list-top').isInViewport() ) {
        $('body, html').animate({
          scrollTop: 0
        });
      }

      if ( t.seo != 'undefined' ) {
          $('title').text(t.seo.meta_title);
          $('meta[name="robots"]').attr('content', ( t.seo.index ? 'index' : 'noindex' ) + ',follow');
          $('meta[name="description"]').attr('content', t.seo.meta_description);
          $('link[rel="canonical"]').attr('href', t.seo.canonical);
          $('[data-ish]').text(t.seo.header);
      }

      setTimeout(function() {
        $('.hide_filter_page').toggleClass('filter-active', $('.active_filters').length > 0);
      }, 10)
    });

    prestashop.on('updatedProduct', function(t) {
        $('.prod_weight span').text(t.product_weight);
        $('.product-reference .pro_extra_info_content').text(t.product_reference);

        _self.product_updated();
    });

    if ( jQuery('.product_count[data-total]').length ) {
      _self.filter_count_set(jQuery('.product_count[data-total]').data('total'));
    } else {
      _self.filter_count_set(jQuery('.product_list_item').length);
    }


    
    $(document).on('click', '.more_filtr', function(){
      $(this).closest('.facet_filter_box').toggleClass('show-more-filtr');
    });
    
    
    $(document).on('click', '.more_category', function(){
        $('.category-sub-menu li').removeClass('category-more');
        $('.more_category').hide();
        
      });

    jQuery('.category-sub-menu .current_cate').each(function() {
        jQuery(this).parents('li[data-depth]').addClass('current_parent');
        jQuery(this).parents('div.zonedepth').addClass('show');
    })

    $('li.current_parent > .acc_header').children('.acc_icon').removeClass('collapsed');

    var observer = new MutationObserver(function(mutations) {
		mutations.forEach(function(mutation) {
			if (mutation.attributeName === "class") {
				var attributeValue = $(mutation.target).prop(mutation.attributeName);
				
				$('.menu_blur.color-bg').toggleClass('blur_effect', attributeValue.search('open') != -1);
				$('.menu_blur').toggleClass('blur_effect', attributeValue.search('open') != -1);
				$('#st-container').toggleClass('mobile_search', attributeValue.search('sidebar_opened') != -1);
			}

			if (mutation.attributeName === "style") {
				var attributeValue = $(mutation.target).prop(mutation.attributeName);

				$('.menu_blur.color-bg').toggleClass('blur_effect', attributeValue.display != 'none');
				$('.menu_blur').toggleClass('blur_effect', attributeValue.display != 'none');
			}
		});
	});

	$('#st_header .dropdown_wrap, .autocomplete-suggestions, #side_search').each(function() {
		observer.observe(jQuery(this)[0], {
			attributes: true
		});
	})
	
	 jQuery(document).on('click', '.open-sidebar', function() {
	      jQuery('#st-container').toggleClass('sidebar_plus', jQuery(this).hasClass('active'));
	    })



	   observer = new MutationObserver(function(mutations) {
	      mutations.forEach(function(mutation) {
	      if (mutation.attributeName === "class") {
	        var attributeValue = $(mutation.target).prop(mutation.attributeName);
	        if ( attributeValue.search('open_bar_right') == -1 ) jQuery('#st-container').removeClass('sidebar_plus');
	        }
	      });
	    });
	    observer.observe(jQuery('#st-container')[0], {
	      attributes: true
	    });
	   
	  });


  jQuery(window).on('load', function() {
    _self.summary_sticky();  
  });
  
  

	$(window).on('scroll', function() {
		product_fixed_add_to_cart();
	});

	$(document).on('click', '.fixed_add_animation', function(e){
		e.preventDefault();


		$('.product_first_section').removeAttr('style');
	    $('body').removeClass('show-fixed-add-to-cart');
	    $('#add-to-cart-or-refresh').removeClass('flex_container container');

		$('body, html').animate({
			scrollTop: $('.product-actions').offset().top +140
		});
	});
	
	
	 $(document).on('click', '.show_category .more-desc', function(e) {
	      e.preventDefault();

	      $('body, html').stop(true, true).animate({
	        scrollTop: $('.desc-bottom').offset().top - 80
	      });
	    }
	  );
	 
	 
  
  var position = $(window).scrollTop();
  if ($(window).width() < 991 ) {
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll > position) {
    	$('body').addClass('sticky-top');
    } else {
    	$('body').removeClass('sticky-top');
    }
    position = scroll;
  });
  }



  jQuery.fn.isInViewport = function() {
      var elementTop = $(this).offset().top;
      var elementBottom = elementTop + $(this).outerHeight();

      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();

      return elementBottom > viewportTop && elementTop < viewportBottom;
  };

  $(document).on('click', '[data-link-action="remove-from-cart"], [data-link-action="delete-from-cart"]', function(e){
    e.preventDefault();

    let id = jQuery(this).attr('href').match(/id_product=([0-9]+)/)[1];
    let name = jQuery(this).parents('.flex_container').first().find('.product-name').text();
    let price = jQuery(this).parents('.small_cart_info').first().find('.mini-cart-price-gt, .mini_price').text().replace(/\s/g, '').match(/[0-9,]+/)[0].replace(',', '.');
    let qty = jQuery(this).parents('.small_cart_info').first().find('.cart_quantity').val();
    if ( !qty ) qty = parseInt(jQuery(this).parents('.small_cart_info').first().find('.product-quantity').text());

    dataLayer.push({ ecommerce: null });
      dataLayer.push({
        event: 'remove_from_cart',
        ecommerce: {
          currency: 'PLN',
          value: price * qty,
          items: [
        {
          item_id: id,
          item_name: name,
          currency: 'PLN',
          index: 0,
          price: price,
          quantity: qty
        }
      ]
        }
      });
  });

  initAppVideoPlay()
  checkMobileSystem()
  initConfiguratorVideoModal()
  initMobileSubMenu()
  initDesktopSubmenuToggle()
  initTilesDefaultSwiper()
  initBasicSwiper()

}());



function custom_swiper_options_init() {
 function t(t) {
      (void 0 === swiper_options[t].autoplayDisableOnInteraction || swiper_options[t].autoplayDisableOnInteraction) && e(t)
  }

  function e(t) {
      clearTimeout(r[t]), s[t] = !0, $(swiper_options[t].id_st + " .swiper_custom_bar").hide()
  }

  function i(t) {
      if (clearTimeout(r[t]), s[t]) return !1;
      a[t] = 0, o[t] = !1, r[t] = setInterval(function() {
          !1 === o[t] ? (a[t] += 1e3 / swiper_options[t].bar_time, $(swiper_options[t].id_st + " .swiper_custom_bar").css({
              width: a[t] + "%"
          }), a[t] >= 100 && (clearTimeout(r[t]), void 0 !== swiper_options[t].autoplay && swiper_options[t].autoplay || n[t].slideNext())) : (a[t] = 0, (void 0 === swiper_options[t].autoplayDisableOnInteraction || swiper_options[t].autoplayDisableOnInteraction) && clearTimeout(r[t]))
      }, 10)
  }
  var n = [],
      a = [],
      o = [],
      r = [],
      s = [];
  "undefined" != typeof swiper_options && swiper_options.length && $.each(swiper_options, function(a, r) {
      if (void 0 === r.st_inited) {
          var s = $.extend({}, r);
          void 0 !== s.st_full_screen && s.st_full_screen && $(window).height() > s.st_height && $(r.id_st).height($(window).height()), n[a] = new Swiper(r.id_st, s), swiper_options[a].st_inited = !0, void 0 !== s.custom_progress_bar && (i(a), n[a].on("slideChangeStart", function(t) {
              i(a)
          }), n[a].on("touchStart", function(e) {
              o[a] = !0, t(a)
          }), n[a].on("touchEnd", function(t) {
              o[a] = !1
          }), n[a].on("autoplayStop", function(t) {
              e(a)
          }))
      }
  })


  if(typeof(stowlcarousel_array)!=='undefined' && stowlcarousel_array.length)
{
  $.each(stowlcarousel_array, function(key, value){
      if(value)
      {
          if(typeof(value.progress_bar)!=='undefined' && value.progress_bar)
          {
              value.afterInit = st_owl_progressBar_init;
              value.afterMove = st_owl_moved;
              value.startDragging = st_owl_pauseOnDragging;
          }
          $("#st_owl_carousel-"+key).owlCarousel(value);
      }
  });
}
}

function initAppVideoPlay(){
  const videoContainer = document.querySelector(".app-how__video");
  if (!videoContainer) return
  
  const playBtn = document.querySelector(".app-how__video-cover");
  const videoEl = document.querySelector("video");
  playBtn.addEventListener("click", () => {
    videoContainer.classList.add("playing");
    videoEl.play();
  });
} 

function checkMobileSystem(){
  const userAgent = window.navigator.userAgent;
  const isIOS = /iPhone|iPad|iPod/i.test(userAgent);
  const isAndroid = /Android/i.test(userAgent);

  if (isIOS) {
    document.body.classList.add('is-ios');
  } else if (isAndroid) {
    document.body.classList.add('is-android');
  }
}

function initConfiguratorVideoModal(){
  const videoModal = document.querySelector(".modal-video");
  if (!videoModal) return

  const playBtn = document.querySelector(".app-how__video-cover");
  const videoEl = videoModal.querySelector('video')

  playBtn.addEventListener("click", () => {
    videoModal.classList.add("active");
    videoEl.play();
  });

  videoModal.addEventListener("click", (e) => {
    if (e.target != videoEl) {
      videoModal.classList.remove("active");
      videoEl.pause()
      videoEl.currentTime = 0;
    }
  });

}

function initMobileSubMenu() {
  const sidemenuButtons = document.querySelectorAll('[data-js-sidemenu-btn]');

  sidemenuButtons.forEach(btn => {
    const parent = btn.parentElement;
    const id = btn.getAttribute('data-js-sidemenu-btn');
    const sidemenu = parent.querySelector(`[data-js-sidemenu="${id}"]`);
    if(!sidemenu) return
    
    const sidemenuCloseButton = sidemenu.querySelector('[data-js-sidemenu-close]');

    btn.addEventListener('click', function() {
      sidemenu.classList.add('active'); 
    });

    sidemenuCloseButton.addEventListener('click', function() {
      sidemenu.classList.remove('active');
    });
  });
}

function initDesktopSubmenuToggle() {
  const tabButtons = document.querySelectorAll('[data-js-tab-btn]');

  tabButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      
      document.querySelectorAll('[data-js-tab-btn]').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('[data-js-tab]').forEach(t => t.classList.remove('active'));

      btn.classList.add('active');

      const tabId = btn.getAttribute('data-js-tab-btn');
      const tab = document.querySelector(`[data-js-tab="${tabId}"]`);
      if (tab) tab.classList.add('active');
    });
  });
}

function initTilesDefaultSwiper() {
	const swiperContainers = document.querySelectorAll(
	  '[data-js="swiper-tiles-default"]'
	);
	
	if(!swiperContainers) return;

  swiperContainers.forEach(el => 
    new Swiper(el, {
      spaceBetween: 16,
      slidesPerView: 4,
      watchSlidesProgress: true,
      watchSlidesVisibility: true,
      enabled: true,
      observer: true,
      observeParents: true,
      lazyLoading: true,
      lazyLoadingInPrevNext: true,
      lazyLoadingInPrevNextAmount: true,
      nextButton: el.querySelector('.swiper-product-button-next'),
      prevButton: el.querySelector('.swiper-product-button-prev'),
      scrollbar: el.querySelector('.swiper-scrollbar'),
      breakpoints:{
        992:{
          slidesPerView: 2.3,
          spaceBetween: 8,
        },
        768:{
          slidesPerView: 1.3,
          spaceBetween: 8,
        },
      }
    })
  )
}

function initBasicSwiper(){
  const swiperContainers = document.querySelectorAll(
	  '[data-js="swiper-tiles-basic"]'
	);
	
	if(!swiperContainers) return;

  swiperContainers.forEach(el => 
    new Swiper(el, {
      spaceBetween: 16,
      slidesPerView: 3,
      watchSlidesProgress: true,
      enabled: true,
      scrollbar: el.querySelector('.swiper-scrollbar'),
      breakpoints:{
        992:{
          slidesPerView: 2,
          spaceBetween: 8,
        },
        768:{
          slidesPerView: 1,
          spaceBetween: 8,
        },
      }
    })
  )
}