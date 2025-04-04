$(document).ready(function () {
    //
    prestashop.on(
      'steco_event_init',
      steco.update
    );
    prestashop.on(
      'updateCart', function(event){
        if($('#module-steasycheckout-default').length){    
          if(event && typeof(event.resp)!='undefined' && (event.reason == 'refresh' || (typeof(event.resp.cart)!='undefined' && !event.resp.cart.products_count) || (typeof(event.resp.cart)!='undefined' && event.resp.cart.minimalPurchaseRequired!=''))){
            window.location.reload(true);
          }
          steco.update({'item':28});
        }
      }
    );
    if($('body#module-steasycheckout-default').length && typeof(steasycheckout) != 'undefined')
        prestashop.emit('steco_event_init', {});

    $(document).on('submit', '#steco_login_form', function(event){
      var $form = $(this);
      var validate = steco_address.verify($form.find('input[name="email"]'));
      $form.find('input[name="email"]').closest('.form-group ').toggleClass('st-has-error', !validate);
      if(!validate)
        return false;

      if($form.find('input[name="steco_psgdpr_consent_checkbox"]').length){
        steco.gdprLog($form.find('input[name="steco_psgdpr_consent_checkbox"]'));
      }
      $form.find('.form-footer .steco-btn-spin').addClass('active');
      steco.loading(0);
      $.ajax(
      {
          type: 'POST',
          url: $form.attr('action'),
          data: $form.serialize(),
          dataType: 'json',
          cache: false
      }).then(function (resp) {
        steco.loading(false);
        if(!$(resp.personal_information).find('#steco_pi_forms').length){
          $('.show_incomplete_message').removeClass('show_incomplete_message');
          $('.steco_addresses').removeClass('steco_display_none');
        }
        steco.update_dom(resp);

        if ( !$(resp.personal_information).find('#steco_login_form').length && $('#delivery-addresses').length ) steco.goToStep3();
      }).fail(function (resp) {
        steco.loading(false);
        prestashop.emit('stecoHandleError', {eventType: 'authentication', resp: resp});
      });
      return false;
    });
    

    steco_address.init();
    steco_delivery.init();
    steco_payment.init();

    //events in collapse are wired
    $(document).on('hide.bs.collapse', '#steco_pi_forms', function (e) {
      if(!steco.for_steco_collapse){
        steco.for_steco_collapse = 0;
        return false
      }
      steco.for_steco_collapse = 0;
    });
    $(document).on('show.bs.collapse', '#steco_pi_forms', function (e) {
      steco.for_steco_collapse = 1;
      $(e.target).closest(".card").find(".card-header :radio").prop("checked", true);
      $('.steco_addresses').toggleClass('steco_display_none', $('input[name=steco_pi_form]:checked').val()==0);
    });
    $(document).on('click', '#steco_pi_forms .card-header :radio', function (e) {
      $(this).closest(".card-header").find("[data-toggle=collapse]").trigger('click');
      e.stoppropagation;
      return false;
    });
    //
    $(document).on('click', 'button[data-action="show-password"]', function () {
      var elm = $(this).closest('.input-group').children('input.js-visible-password');
      if (elm.attr('type') === 'password') {
        elm.attr('type', 'text');
        $(this).find('i').removeClass('eco-eye-off eco-eye').addClass('eco-eye');
      } else {
        elm.attr('type', 'password');
        $(this).find('i').removeClass('eco-eye-off eco-eye').addClass('eco-eye-off');
      }
    });
    $(document).on('click', '.steco_social_login', function (e) {
      steco.popupCenter($(this).attr('href'), '', 600, 500);
      e.preventDefault();
      return false;
    });
    $(document).on('click', '.js-terms a', function (event) {
      event.preventDefault();
      var url = $(event.target).attr('href');
      if (url) {
        if (url.indexOf('?') != -1)
          url += '&content_only=1';
        else
          url += '?content_only=1';
        $.get(url, function(content) {
          $('#modal').find('.js-modal-content').html($(content).find('.page-cms').contents());
        }).fail(function(resp) {
          prestashop.emit('stecoHandleError', {eventType: 'clickTerms', resp: resp});
        });
      }

      $('#modal').modal({'backdrop': false}).modal('show');
    });

    $(document).on('click', '.steco-gift-checkbox', function (event) {
      $('#gift').collapse('toggle');
    });
    
    $(document).on('click', '.steco-gift-checkbox', function (event) {
        $('#gift').collapse('toggle');
      });
    

    $(document).on('click', '#promo-code .voucher_open', function (event) {
      $('#promo-code').toggleClass('open');
      $('.voucher_open').toggleClass('open');
      $('#voucher_box').collapse('toggle');
    });
    
    
    $(document).on('click', '.close_summary', function (event) {
        $('.close_summary').toggleClass('open');
        $('.step-three .steco_column_section').toggleClass('steco_mb_20');
        $('.steco_summary_address').collapse('toggle');
      });
    
    
    $(document).on('click', '.close_summary_down', function (event) {
        $('.adress-summary.small').toggleClass('open');
        $('.close_summary_down .show').addClass('off');
        $('.adress-summary.small').collapse('toggle');
       
      });
    
    $(document).on('click', '.open_login', function (event) {
               $('#collapse_login').collapse('toggle');
    });
    
    $(document).on('click', '.open_login', function (event) {
        $('#collapse_register').collapse('toggle');
    });

    
    $(document).on('click', '.change-address', function (event) {
      event.preventDefault();
      steco.goToStep2();
    });

    $(document).on('click', '.summary_bt.bt_first_step', function (event) {

      if ( !$('input[name="payment-option"]:checked').length ) {
        steco_payment.showIncompleteMessage($('.steco_payment'));
        return;
      }

      $('.steco_delivery').removeClass('show_incomplete_message');

      if ( $(steco_delivery.deliveryFormSelector + ' .delivery-options :radio:checked').data('paczkomat') ) {
        if ( !$('.paczkomaty-info span').text() ) {
          steco_payment.showIncompleteMessage($('.steco_delivery'), 'show_paczkomaty_message');
          return;
        }
      } else if ( $('.select2sensbitinpost-selection__rendered:visible').length ) {
        if ( $('.select2sensbitinpost-selection__rendered').text().indexOf('Wybierz') != -1 ) {
          steco_payment.showIncompleteMessage($('.steco_delivery'));
          return;
        }
      } else if ( $('.select2sensbitpaczkawruchu-selection__rendered:visible').length ) {
        if ( $('.select2sensbitpaczkawruchu-selection__rendered').text().indexOf('Wybierz') != -1 ) {
          steco_payment.showIncompleteMessage($('.steco_delivery'));
          return;
        }
      } else if ( $('.select2sensbitdpd-selection__rendered:visible').length ) {
          if ( $('.select2sensbitdpd-selection__rendered').text().indexOf('Wybierz') != -1 ) {
            steco_payment.showIncompleteMessage($('.steco_delivery'));
            return;
          }
      } else if ( $('.select2pocztapolskamap-selection__rendered:visible').length ) {
          if ( $('.select2pocztapolskamap-selection__rendered').text().indexOf('Wybierz') != -1 ) {
            steco_payment.showIncompleteMessage($('.steco_delivery'));
            return;
          }
      } else {
        jQuery('.paczkomaty-info span').text('');
        $.ajax({
            url: steasycheckout.urls.select_paczkomat,
            method: 'POST',
            dataType: 'json',
            data: {
                selected_paczkomat: '',
            },
            cache: false,
            beforeSend: function (jqXHR) {
              steco.promises.push(jqXHR);
            }
        }).then(function() {
          steco_payment.save_delivery_message();
        });

        return;
      }

      steco_payment.save_delivery_message();
    });

    $(document).on('click', '.go-to-step-3', function (event) {
      event.preventDefault();
      steco.goToStep3();
    });


    prestashop.on(
      'stecoHandleError',
      steco.handleError
    );
    /*prestashop.on(
      'steco_event_updated',
      steco.gdpr
    );*/
    $(document).on('blur','.steco_pi_form input[name="email"],.steco_pi_form input[name="birthday"], .steco_new_address_form input[name="phone"], .steco_new_address_form input[name="postcode"], .steco_new_address_form input[name="address1"], .steco_new_address_form input[name="address2"], .steco_new_address_form input[name="city"], .steco_new_address_form input[name="company"], .steco_new_address_form input[name="vat_number"], .steco_new_address_form input[name="firstname"], .steco_new_address_form input[name="lastname"], input[name="fake_email"], input[name="fake_password"]', function(){
        $(this).closest('.form-group ').toggleClass('st-has-error', !steco_address.verify($(this)));

        steco.saveCartInputs();
    });
    $(document).on('blur','#steco_customer_form_register :input[required],.steco_new_address_form :input[required]', function(){
        if($(this).val())
          $(this).closest('.form-group ').removeClass('has-error');
    });
    $(document).on('keyup','#steco_customer_form_register input[name="firstname"],#steco_customer_form_register input[name="lastname"]', function(){
      var prev_value = $(this).data('prev_value');
      var field_name = $(this).attr('name');
      var delivery_dom = $('.st_address_form_delivery input[name="'+field_name+'"]');
      var invoice_dom = $('.st_address_form_invoice input[name="'+field_name+'"]');
      if(delivery_dom.val()=='' || delivery_dom.val()==prev_value)
        delivery_dom.val($(this).val());
      if(invoice_dom.val()=='' || invoice_dom.val()==prev_value)
        invoice_dom.val($(this).val());
      $(this).data('prev_value', $(this).val());
    });
});

var steco = {
    'promises': [],
    'for_steco_collapse': 0,
    'loading': function(items){
      if (items===false) {
        $('.steco_container').removeClass('busy_0 busy_1 busy_2 busy_4 busy_8 busy_16 busy_12 busy_14 busy_24 busy_28 busy_30');
        $('.summary_bt.bt_first_step').removeAttr('disabled');
      } else {
        $('.steco_container').addClass('busy_'+(steasycheckout.display_cart ? 16+items : items));
        $('.summary_bt.bt_first_step').attr('disabled', 'disabled');
      }
    },
    'goToStep2': function() {
      $('body').removeClass('step-3');
      $('body').addClass('step-2');
    },
    'goToStep3': function() {
      return steco.goToStep2();

      $('body').removeClass('step-2');
      $('body').addClass('step-3');

      $('body, html').animate({scrollTop: $('#payment-confirmation').offset().top + $('#payment-confirmation').height() + 10 - $(window).height()}, 'slow');
    },
    'saveCartInputs': function() {
      let inputs = $('.steco_new_address_form input[type="text"], .steco_new_address_form input[type="input"], .steco_new_address_form input[type="email"], .steco_new_address_form input[type="tel"], .steco_new_address_form select');

      let data = {delivery:{}, invoice:{}};
      inputs.each(function() {
        let type = jQuery(this).parents('form').find('[name*="use_as_delivery_invoice"]').val();
        data[type][jQuery(this).attr('name')] = jQuery(this).val();
      });

      localStorage.setItem('cartInputs', JSON.stringify(data));
    },
    'getCartInputs': function() {
      let data = localStorage.getItem('cartInputs');
      data = data ? JSON.parse(data) : false;
      if ( !data ) return;

      let inputs = $('.steco_new_address_form input[type="text"], .steco_new_address_form input[type="input"], .steco_new_address_form input[type="email"], .steco_new_address_form input[type="tel"], .steco_new_address_form select');

      inputs.each(function() {
        let type = jQuery(this).parents('form').find('[name*="use_as_delivery_invoice"]').val();

        if ( typeof data[type][jQuery(this).attr('name')] != 'undefined' && !jQuery(this).val() ) {
          jQuery(this).val(data[type][jQuery(this).attr('name')])
        }

        if ( jQuery(this).val() ) {
          jQuery(this).trigger('focus');
          jQuery(this).trigger('input');
        }
      });
    },
    'clearCartInputs': function() {
      localStorage.removeItem('cartInputs');
    },
    'popupCenter': function (url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    },
    'abortPreviousRequests': function() {
        var promise;
        while (this.promises.length > 0) {
            promise = this.promises.pop();
            promise.abort();
        }
    },
    'update': function(params) {
      var item = typeof(params.item)!='undefined' ? params.item : false;
      if(item!==false){
        steco.loading(item)
      }
        steco.abortPreviousRequests();
        $.ajax({
          url: steasycheckout.urls.update+(item!==false ? '&items='+item : ''),
          method: 'POST',
          dataType: 'json',
          cache: false,
          beforeSend: function (jqXHR) {
            steco.promises.push(jqXHR);
          }
        }).then(function (resp) {
          if(typeof(resp.redirect) != 'undefined')
            document.location.href = resp.redirect;
          steco.update_dom(resp);
          //
          steco.toggleFormActive();
          steco.loading(false);
        }).fail(function(resp) {
          steco.loading(false);
          prestashop.emit('stecoHandleError', {eventType: 'stecoUpdate', resp: resp});
        });
    },
    'update_dom': function(resp) {
      typeof(resp.personal_information) != 'undefined' && $('.steco_personal_information').html(resp.personal_information);
      (typeof(resp.addresses) != 'undefined' && resp.addresses) && $('.steco_addresses').html(resp.addresses);
      typeof(resp.delivery) != 'undefined' && $('.steco_delivery').html(resp.delivery) && steco_delivery.managePaczkomaty();
      typeof(resp.payment) != 'undefined' && $('.steco_payment').html(resp.payment);
      typeof(resp.summary) != 'undefined' && $('.steco_summary').html(resp.summary);
      typeof(resp.summary_address) != 'undefined' && $('.steco_summary_address').html(resp.summary_address);
      typeof(resp.free_delivery_info) != 'undefined' && $('.free-delivery_info').html($(resp.free_delivery_info).html());
      if(typeof(resp.cart) != 'undefined'){
        var $cart = $($.parseHTML(resp.cart));
        $cart.find('#delivery_message').html($('#delivery_message').val());
        $.each($('#steco-conditions-to-approve input'), function(){
          $cart.find('input[name="'+$(this).attr('name')+'"]').prop('checked', $(this).is(':checked'));
        });
        $('.steco_cart').html($cart);
        prestashop.emit('updatedCart', {eventType: 'updateCart', resp: {}});
      }
      prestashop.emit('steco_event_updated', resp);

      setTimeout(function() {
        $('input[name*="postcode"]').inputmask('99-999');

        let off = $('.form-group.has-error, .form-group.st-has-error').first().offset();
        if ( off && off.top < $(window).scrollTop() ) {
          $('body, html').stop(true, true).animate({
            scrollTop: off.top - 50
          });
        }

        steco.getCartInputs();


        if ( jQuery('.remove-from-cart[data-id-product="23136814"]').length ) {
          jQuery('.checkout-summary-block input[name="insurance"]').prop('checked', 'checked');
        }
      }, 1000);

    },
    'personal_information': function() {
        $.ajax({
          url: steasycheckout.urls.personal_information,
          method: 'POST',
          dataType: 'json',
          cache: false,
          beforeSend: function (jqXHR) {
            steco.promises.push(jqXHR);
          }
        }).then(function (resp) {
            steco.update_dom(resp);
            prestashop.emit('steco_event_personal_information', {});
        }).fail(function(resp) {
          prestashop.emit('stecoHandleError', {eventType: 'personalInformation', resp: resp});
        });
    },
    'addresses': function(url){
        $.ajax({
          url: url ? url : steasycheckout.urls.addresses,
          method: 'POST',
          dataType: 'json',
          cache: false,
          beforeSend: function (jqXHR) {
            steco.promises.push(jqXHR);
          }
        }).then(function (resp) {
            steco.update_dom(resp);
            prestashop.emit('steco_event_addresses', {});
        }).fail(function(resp) {
          prestashop.emit('stecoHandleError', {eventType: 'addresses', resp: resp});
        });
    },
    'delivery': function(){
        $.ajax({
          url: steasycheckout.urls.delivery,
          method: 'POST',
          dataType: 'json',
          cache: false,
          beforeSend: function (jqXHR) {
            steco.promises.push(jqXHR);
          }
        }).then(function (resp) {
            steco.update_dom(resp);
            prestashop.emit('steco_event_delivery', {});
        }).fail(function(resp) {
          prestashop.emit('stecoHandleError', {eventType: 'delivery', resp: resp});
        });
    },
    'payment': function(){
        $.ajax({
          url: steasycheckout.urls.payment,
          method: 'POST',
          dataType: 'json',
          cache: false,
          beforeSend: function (jqXHR) {
            steco.promises.push(jqXHR);
          }
        }).then(function (resp) {
            steco.update_dom(resp);
            prestashop.emit('steco_event_payment', {});
        }).fail(function(resp) {
          prestashop.emit('stecoHandleError', {eventType: 'payment', resp: resp});          
        });
    },
    'handleError': function(event){
      if(typeof(event.eventType)!='undefined')
        console.log(event.eventType);
    },
    'gdpr': function(resp){
      if(typeof(resp.personal_information) != 'undefined' && $('input[name="steco_psgdpr_consent_checkbox"]').length){
        $(document).on('click', 'input[name="steco_psgdpr_consent_checkbox"]', function (event) {
          steco.toggleFormActive();
        });
      }
    },
    'gdprLog': function($cb){
        $.ajax({
            data: 'POST',
            //dataType: 'JSON',
            url: $cb.data('front_controller'),
            data: {
                ajax: true,
                action: 'AddLog',
                id_customer: $cb.data('id_customer'),
                customer_token: $cb.data('customer_token'),
                id_guest: $cb.data('id_guest'),
                guest_token: $cb.data('guest_token'),
                id_module: $cb.data('id_module'),
            },
            success: function (data) {
                // parentForm.submit();
            },
            error: function (err) {
            }
        });
    },
    'toggleFormActive': function(){
        $('input[name=steco_psgdpr_consent_checkbox]').each(function(){
              var parentForm = $(this).closest('form');
              if ($(this).prop('checked') == true) {
                  parentForm.find('[type="submit"]').removeAttr('disabled');
              } else {
                  parentForm.find('[type="submit"]').attr('disabled', 'disabled');
              }
          });
    },
    'bu_yao_shan_chu': true
};

var steco_address = {
  'autocomplete': null,
  'state_arr': [],
  init: function() {
    $(document).on('submit', '.steco_new_address_form', function(){
      // if(!steco_payment.verify_addresses(true)) return false;
      var $form = $(this);
      $form.find('.form-footer .steco-btn-spin').addClass('active');
      steco.loading(30);
      $.ajax(
      {
          type: 'POST',
          url: $form.attr('action').replace(/&items=\d+/,'&items=0'),
          data: $form.serialize(),
          dataType: 'json',
          cache: false
      }).then(function (resp) {
        steco.update_dom(resp);
        steco.loading(false);
      }).fail(function (resp) {
        steco.loading(false);
        $form.find('.form-footer .steco-btn-spin').removeClass('active');
        prestashop.emit('stecoHandleError', {eventType: 'newAddress', resp: resp}); 
      });
      return false;
    });

    $(document).on('click', '.steco_address_btn', function(){
      var $this = $(this).addClass('active');
      $.ajax({
          type: 'POST',
          url: $this.attr('href'),
          dataType: 'json',
          cache: false
      }).then(function (resp) {
        $this.removeClass('active');
        steco.update_dom(resp);
        prestashop.emit('stecoUpdatedAddress', {target: $('.js-address-form'), resp: resp});
      }).fail(function (resp) {
        $this.removeClass('active');
        prestashop.emit('stecoHandleError', {eventType: 'addressBtn', resp: resp}); 
      });
      return false;
    });
    $(document).on('click', '.steco-cancel-address', function(){
      $('.steco_addresses_form').empty();
      $('.steco_addresses_from').removeClass('steco_display_none');
    });
    $(document).on('click', 'input[name="show_invoice_button"]', function (event) {
      $('.st_address_form_invoice').toggleClass('steco_display_none', $(this).prop('checked') == true);

      if ( $(this).prop('checked') ) {
        $('[name*="use_as_delivery_invoice"][value="delivery"]').after('<input type="hidden" name="use_as_delivery_invoice[]" value="invoice">')
      } else {
        $('[name*="use_as_delivery_invoice"][value="delivery"]').next('[name*="use_as_delivery_invoice"]').remove();
      }
    });

    $(document).on('click', 'input[name="show_invoice_button_proxy"]', function (event) {
      $('input[name="show_invoice_button"]').trigger('click');
    });

    $(document).on('click', 'input[name="use_same_address_proxy"]', function (event) {
      $('input[name="use_same_address"]').trigger('click');
    });




    /*$(document).on('click', '.steco_address_del_btn', function(){
      steco.addresses($(this).attr('href'));
      return false;
    });*/

    $(document).on('change', '.st_form_item_id_state select[name="id_state"],.steco-country', function() {
      steco.abortPreviousRequests();
      var formSelector = $(this).closest('.js-address-form').hasClass('st_address_form_delivery') ? '.st_address_form_delivery' : '.st_address_form_invoice';
      // steco.loading(formSelector=='.st_address_form_delivery' ? 30 : 2);
      steco.loading(30);
      var requestData = {
        id_country: $(formSelector).find('.steco-country').val(),
        id_state: $(formSelector).find('select[name="id_state"]').length ? $(formSelector).find('select[name="id_state"]').val() : '',
        delivery_invoice: $(formSelector).find('input[name="saveAddress"]').val(),
        id_address: $(formSelector + ' form').find('input[name="id_address"]').val(),
      };
      var getFormViewUrl = $(formSelector + ' form').data('refresh-url');
      var formFieldsSelector = formSelector + ' input,'+formSelector + ' select';

      $.ajax(
      {
          type: 'POST',
          url: getFormViewUrl,
          data: requestData,
          dataType: 'json',
          cache: false,
          beforeSend: function (jqXHR) {
            steco.promises.push(jqXHR);
          }
      }).then(function (resp) {
        steco.loading(false);

        var inputs = [];

        // Store fields values before updating form
        $(formFieldsSelector).each(function () {
          if($(this).prop('name')=='use_as_delivery_invoice[]' || $(this).prop('name')=='id_address')
            return true;
          inputs[$(this).prop('name')] = $(this).val();
        });
        inputs['use_as_delivery_invoice'] = [];
        inputs['use_as_delivery_invoice']['delivery'] = $(formSelector + ' input[name="use_as_delivery_invoice[]"][value="delivery"]').prop("checked");
        inputs['use_as_delivery_invoice']['invoice'] = $(formSelector + ' input[name="use_as_delivery_invoice[]"][value="invoice"]').prop("checked");
        //
        $(formSelector).replaceWith(resp.address_form);

        // Restore fields values
        $(formFieldsSelector).each(function () {
          if($(this).prop('name')=='use_as_delivery_invoice[]' || $(this).prop('name')=='id_address')
            return true;
          $(this).val(inputs[$(this).prop('name')]);
        });
        $(formSelector + ' input[name="use_as_delivery_invoice[]"][value="delivery"]').prop("checked", inputs['use_as_delivery_invoice']['delivery']);
        $(formSelector + ' input[name="use_as_delivery_invoice[]"][value="invoice"]').prop("checked", inputs['use_as_delivery_invoice']['invoice']);

        prestashop.emit('updatedAddressForm', {target: $(formSelector), resp: resp});

        steco.update_dom(resp);
      }).fail(function (resp) {
        steco.loading(false);
        prestashop.emit('stecoHandleError', {eventType: 'updateAddressForm', resp: resp}); 
      });
    });

    $(document).on('change', 'input[name=use_same_address]', function() {
      $(':radio[name=id_address_invoice][value='+$(':radio[name=id_address_delivery]:checked').val()+']').prop('checked', this.checked).trigger('change');
      $('.invoice-addresses-container').toggleClass('steco_display_none', this.checked);
    });
    $(document).on('change', ':radio[name=id_address_delivery], :radio[name=id_address_invoice]', function() {
      steco.loading(28);
      steco.abortPreviousRequests();

      $(this).closest('.address-selector').find('.steco-address-item').removeClass('steco_selected steco-input-loadingsteco-input-loading');
      $(this).closest('.steco-address-item').addClass('steco_selected steco-input-loading');

      // var idFailureAddress = $(".js-address-error").prop('id').split('-').pop();
      var notValidAddresses = $('#not-valid-addresses').val();
      var addressType = this.name.split('_').pop();
      var $addressError = $('.js-address-error[name=alert-' + addressType + ']');

      // switchEditAddressButtonColor(false, idFailureAddress, addressType);

      if (notValidAddresses !== "") {
        if (notValidAddresses.split(',').indexOf(this.value) >= 0) {
          $addressError.show();
          // switchEditAddressButtonColor(true, this.value, addressType);
          $(".js-address-error").prop('id', "id-failure-address-" + this.value);
          return false;
        } else {
          $addressError.hide();
        }
      } else {
        $addressError.hide();
      }

      var $form = $('.steco_addresses_from');
      $.ajax(
      {
          type: 'POST',
          url: $form.attr('action'),
          data: $form.serialize(),
          dataType: 'json',
          cache: false,
          beforeSend: function (jqXHR) {
            steco.promises.push(jqXHR);
          }
      }).then(function (resp) {
        steco.update_dom(resp);
        $('.steco-address-item').removeClass('steco-input-loading');
        steco.loading(false);
      }).fail(function (resp) {
        $('.steco-address-item').removeClass('steco-input-loading');
        steco.loading(false);
        prestashop.emit('stecoHandleError', {eventType: 'updateAddressOptions', resp: resp}); 
      });
      return false;
    });


    $(document).on('change', 'input[name="choose_company"]', function () {
      $('input[name="invoice"]').prop('checked', parseInt($(this).val()));
      steco_address.update_cart_info();
    });


    $(document).on('change', 'input[name="invoice"]', function () {
      steco_address.update_cart_info();
    });

    $(document).on('change', 'input[name="register_account"]', function () {
      $('.show_passwords').collapse('toggle');
    });

    $(document).on('input', 'input[name="fake_email"]', function () {
      $('#steco_customer_form_register input[name="email"]').val($(this).val());
    });

    $(document).on('input', 'input[name="fake_password"]', function () {
      $('#steco_customer_form_register input[name="password"]').val($(this).val());
    });

    $(document).on('input', '#collapse_register .st_address_form_delivery input[name="firstname"]', function () {
      $('#steco_customer_form_register input[name="firstname"]').val($(this).val());
    });

    $(document).on('input', '#collapse_register .st_address_form_delivery input[name="lastname"]', function () {
      $('#steco_customer_form_register input[name="lastname"]').val($(this).val());
    });

    $(document).on('change', '.checkout-summary-block input[name="insurance"]', function () {
      if ( jQuery(this).is(':checked') ) {
        jQuery(this).parents('.ajax_block_product').find('.ajax_add_to_cart_button').trigger('click');
        steco.update({'item':28});
      } else {
        jQuery('.remove-from-cart[data-id-product="23136814"]').trigger('click');
      }
    });



    $(document).on('click', '.steco_register', function (e) {
      steco.loading(0);
      steco_payment.save_address(0);
    });

    $(document).on('click', '.steco_validate_step_2', function (e) {
      e.preventDefault();
      steco.loading(0);
      steco_payment.validate_cart_addresses();
    });




    

    prestashop.on(
      'steco_event_updated',
      $.proxy(this.initAutocomplete, this)
    );
    prestashop.on(
      'updatedAddressForm',
      $.proxy(this.fillState, this)
    );
    prestashop.on(
      'updatedAddressForm',
      $.proxy(this.initAutocomplete, this)
    );
    prestashop.on(
      'stecoUpdatedAddress',
      $.proxy(this.initAutocomplete, this)
    );
  },
  verify: function(element){
    var name = element.attr('name'), val=element.val(), required=element.prop('required');
    if(required && !val)
      return false;
    if(!val)
      return true;
    switch(name){
      case 'fake_email':
      case 'email':
        return /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z]{2,63}$/.test(val);
      break;
      case 'phone':
        return val.replace(/[^0-9]/g, '').length >= 9;
        return /^[\(\)\s\-\+\d\.x\#]{9,20}$/.test(val);
      break;
      case 'address1':
        return /[a-z]+ ?[0-9]+/i.test(val);
      break;
      case 'postcode':
        var postcode_dom = element.parent().find('.postcode_format');
        if (!postcode_dom.length)
            return true;
        var postcode_format = postcode_dom.html();
        var iso_code = postcode_dom.data('iso_code');

        var zipRegexp = '^'+postcode_format+'$';
        zipRegexp = zipRegexp.replace(/ /g, '( )');
        zipRegexp = zipRegexp.replace(/-/g, '(-)');
        zipRegexp = zipRegexp.replace(/N/g, '[0-9]');
        zipRegexp = zipRegexp.replace(/L/g, '[a-zA-Z]');
        if(iso_code)
          zipRegexp = zipRegexp.replace('C', iso_code);

        var reg = new RegExp(zipRegexp);
        return reg.test(val);
      break;
      case 'birthday':
        var date_format_lite = prestashop.language.date_format_lite.toUpperCase().replace('Y','YYYY');
        return moment(val, date_format_lite, true).isValid();
      break;
      case 'firstname':
      case 'lastname':
        return /^[^0-9!<>,;?=+()@#"°{}_$%:¤|]*$/.test(val);
      break;
    }
    return true;
  },
  initAutocomplete: function()
  {
    if($('.steco_addresses_form input[name="address1"]').length && typeof(google) != 'undefined' && typeof(google.maps) != 'undefined'){
      this.autocomplete = new google.maps.places.Autocomplete(
          $('.steco_addresses_form input[name="address1"]')[0],
          {types: ['geocode']});

      this.autocomplete.addListener('place_changed', $.proxy(this.fillInAddress, this));
      if(steasycheckout.geolocate)
        $(document).on('focus',$('.steco_addresses_form input[name="address1"]'),$.proxy(this.geolocate, this));
    }

    steco_address.update_cart_info(true);
    steco_address.update_invoice_address();

    // $('.tooltip_ep_reg').tooltipster({
    //    delay: 200,
    //    trigger: 'hover',
    //    side: 'right',
    //    maxWidth: 300
    // });
  },

  fillInAddress: function() {
    // Get the place details from the autocomplete object.
    var place = this.autocomplete.getPlace();
    var componentForm = {
      // street_number: 'short_name',
      // route: 'long_name',
      locality: 'city',
      administrative_area_level_5: 'id_state',
      administrative_area_level_4: 'id_state',
      administrative_area_level_3: 'id_state',
      administrative_area_level_2: 'id_state',
      administrative_area_level_1: 'id_state',
      country: 'id_country',
      postal_code: 'postcode'
    };
    $.each(componentForm, function(k,v) {
      if(v=='city' || v=='postcode')
        $('.steco_addresses_form [name="'+v+'"]').val('');
    });

    var city = '';
    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
      if (componentForm[addressType]) {
        var val = place.address_components[i]['long_name'];
        if(componentForm[addressType]=='id_state'){
          this.state_arr.push(val);
        }else if(componentForm[addressType]=='id_country'){
          var country = $('.steco_addresses_form [name="id_country"] option:contains("'+val+'")');
          if(country.length){
            country.prop('selected',true);
            $('.steco-country').trigger('change');
          }
        }else{
          $('.steco_addresses_form [name="'+componentForm[addressType]+'"]').val(val);
          if(componentForm[addressType]=='city')
            city = val;
        }
      }
    }
    if(city){
        var re = new RegExp(', '+city+',.*$');
        $('.steco_addresses_form input[name="address1"]').val(place.formatted_address.replace(re, ''));
    }
  },
  fillState: function() {
    if(this.state_arr.length){
      $.each(this.state_arr, function(k,v){
        var state = $('.steco_addresses_form select[name="id_state"] option:contains("'+v+'")');
        if(state.length){
          state.prop('selected',true);
          return false;
        }
      })
    }
    this.state_arr = [];
  },

  geolocate: function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        this.autocomplete.setBounds(circle.getBounds());
      });
    }
  },

  update_invoice_address: function() {
    return;
    if ( $('input[name="invoice"]').is(':checked') ) {
      $('.invv_adress').show();
    } else {
      $('input[name=use_same_address]').prop('checked', true);
      $('.invv_adress').hide();
    }
  },

  update_cart_info: function(skip_ajax) {
    let company = parseInt($('input[name="choose_company"]:checked').val());
    let invoice = $('input[name="invoice"]').is(':checked') ? 1 : 0;

    $('input[name="company"], input[name="vat_number"], input[name="phone"]').each(function() {
      let field = $(this).attr('name');
      let where = $(this).parents('form').find('[name="use_as_delivery_invoice[]"]').val();
      if ( where == 'invoice' ) {
        if ( company ) {
          $(this).attr('required', '').parents('.adres_padding').first().show();
        } else {
          $(this).removeAttr('required').parents('.adres_padding').first().show();
        }

        if ( field == 'phone' ) {
          $(this).removeAttr('required').parents('.adres_padding').first().show();
          $(this).closest('.form-group ').removeClass('has-error');
        }

      } else {
        if ( company ) {
         $(this).attr('required', '').parents('.adres_padding').first().show();
        } else {
          if ( field == 'company') {
            $(this).removeAttr('required').parents('.adres_padding').first().show();
          } else {
            $(this).removeAttr('required').parents('.adres_padding').first().hide();
          }
        }

        if ( field == 'phone' ) {
          $(this).attr('required', '').parents('.adres_padding').first().show();
        }
        
      }
    });

    /*if ( company ) {
      $('input[name="company"], input[name="vat_number"]').each(function() {
        $(this).attr('required', '').parents('.adres_padding').first().show();
      });

      // $('input[name="show_invoice_button"]').parents('.adres_padding_chekbox').first().show();
      // $('.classpl_invoice').show();
    } else {
      $('input[name="company"], input[name="vat_number"]').each(function() {
        let use = $(this).parents('form').find('[name="use_as_delivery_invoice[]"]').val();
        if ( use == 'invoice' ) {
          $(this).removeAttr('required').parents('.adres_padding').first().show();
        } else {
          $(this).removeAttr('required').parents('.adres_padding').first().hide();
        }
      });

      // $('.classpl_invoice').hide();
    }*/

    if ( invoice ) {
      $('input[name="show_invoice_button"]').parents('.adres_padding_chekbox').first().show();
    } else {
      // var $sib = $('input[name="show_invoice_button"]');
      // let.parents('.adres_padding_chekbox').first().hide();
      // if ( !$sib.prop('checked') ) $sib.trigger('click');
    }

    if ( skip_ajax ) return;

    $.ajax({
      url: steasycheckout.urls.set_message,
      method: 'POST',
      dataType: 'json',
      data: {
          invoice: invoice,
          company: company
      },
      cache: false
    }).then(function (resp) {
      steco.update_dom(resp);
    }).fail(function(resp) {
      prestashop.emit('steco_payment_master_error', {eventType: 'setMessage', resp: resp});          
    });

  }
};
function stecoInitAutocomplete(){
  steco_address.initAutocomplete();
}
var steco_delivery = {
  'deliveryFormSelector': '.steco_deliverys_form',
  'cartSelector': '#steco_cart',
  init: function() {
    $(document).on('change', this.deliveryFormSelector + ' .delivery-options :radio', $.proxy(this.updateDeliveryForm, this, {deliveryOpton:true}));
    $(document).on('change', this.deliveryFormSelector + ' .steco-shipping-option', $.proxy(this.updateDeliveryForm, this));


    $(document).on('click', '.paczkomaty-info div.small_cart_btn', $.proxy(this.openMap, this));

  },
  updateDeliveryForm: function(event) {
    var isDeliveryOpton = typeof(event.deliveryOpton)!=='undefined' && event.deliveryOpton;

    steco.loading(24);
    steco.abortPreviousRequests();

    var $deliveryMethodForm = $(this.deliveryFormSelector);
    var requestData = $deliveryMethodForm.serialize();
    var $inputChecked = $(event.currentTarget);
    var $newDeliveryOption = $(this.deliveryFormSelector + ' .delivery-options :radio:checked').parents("div.delivery-option");

    if(isDeliveryOpton){
      $('.delivery-option').removeClass('steco_selected steco-input-loading');
      $newDeliveryOption.addClass('steco_selected steco-input-loading');
    }
    $.ajax(
    {
        type: 'POST',
        url: $deliveryMethodForm.data('url-update'),
        data: requestData,
        dataType: 'json',
        cache: false,
        beforeSend: function (jqXHR) {
          steco.promises.push(jqXHR);
        }
    }).then(function (resp) {
      steco.loading(false);
      steco.update_dom(resp);
      prestashop.emit('updatedDeliveryForm', {
        dataForm: $deliveryMethodForm.serializeArray(),
        deliveryOption: $newDeliveryOption,
        resp: resp
      });
      if(isDeliveryOpton)
        $('.delivery-option').removeClass('steco-input-loading');

      steco_delivery.managePaczkomaty()
    }).fail(function (resp) {
      prestashop.emit('stecoHandleError', {eventType: 'updateDeliveryOptions', resp: resp}); 
      steco.loading(false);
      if(isDeliveryOpton)
        $('.delivery-option').removeClass('steco-input-loading');
    });
  },
  managePaczkomaty: function() {
    if ( $(this.deliveryFormSelector + ' .delivery-options :radio:checked').data('paczkomat') ) {
      $('.paczkomaty-info').show();

      if ( !$('.paczkomaty-info span').text() ) {
        this.openMap();
      }
    } else {
      $('.paczkomaty-info, .paczkomaty-wrapper').hide();
    }
  },

  openMap: function () {
    jQuery('.paczkomaty-wrapper').show();
    if ( jQuery('#searchWidget').length ) return;

    var callback = function(point){
      $('.show_paczkomaty_message').removeClass('show_paczkomaty_message');
      jQuery('.paczkomaty-info span').text(point.name);
      jQuery('.paczkomaty-wrapper').hide();

       $.ajax({
          url: steasycheckout.urls.select_paczkomat,
          method: 'POST',
          dataType: 'json',
          data: {
              selected_paczkomat: point.name,
          },
          cache: false,
          beforeSend: function (jqXHR) {
            steco.promises.push(jqXHR);
          }
        }).then(function (resp) {
          steco.loading(false);
        }).fail(function(resp) {
          prestashop.emit('stecoHandleError', {eventType: 'selectPaczkomat', resp: resp});          
        });
    };

    if ( typeof easyPack != 'undefined' ) {
      if ( false ) {
        jQuery('.paczkomaty-wrapper').addClass('dropdown');
        easyPack.dropdownWidget('easypack-map', callback);
      } else {
        easyPack.mapWidget('easypack-map', callback);
      }
    }
      
  }
};
var steco_payment = {
  confirmationSelector: '#payment-confirmation',
  paymentSelector: '#payment-section',
  conditionsSelector: '#steco-conditions-to-approve',
  conditionAlertSelector: '.js-alert-payment-conditions',
  additionalInformatonSelector: '.js-additional-information',
  optionsForm: '.js-payment-option-form',
  paymentOptionsSelector: '.steco-payment-option',
  process: {
    'validate_delivery': 0,
    'validate_invoice': 0,
    'pi_submit': 0,
    'addresses_submit': 0,
    'delivery_message_submit': 0
  },
  format: {'prefix':'', 'suffix':'','symbles':[], 'sample':'', 'decimals':2},
  init: function(){

    this.learnFormat();
    $(this.paymentSelector + ' input[type="checkbox"][disabled]').attr('disabled', false);

    $(document).on('change', this.conditionsSelector + ' input[type="checkbox"]', $.proxy(this.toggleOrderButton, this));
    $(document).on('change', this.paymentOptionsSelector + ' input[name="payment-option"]', $.proxy(this.selectPaymentMethod, this));
    $(document).on('click', this.confirmationSelector + ' .steco_confirmation_btn', $.proxy(this.toggleOrderButton, this, {complete:true}));
    $(document).on('click', this.confirmationSelector + ' button', $.proxy(this.true_confirm, this));
    // $(document).on('click', this.confirmationSelector + ' button[type="button"]', $.proxy(this.confirm, this));

    prestashop.on(
      'steco_event_updated',
      $.proxy(this.toggleOrderButton, this)
    );
    prestashop.on(
      'steco_payment_master_error',
      $.proxy(this.cancle_confirm, this)
    );
    // this.collapseOptions();
  },
  everything_is_ready: function(yn){
    return;
    if(yn)
      $(this.confirmationSelector + ' button').removeAttr('disabled');
    else
      $(this.confirmationSelector + ' button').attr('disabled', 'disabled');
  },
  collapseOptions: function(){
    $(this.additionalInformatonSelector + ', ' + this.optionsForm).hide();
  },
  getSelectedOption: function(){
    return $(this.paymentOptionsSelector + ' input[name="payment-option"]:checked').attr('id');
  },
  hideConfirmation: function(){
    $(this.confirmationSelector).hide();
  },
  showConfirmation: function(){
    $(this.confirmationSelector).show();
  },
  selectPaymentMethod: function(){
    $('.show_incomplete_message').removeClass('show_incomplete_message');
    var selectedOption = $(this.paymentOptionsSelector + ' input[name="payment-option"]:checked');
      steco.loading(0);
        $.ajax({
          url: steasycheckout.urls.select_payment_method,
          method: 'POST',
          dataType: 'json',
          data: {
              select_payment_option: selectedOption.attr('id'),
              select_payment_module: selectedOption.data('module-name'),
          },
          cache: false,
          beforeSend: function (jqXHR) {
            steco.promises.push(jqXHR);
          }
        }).then(function (resp) {
          steco.loading(false);
          steco.update_dom(resp);
        }).fail(function(resp) {
          prestashop.emit('stecoHandleError', {eventType: 'selectPaymentMethod', resp: resp});          
        });
  },
  handle_payment_fee: function(){
    var selectedOption = this.getSelectedOption();
    if(!selectedOption){
      this.hide_payment_fee();
      return;  
    }
    var addtional_infomation = $('#' + selectedOption + '-additional-information');
    var payment_form = $('#pay-with-' + selectedOption + '-form .payment-form');
    if(payment_form.length && payment_form.attr('action').indexOf('megareembolso') != -1 && addtional_infomation.find('dl').length){//megareembolso
      var megareembolso_fee = addtional_infomation.find('dd:first').html();
      var megareembolso_int_fee = parseFloat(this.deFormatPrice(megareembolso_fee),10);
      var megareembolso_int_total = parseFloat($('.cart-summary-totals .cart-total span.value').data('amount'), 10);
      this.show_payment_fee(addtional_infomation.find('dt:first').html(), megareembolso_fee, this.formatPrice(megareembolso_int_fee+megareembolso_int_total), false);
    }else if(addtional_infomation.find('#paypal_fee').length){//paypal aw
      var paypal_fee = parseFloat(addtional_infomation.find('#paypal_fee').html(), 10);
      this.show_payment_fee(false, (paypal_fee.toFixed(2).replace('.',',')+ ' ' + prestashop.currency.sign), ((paypal_fee + parseFloat($('.cart-summary-totals .cart-total span.value').data('amount'), 10)).toFixed(2).replace('.',',')+ ' ' + prestashop.currency.sign),false);
    }else if($('#'+selectedOption).data('module-name') == "codpro" && typeof(cart_total_codfee)!='undefined'){//codpro
      this.show_payment_fee(false,cart_shipping_codfee, cart_total_codfee,cart_subtotal_tax_codfee);
    }else if($('#'+selectedOption).data('module-name') == "codfee" && $("input[name='codfee_text']").length){//codfee
      this.show_payment_fee($("input[name='codfee_text']").val(),$("input[name='codfee_fee']").val(), $("input[name='codfee_total']").val(),($("input[name='codfee_tax_enabled']").val() == '1' && $("input[name='codfee_tax_display']").val() == '1' ? $("input[name='codfee_taxes']").val() : false));
    }else{
      this.hide_payment_fee();
    }
    return;  
  },
  show_payment_fee: function(_label,fee,total,sub){
    $('.cart-summary-st-fee').removeClass('steco_display_none').find('.value').html(fee); 
    $('.cart-summary-st-fee').find('.label').html(_label ? _label : $('.cart-summary-st-fee .label').data('label'));    
    $('.cart-summary-totals .cart-total span.value').html(total);
    if(sub)
      $('.cart-summary-totals span.sub.value').html(sub);
  },
  hide_payment_fee: function(){
    $('.cart-summary-st-fee').addClass('steco_display_none').find('.label').html($('.cart-summary-st-fee .label').data('label'));
    $('.cart-summary-totals .cart-total span.value').html($('.cart-summary-totals .cart-total span.value').data('total'));
    $('.cart-summary-totals span.sub.value').html($('.cart-summary-totals span.sub.value').data('total'));
  },
  learnFormat: function(){
        var reg = new RegExp("^([^\\d]*).*?([^\\d]*)$");
        var sample = steasycheckout.price;
        var new_sample = steasycheckout.price;
        var res = reg.exec(sample);
        if(res){
            if(res[1]){
                steco_payment.format.prefix = res[1];
                new_sample = new_sample.replace(res[1],'');
            }
            if(res[2]){
                steco_payment.format.suffix = res[2];
                new_sample = new_sample.replace(res[2],'');
            }
        }
        var reg = /([^\d])?(\d+)/g;
        var match;
        while (match = reg.exec(new_sample)) {
            steco_payment.format.symbles.unshift({'change':(''+match[2]).length,'symble':match[1]?match[1]:''})
        }
            var reg = new RegExp("[123]",'g');
            var d_arr = sample.match(reg);
            steco_payment.format.decimals = d_arr.length-3;
    },
    formatPrice: function(value){
        if(!steco_payment.format.symbles.length)
            return value;
        if(value==0)
            return steco_payment.format.prefix+'0'+steco_payment.format.suffix;
        
        value = value.toFixed(steco_payment.format.decimals).toString().replace(/([^\d]+)/g,'');
        var price_arr = value.split('').reverse();

        var price_new = '';
        var index = 0;
        $.each(steco_payment.format.symbles, function(k,v){
            for (var i = 0; i < v.change; i++) { 
                if(index<price_arr.length)
                    price_new = price_arr[index++]+price_new;
                else
                    break;
            }
            if(index<price_arr.length)
                price_new = v.symble+price_new;
        });
        if(index<price_arr.length)
            for (var j=index; j < price_arr.length; j++) {
                price_new = price_arr[j]+price_new;
            }
        return steco_payment.format.prefix+price_new+steco_payment.format.suffix;
    },
    deFormatPrice: function(value){
        value = value.toString().replace(steco_payment.format.prefix,'');
        value = value.replace(steco_payment.format.suffix,'');
        if(steco_payment.format.decimals)
        {
            var value_arr = value.split(steco_payment.format.symbles[0].symble);
            if(value_arr.length>1){
                var decimal = value_arr.pop();
                value = value_arr.join('').replace(/([^\d]+)/g,'')+'.'+decimal;
            }else{
                value = value.replace(/([^\d]+)/g,'');
            }
        }
        else
            value = value.replace(/([^\d]+)/g,'');
        return value;
    },
  toggleOrderButton: function(params) {
    return;

    this.handle_payment_fee();

    var complete = typeof(params.complete)!=='undefined' && params.complete;
    if(complete)
      $('.show_incomplete_message').removeClass('show_incomplete_message');
    if(typeof(params.select_payment_method)!=='undefined' && params.select_payment_method)
      this.selectPaymentMethod();

    $(this.paymentOptionsSelector + ' label').removeClass('steco_selected');
    $(this.paymentOptionsSelector + ' input[name="payment-option"]:checked').closest('label').addClass('steco_selected');

    var show = true;
    $(this.conditionsSelector + ' input[type="checkbox"]').each(function(_, checkbox) {
      if (!checkbox.checked) {
        show = false;
        if(complete)
          steco_payment.showIncompleteMessage($('.steco_summary'));
      }
    });

    this.collapseOptions();

    var selectedOption = this.getSelectedOption();
    if (!selectedOption) {
      show = false;
      if(complete)
        steco_payment.showIncompleteMessage($('.steco_payment'));
    }

    var incomplete = $('.steco-step.steco-incomplete');
    if(incomplete.length){
      $.each(incomplete,function(){
        if($(this).attr('id')=="st-checkout-personal-information-step" && $('input[name=steco_pi_form]:checked').val()==1 && steco_payment.verify_register(complete)){
            return true;
        }
        if($(this).attr('id')=="st-checkout-addresses-step" && $('input[name=steco_pi_form]:checked').val()==1 && steco_payment.verify_addresses(complete)){
            return true;
        }
        show = false;
        if(complete)
          steco_payment.showIncompleteMessage($(this).closest('.steco_block'));
      });
    }
    if($('#st-checkout-personal-information-step.steco-is_logged.steco-is_guest').length && !steco_payment.verify_register(complete)){
      show = false;
      if(complete)
        steco_payment.showIncompleteMessage($('.steco_personal_information'));
    }
    if($('#st-checkout-personal-information-step.steco-is_logged.steco-is_guest').length && !steco_payment.verify_addresses(complete)){
      show = false;
      if(complete)
        steco_payment.showIncompleteMessage($('.steco_addresses'));
    }
    //if edit/add address forum is open
    if($('#st-checkout-personal-information-step.steco-is_logged').length && !$('#st-checkout-personal-information-step.steco-is_logged').hasClass('steco-is_guest') && $('.steco_addresses_from.steco_display_none').length){
      show = false;
      if(complete)
        steco_payment.showIncompleteMessage($('.steco_addresses'));
    }

    $('#' + selectedOption + '-additional-information').show();
    $('#pay-with-' + selectedOption + '-form').show();

    $('.js-payment-binary').hide();
    if ($('#' + selectedOption).hasClass('binary')) {
      var paymentOption = this.getPaymentOptionSelector(selectedOption);
      this.hideConfirmation();
      $(paymentOption).show();

      if (show) {
        $(paymentOption).removeClass('disabled');
      } else {
        $(paymentOption).addClass('disabled');
      }
    } else {
      this.showConfirmation();
      // $(this.confirmationSelector + ' button[type="submit"]').attr('disabled', !show).toggleClass('steco_display_none', !show);
      // $(this.confirmationSelector + ' .steco_confirmation_btn').toggleClass('steco_display_none', show);
      steco_payment.everything_is_ready(show);
      if (show) {
        $(this.conditionAlertSelector).hide();
      } else {
        $(this.conditionAlertSelector).show();
      }
      if(show && complete){
        this.pre_confirm();
      }
    }
    return show;
  },
  verify_register: function(complete){
    var validate = this.validate_required_fields($('#steco_customer_form_register :input[required]'),complete);
    if(!validate)
      return validate;
    validate &= steco_address.verify($('#steco_customer_form_register input[name="email"]'));
    $('#steco_customer_form_register input[name="email"]').closest('.form-group ').toggleClass('st-has-error', !validate);
    if(!validate)
      return validate;
    validate &= steco_address.verify($('#steco_customer_form_register input[name="birthday"]'));
    $('#steco_customer_form_register input[name="birthday"]').closest('.form-group ').toggleClass('st-has-error', !validate);
    if(!validate)
      return validate;
    if($('#steco_customer_form_register input[name="steco_psgdpr_consent_checkbox"]').length){
      validate &= $('#steco_customer_form_register input[name="steco_psgdpr_consent_checkbox"]').prop('checked');
      $('#steco_customer_form_register input[name="steco_psgdpr_consent_checkbox"]').closest('.form-group ').toggleClass('st-has-error', !validate);
      if(!validate)
        return validate;
    }
    return validate;
  },
  verify_addresses: function(complete){
    var validate = this.validate_required_fields($('.st_address_form_delivery .steco_new_address_form :input[required]'),complete);
    if(!validate)
      return validate;
    validate &= steco_address.verify($('.st_address_form_delivery .steco_new_address_form input[name="phone"]'));
    $('.st_address_form_delivery .steco_new_address_form input[name="phone"]').closest('.form-group ').toggleClass('st-has-error', !validate);
    if(!validate)
      return validate;
    validate &= steco_address.verify($('.st_address_form_delivery .steco_new_address_form input[name="postcode"]'));
    $('.st_address_form_delivery .steco_new_address_form input[name="postcode"]').closest('.form-group ').toggleClass('st-has-error', !validate);
    if(!validate)
      return validate;
    validate &= steco_address.verify($('.st_address_form_delivery .steco_new_address_form input[name="firstname"]'));
    $('.st_address_form_delivery .steco_new_address_form input[name="firstname"]').closest('.form-group ').toggleClass('st-has-error', !validate);
    if(!validate)
      return validate;
    validate &= steco_address.verify($('.st_address_form_delivery .steco_new_address_form input[name="lastname"]'));
    $('.st_address_form_delivery .steco_new_address_form input[name="lastname"]').closest('.form-group ').toggleClass('st-has-error', !validate);
    if(!validate)
      return validate;

    if($('.st_address_form_delivery input[name="show_invoice_button"]').length && !$('.st_address_form_delivery input[name="show_invoice_button"]').prop('checked')){
      validate &= this.validate_required_fields($('.st_address_form_invoice .steco_new_address_form :input[required]'),complete);
      if(!validate)
        return validate;
      validate &= steco_address.verify($('.st_address_form_invoice .steco_new_address_form input[name="phone"]'));
      $('.st_address_form_invoice .steco_new_address_form input[name="phone"]').closest('.form-group ').toggleClass('st-has-error', !validate);
      if(!validate)
        return validate;
      validate &= steco_address.verify($('.st_address_form_invoice .steco_new_address_form input[name="postcode"]'));
      $('.st_address_form_invoice .steco_new_address_form input[name="postcode"]').closest('.form-group ').toggleClass('st-has-error', !validate);
      if(!validate)
        return validate;
      validate &= steco_address.verify($('.st_address_form_invoice .steco_new_address_form input[name="firstname"]'));
      $('.st_address_form_invoice .steco_new_address_form input[name="firstname"]').closest('.form-group ').toggleClass('st-has-error', !validate);
      if(!validate)
        return validate;
      validate &= steco_address.verify($('.st_address_form_invoice .steco_new_address_form input[name="lastname"]'));
      $('.st_address_form_invoice .steco_new_address_form input[name="lastname"]').closest('.form-group ').toggleClass('st-has-error', !validate);
      if(!validate)
        return validate;
    }
    return validate;
  },
  validate_required_fields: function(required_fields,complete){
    var res = true;

    $.each(required_fields, function(){
      if(!$(this).val() && $(this).val()!==0 && $(this).val()!=='0'){
        res = false;
        if(complete) {
          var name = $(this).attr('name')

          if ( name == 'email' ) name = 'fake_email';
          if ( name == 'password' ) name = 'fake_password';

          $('[name="' + name +'"]').closest('.form-group ').addClass('has-error');
        }
      }
    });
    return res;
  },
  showIncompleteMessage: function(dom, cls){
    if(!dom.length)
      return false;
    dom.addClass(typeof cls != 'undefined' ? cls : 'show_incomplete_message');
    $('body,html').animate({
      scrollTop: $('.show_incomplete_message:first').offset().top
    }, 'fast');
  },
  getPaymentOptionSelector: function(option){
    var moduleName = $('#'+option).data('module-name');

    return '.js-payment-'+moduleName;
  },
  pre_confirm: function(){
    steco.loading(0);
    $(this.confirmationSelector + ' button').trigger('click');

    console.log('pre_confirm');

    return;
    /*if(!this.toggleOrderButton({complete:true}))
      return false;*/
    /*steco.loading(0);
    if($('#st-checkout-personal-information-step.steco-is_logged').length && !$('#st-checkout-personal-information-step').hasClass('steco-is_guest')){
      this.process.validate_delivery=1;
      this.process.validate_invoice=1;
      this.process.pi_submit=1;
      this.process.shipping_submit=1;
      this.process.billing_submit=1;
    }
    this.master();*/
  },
  cancle_confirm: function(){
    $('#steco_progress').addClass('steco_display_none');
    steco.loading(false);
    steco_payment.everything_is_ready(false);
    //once an error occurs, start from beginning
    $.each(steco_payment.process, function(k,v){
      steco_payment.process[k]=0;
    });
  },
  master: function(){
    this.progress();
    if(!this.process.validate_delivery){
      this.validate_addresses(0);
      return true;
    }else if(this.process.validate_delivery==2){
      this.cancle_confirm();
      return true;
    }
    if(!this.process.validate_invoice){
      this.validate_addresses(1);
      return true;
    }else if(this.process.validate_invoice==2){
      this.cancle_confirm();
      return true;
    }
    if(!this.process.pi_submit){
      this.new_customer();
      return true;
    }else if(this.process.pi_submit==2){
      this.cancle_confirm();
      return true;
    }
    if(!this.process.shipping_submit){
      this.save_address(0);
      return true;
    }else if(this.process.shipping_submit==2){
      this.cancle_confirm();
      return true;
    }
    if(!this.process.billing_submit){
      this.save_address(1);
      return true;
    }else if(this.process.billing_submit==2){
      this.cancle_confirm();
      return true;
    }

    // if(!this.process.delivery_message_submit){
    //   this.save_delivery_message();
    //   return true;
    // }else if(this.process.delivery_message_submit==2){
    //   this.cancle_confirm();
    //   return true;
    // }
    $(this.confirmationSelector + ' button').trigger('click');
    // this.confirm();
  },
  progress: function(){
    var percent = 0;
      this.process.validate_delivery==1 && percent++;
      this.process.validate_invoice==1 && percent++;
      this.process.pi_submit==1 && percent++;
      this.process.shipping_submit==1 && percent++;
      this.process.billing_submit==1 && percent++;
      this.process.delivery_message_submit==1 && percent++;
      $('#steco_progress').removeClass('steco_display_none').find('#steco_progress_bar').css('width', parseInt(percent/7*100)+'%');
  },
  new_customer: function(){
      var $form = $('#steco_customer_form_register');
      if(!$form.length){
        steco_payment.process.pi_submit = 1;
        steco_payment.master();
        return;
      }

      if ( !steco_payment.verify_register(1) ) {
        return false;
      }
      if($form.find('input[name="steco_psgdpr_consent_checkbox"]').length){
        steco.gdprLog($form.find('input[name="steco_psgdpr_consent_checkbox"]'));
      }
      $form.find('.form-footer .steco-btn-spin').addClass('active');
      steco.loading(0);

      $.ajax(
      {
          type: 'POST',
          url: $form.attr('action') + '&items=0&final=1',
          data: $form.serialize(),
          dataType: 'json',
          cache: false
      }).then(function (resp) {
        steco.loading(false);
        steco.update_dom(resp);
        if(resp.is_logged){
          steco_payment.process.pi_submit = 1;
        }else{
          steco_payment.process.pi_submit = 2;
          steco.update_dom(resp);
        }

        steco_payment.validate_cart_addresses();
        // steco_payment.master();
        //
      }).fail(function (resp) {
        prestashop.emit('steco_payment_master_error', {eventType: 'authentication', resp: resp});
      });
  },
  validate_addresses: function(type){
    steco.loading(0);
    var formSelector = type ? '.st_address_form_invoice' : '.st_address_form_delivery';
    var $form = $(formSelector + ' .steco_new_address_form');
      $.ajax(
      {
          type: 'POST',
          url: steasycheckout.urls.validate_address+'&delivery_invoice='+$form.find('input[name="saveAddress"]').val(),
          data: $form.serialize(),
          dataType: 'json',
          cache: false
      }).then(function (resp) {
        if(!resp.r){
          if(type)
            steco_payment.process.validate_invoice = 2;
          else
            steco_payment.process.validate_delivery = 2;
          $(formSelector).replaceWith(resp.address_form);
        }else{
          if(type)
            steco_payment.process.validate_invoice = 1;
          else{
            steco_payment.process.validate_delivery = 1;
            if($form.find('input[name="show_invoice_button"]').prop('checked'))
              steco_payment.process.validate_invoice = 1;
          }

          if ( type == 0 && !$('#steco_customer_form_register input[name="show_invoice_button"]').prop('checked') ) steco_payment.save_address(1)
          else if ( !$('#st-checkout-personal-information-step.steco-is_logged').length || $('[name="register_account"]').is(':checked') ) steco_payment.new_customer();
          else steco_payment.validate_cart_addresses();
        }
        // steco_payment.master();
        steco_address.update_cart_info(true);

        steco.loading(false);

      }).fail(function (resp) {
        prestashop.emit('steco_payment_master_error', {eventType: 'validate_address', resp: resp}); 
      });
  },
  validate_cart_addresses: function(){
    steco.loading(0);
      $.ajax(
      {
          type: 'POST',
          url: steasycheckout.urls.validate_address+'&cart_addresses=' + ( $('#steco_customer_form_register input[name="show_invoice_button"]').prop('checked') ? 1 : 0 ),
          dataType: 'json',
          cache: false
      }).then(function (resp) {
        steco.loading(false);

        if ( !resp.d || !resp.i ) {
          resp.d ? $('#delivery-addresses + .js-address-error').hide() : $('#delivery-addresses + .js-address-error').show();
          resp.i ? $('#invoice-addresses + .js-address-error').hide() : $('#invoice-addresses + .js-address-error').show();
        } else {
          $('.js-address-error').hide()
          // steco.goToStep3();
          steco_payment.confirm();
        }
        steco_address.update_cart_info(true);

      }).fail(function (resp) {
        steco_payment.confirm();
        prestashop.emit('steco_payment_master_error', {eventType: 'validate_address', resp: resp}); 
      });
  },
  save_address: function(type){
      var $form = type ? $('.st_address_form_invoice .steco_new_address_form') : $('.st_address_form_delivery .steco_new_address_form');
      $.ajax(
      {
          type: 'POST',
          url: (type ? $form.attr('action').replace(/&items=\d+/,'&items=0') : $form.attr('action').replace(/&items=\d+/,'&items=0'))+'&final=1',
          data: $form.serialize(),
          dataType: 'json',
          cache: false
      }).then(function (resp) {
        if(resp.is_address_saved===0){
          if(type)
            steco_payment.process.billing_submit = 2;
          else
            steco_payment.process.shipping_submit = 2;
        }else{
          if(type)
            steco_payment.process.billing_submit = 1;
          else{
            steco_payment.process.shipping_submit = 1;
            if($form.find('input[name="show_invoice_button"]').prop('checked'))
              steco_payment.process.billing_submit = 0;
          }
        }
        steco.loading(false);
        var resp2 = {};
        resp2.summary_address = resp.summary_address;
        steco.update_dom(resp2);

        if ( resp.personal_information.indexOf('steco-is_logged') != -1 ) $('#st-checkout-personal-information-step').addClass('steco-is_logged');

        steco_payment.validate_addresses(type);
        // steco_payment.master();
      }).fail(function (resp) {
        prestashop.emit('steco_payment_master_error', {eventType: 'newAddress', resp: resp}); 
      });
  },
  save_delivery_message: function(){
    steco.loading(0);
    $.ajax({
          url: steasycheckout.urls.set_message,
          method: 'POST',
          dataType: 'json',
          data: {
              delivery_message: $('#delivery_message').val(),
          },
          cache: false
        }).then(function (resp) {
          steco.loading(false);
          steco_payment.process.delivery_message_submit = 1;
          // steco_payment.master();
          window.location = window.location + '?checkout';
        }).fail(function(resp) {
          prestashop.emit('steco_payment_master_error', {eventType: 'setMessage', resp: resp});          
        });
  },
  true_confirm: function() {
    if ( $('#st-checkout-personal-information-step.steco-is_logged').length ) {
      steco_payment.validate_cart_addresses();
    } else {
      steco_payment.confirm();
    }
  },
  confirm: function(){

    if ( $('.steco_new_address_form input[name="firstname"]:visible').length && !$('#st-checkout-personal-information-step.steco-is_logged').length ) {
      steco.loading(0);
      steco_payment.save_address(0);

      if ( $('.st_address_form_invoice .steco_new_address_form').is(':visible') ) steco_payment.save_address(1);
      return false;
    }

    if ( $('.steco_new_address_form .new_adress:visible').length ) {
      $('.steco_new_address_form .new_adress:visible').trigger('click');
      return false;
    }

    if ( $('.steco_new_address_form input[name="firstname"]:visible').length && !$('#st-checkout-personal-information-step.steco-is_logged').length ) {
      steco.loading(0);
      steco_payment.save_address(0);
      return false;
    }

    var show = true;
    $(this.conditionsSelector + ' input[type="checkbox"]').each(function(_, checkbox) {
      if (!checkbox.checked) {
        show = false;
        steco_payment.showIncompleteMessage($('.steco_summary'));
      }
    });

    if ( !show ) return;

    var option = this.getSelectedOption();

    if (option) {
      var module_name = $('#'+option).data('module-name');
      if(steasycheckout.payments_no_submit && module_name){
        if((steasycheckout.payments_no_submit+',').indexOf((module_name+',')) != -1)
          return false;
      }

      steco.clearCartInputs();


      // console.log('submited');
      $('#pay-with-' + option + '-form form').submit();
    }
  }
};



/*!
* jquery.inputmask.bundle.js
* https://github.com/RobinHerbots/jquery.inputmask
* Copyright (c) 2010 - 2017 Robin Herbots
* Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
* Version: 3.3.5-34
*/
!function(a){function b(d,e,f){return this instanceof b?(this.el=void 0,this.events={},this.maskset=void 0,this.refreshValue=!1,void(f!==!0&&(a.isPlainObject(d)?e=d:(e=e||{},e.alias=d),this.opts=a.extend(!0,{},this.defaults,e),this.noMasksCache=e&&void 0!==e.definitions,this.userOptions=e||{},this.isRTL=this.opts.numericInput,c(this.opts.alias,e,this.opts)))):new b(d,e,f)}function c(d,e,f){var g=b.prototype.aliases[d];return g?(g.alias&&c(g.alias,void 0,f),a.extend(!0,f,g),a.extend(!0,f,e),!0):(null===f.mask&&(f.mask=d),!1)}function d(c,d){function e(c,e,f){if(null!==c&&""!==c){if(1===c.length&&f.greedy===!1&&0!==f.repeat&&(f.placeholder=""),f.repeat>0||"*"===f.repeat||"+"===f.repeat){var g="*"===f.repeat?0:"+"===f.repeat?1:f.repeat;c=f.groupmarker.start+c+f.groupmarker.end+f.quantifiermarker.start+g+","+f.repeat+f.quantifiermarker.end}var h;return void 0===b.prototype.masksCache[c]||d===!0?(h={mask:c,maskToken:b.prototype.analyseMask(c,f),validPositions:{},_buffer:void 0,buffer:void 0,tests:{},metadata:e,maskLength:void 0},d!==!0&&(b.prototype.masksCache[f.numericInput?c.split("").reverse().join(""):c]=h,h=a.extend(!0,{},b.prototype.masksCache[f.numericInput?c.split("").reverse().join(""):c]))):h=a.extend(!0,{},b.prototype.masksCache[f.numericInput?c.split("").reverse().join(""):c]),h}}var f;if(a.isFunction(c.mask)&&(c.mask=c.mask(c)),a.isArray(c.mask)){if(c.mask.length>1){c.keepStatic=null===c.keepStatic||c.keepStatic;var g=c.groupmarker.start;return a.each(c.numericInput?c.mask.reverse():c.mask,function(b,d){g.length>1&&(g+=c.groupmarker.end+c.alternatormarker+c.groupmarker.start),g+=void 0===d.mask||a.isFunction(d.mask)?d:d.mask}),g+=c.groupmarker.end,e(g,c.mask,c)}c.mask=c.mask.pop()}return c.mask&&(f=void 0===c.mask.mask||a.isFunction(c.mask.mask)?e(c.mask,c.mask,c):e(c.mask.mask,c.mask,c)),f}function e(c,d,f){function k(a,b,c){b=b||0;var d,e,g,h=[],i=0,j=n();S=void 0!==V?V.maxLength:void 0,S===-1&&(S=void 0);do a===!0&&l().validPositions[i]?(g=l().validPositions[i],e=g.match,d=g.locator.slice(),h.push(c===!0?g.input:c===!1?e.nativeDef:F(i,e))):(g=q(i,d,i-1),e=g.match,d=g.locator.slice(),(f.jitMasking===!1||i<j||"number"==typeof f.jitMasking&&isFinite(f.jitMasking)&&f.jitMasking>i)&&h.push(c===!1?e.nativeDef:F(i,e))),i++;while((void 0===S||i<S)&&(null!==e.fn||""!==e.def)||b>i);return""===h[h.length-1]&&h.pop(),l().maskLength=i+1,h}function l(){return d}function m(a){var b=l();b.buffer=void 0,a!==!0&&(b._buffer=void 0,b.validPositions={},b.p=0)}function n(a,b,c){var d=-1,e=-1,f=c||l().validPositions;void 0===a&&(a=-1);for(var g in f){var h=parseInt(g);f[h]&&(b||f[h].generatedInput!==!0)&&(h<=a&&(d=h),h>=a&&(e=h))}return d!==-1&&a-d>1||e<a?d:e}function o(b,c,d,e){function g(a){var b=l().validPositions[a];if(void 0!==b&&null===b.match.fn){var c=l().validPositions[a-1],d=l().validPositions[a+1];return void 0!==c&&void 0!==d}return!1}var h,i=b,j=a.extend(!0,{},l().validPositions),k=!1;for(l().p=b,h=c-1;h>=i;h--)void 0!==l().validPositions[h]&&(d!==!0&&(!l().validPositions[h].match.optionality&&g(h)||f.canClearPosition(l(),h,n(),e,f)===!1)||delete l().validPositions[h]);for(m(!0),h=i+1;h<=n();){for(;void 0!==l().validPositions[i];)i++;if(h<i&&(h=i+1),void 0===l().validPositions[h]&&A(h))h++;else{var o=q(h);k===!1&&j[i]&&j[i].match.def===o.match.def?(l().validPositions[i]=a.extend(!0,{},j[i]),l().validPositions[i].input=o.input,delete l().validPositions[h],h++):s(i,o.match.def)?z(i,o.input||F(h),!0)!==!1&&(delete l().validPositions[h],h++,k=!0):A(h)||(h++,i--),i++}}m(!0)}function p(a,b){for(var c,d=a,e=n(),g=l().validPositions[e]||t(0)[0],h=void 0!==g.alternation?g.locator[g.alternation].toString().split(","):[],i=0;i<d.length&&(c=d[i],!(c.match&&(f.greedy&&c.match.optionalQuantifier!==!0||(c.match.optionality===!1||c.match.newBlockMarker===!1)&&c.match.optionalQuantifier!==!0)&&(void 0===g.alternation||g.alternation!==c.alternation||void 0!==c.locator[g.alternation]&&y(c.locator[g.alternation].toString().split(","),h)))||b===!0&&(null!==c.match.fn||/[0-9a-bA-Z]/.test(c.match.def)));i++);return c}function q(a,b,c){return l().validPositions[a]||p(t(a,b?b.slice():b,c))}function r(a){return l().validPositions[a]?l().validPositions[a]:t(a)[0]}function s(a,b){for(var c=!1,d=t(a),e=0;e<d.length;e++)if(d[e].match&&d[e].match.def===b){c=!0;break}return c}function t(b,c,d){function e(c,d,g,h){function j(g,h,m){function p(b,c){var d=0===a.inArray(b,c.matches);return d||a.each(c.matches,function(a,e){if(e.isQuantifier===!0&&(d=p(b,c.matches[a-1])))return!1}),d}function r(b,c,d){var e,f;return(l().tests[b]||l().validPositions[b])&&a.each(l().tests[b]||[l().validPositions[b]],function(a,b){var g=void 0!==d?d:b.alternation,h=void 0!==b.locator[g]?b.locator[g].toString().indexOf(c):-1;(void 0===f||h<f)&&h!==-1&&(e=b,f=h)}),e?e.locator.slice((void 0!==d?d:e.alternation)+1):void 0!==d?r(b,c):void 0}function s(a,c){return null===a.match.fn&&null!==c.match.fn&&c.match.fn.test(a.match.def,l(),b,!1,f,!1)}if(k>1e4)throw"Inputmask: There is probably an error in your mask definition or in the code. Create an issue on github with an example of the mask you are using. "+l().mask;if(k===b&&void 0===g.matches)return n.push({match:g,locator:h.reverse(),cd:q}),!0;if(void 0!==g.matches){if(g.isGroup&&m!==g){if(g=j(c.matches[a.inArray(g,c.matches)+1],h))return!0}else if(g.isOptional){var t=g;if(g=e(g,d,h,m)){if(i=n[n.length-1].match,!p(i,t))return!0;o=!0,k=b}}else if(g.isAlternator){var u,v=g,w=[],x=n.slice(),y=h.length,z=d.length>0?d.shift():-1;if(z===-1||"string"==typeof z){var A,B=k,C=d.slice(),D=[];if("string"==typeof z)D=z.split(",");else for(A=0;A<v.matches.length;A++)D.push(A);for(var E=0;E<D.length;E++){if(A=parseInt(D[E]),n=[],d=r(k,A,y)||C.slice(),g=j(v.matches[A]||c.matches[A],[A].concat(h),m)||g,g!==!0&&void 0!==g&&D[D.length-1]<v.matches.length){var F=a.inArray(g,c.matches)+1;c.matches.length>F&&(g=j(c.matches[F],[F].concat(h.slice(1,h.length)),m),g&&(D.push(F.toString()),a.each(n,function(a,b){b.alternation=h.length-1})))}u=n.slice(),k=B,n=[];for(var G=0;G<u.length;G++){var H=u[G],I=!1;H.alternation=H.alternation||y;for(var J=0;J<w.length;J++){var K=w[J];if(("string"!=typeof z||a.inArray(H.locator[H.alternation].toString(),D)!==-1)&&(H.match.def===K.match.def||s(H,K))){I=H.match.nativeDef===K.match.nativeDef,H.alternation==K.alternation&&K.locator[K.alternation].toString().indexOf(H.locator[H.alternation])===-1&&(K.locator[K.alternation]=K.locator[K.alternation]+","+H.locator[H.alternation],K.alternation=H.alternation,null==H.match.fn&&(K.na=K.na||H.locator[H.alternation].toString(),K.na.indexOf(H.locator[H.alternation])===-1&&(K.na=K.na+","+H.locator[H.alternation])));break}}I||w.push(H)}}"string"==typeof z&&(w=a.map(w,function(b,c){if(isFinite(c)){var d,e=b.alternation,f=b.locator[e].toString().split(",");b.locator[e]=void 0,b.alternation=void 0;for(var g=0;g<f.length;g++)d=a.inArray(f[g],D)!==-1,d&&(void 0!==b.locator[e]?(b.locator[e]+=",",b.locator[e]+=f[g]):b.locator[e]=parseInt(f[g]),b.alternation=e);if(void 0!==b.locator[e])return b}})),n=x.concat(w),k=b,o=n.length>0,d=C.slice()}else g=j(v.matches[z]||c.matches[z],[z].concat(h),m);if(g)return!0}else if(g.isQuantifier&&m!==c.matches[a.inArray(g,c.matches)-1])for(var L=g,M=d.length>0?d.shift():0;M<(isNaN(L.quantifier.max)?M+1:L.quantifier.max)&&k<=b;M++){var N=c.matches[a.inArray(L,c.matches)-1];if(g=j(N,[M].concat(h),N)){if(i=n[n.length-1].match,i.optionalQuantifier=M>L.quantifier.min-1,p(i,N)){if(M>L.quantifier.min-1){o=!0,k=b;break}return!0}return!0}}else if(g=e(g,d,h,m))return!0}else k++}for(var m=d.length>0?d.shift():0;m<c.matches.length;m++)if(c.matches[m].isQuantifier!==!0){var p=j(c.matches[m],[m].concat(g),h);if(p&&k===b)return p;if(k>b)break}}function g(b){var c=[];return a.isArray(b)||(b=[b]),b.length>0&&(void 0===b[0].alternation?(c=p(b.slice()).locator.slice(),0===c.length&&(c=b[0].locator.slice())):a.each(b,function(a,b){if(""!==b.def)if(0===c.length)c=b.locator.slice();else for(var d=0;d<c.length;d++)b.locator[d]&&c[d].toString().indexOf(b.locator[d])===-1&&(c[d]+=","+b.locator[d])})),c}function h(a){return f.keepStatic&&b>0&&a.length>1+(""===a[a.length-1].match.def?1:0)&&a[0].match.optionality!==!0&&a[0].match.optionalQuantifier!==!0&&null===a[0].match.fn&&!/[0-9a-bA-Z]/.test(a[0].match.def)?[p(a)]:a}var i,j=l().maskToken,k=c?d:0,m=c?c.slice():[0],n=[],o=!1,q=c?c.join(""):"";if(b>-1){if(void 0===c){for(var r,s=b-1;void 0===(r=l().validPositions[s]||l().tests[s])&&s>-1;)s--;void 0!==r&&s>-1&&(m=g(r),q=m.join(""),k=s)}if(l().tests[b]&&l().tests[b][0].cd===q)return h(l().tests[b]);for(var t=m.shift();t<j.length;t++){var u=e(j[t],m,[t]);if(u&&k===b||k>b)break}}return(0===n.length||o)&&n.push({match:{fn:null,cardinality:0,optionality:!0,casing:null,def:"",placeholder:""},locator:[],cd:q}),void 0!==c&&l().tests[b]?h(a.extend(!0,[],n)):(l().tests[b]=a.extend(!0,[],n),h(l().tests[b]))}function u(){return void 0===l()._buffer&&(l()._buffer=k(!1,1),void 0===l().buffer&&l()._buffer.slice()),l()._buffer}function v(a){return void 0!==l().buffer&&a!==!0||(l().buffer=k(!0,n(),!0)),l().buffer}function w(a,b,c){var d;if(a===!0)m(),a=0,b=c.length;else for(d=a;d<b;d++)delete l().validPositions[d];for(d=a;d<b;d++)m(!0),c[d]!==f.skipOptionalPartCharacter&&z(d,c[d],!0,!0)}function x(a,c,d){switch(f.casing||c.casing){case"upper":a=a.toUpperCase();break;case"lower":a=a.toLowerCase();break;case"title":var e=l().validPositions[d-1];a=0===d||e&&e.input===String.fromCharCode(b.keyCode.SPACE)?a.toUpperCase():a.toLowerCase()}return a}function y(b,c,d){for(var e,g=f.greedy?c:c.slice(0,1),h=!1,i=void 0!==d?d.split(","):[],j=0;j<i.length;j++)(e=b.indexOf(i[j]))!==-1&&b.splice(e,1);for(var k=0;k<b.length;k++)if(a.inArray(b[k],g)!==-1){h=!0;break}return h}function z(c,d,e,g,h){function i(a){var b=W?a.begin-a.end>1||a.begin-a.end===1&&f.insertMode:a.end-a.begin>1||a.end-a.begin===1&&f.insertMode;return b&&0===a.begin&&a.end===l().maskLength?"full":b}function j(b,d,e){var h=!1;return a.each(t(b),function(j,k){for(var p=k.match,q=d?1:0,r="",s=p.cardinality;s>q;s--)r+=D(b-(s-1));if(d&&(r+=d),v(!0),h=null!=p.fn?p.fn.test(r,l(),b,e,f,i(c)):(d===p.def||d===f.skipOptionalPartCharacter)&&""!==p.def&&{c:F(b,p,!0)||p.def,pos:b},h!==!1){var t=void 0!==h.c?h.c:d;t=t===f.skipOptionalPartCharacter&&null===p.fn?F(b,p,!0)||p.def:t;var y=b,A=v();if(void 0!==h.remove&&(a.isArray(h.remove)||(h.remove=[h.remove]),a.each(h.remove.sort(function(a,b){return b-a}),function(a,b){o(b,b+1,!0)})),void 0!==h.insert&&(a.isArray(h.insert)||(h.insert=[h.insert]),a.each(h.insert.sort(function(a,b){return a-b}),function(a,b){z(b.pos,b.c,!0,g)})),h.refreshFromBuffer){var B=h.refreshFromBuffer;if(e=!0,w(B===!0?B:B.start,B.end,A),void 0===h.pos&&void 0===h.c)return h.pos=n(),!1;if(y=void 0!==h.pos?h.pos:b,y!==b)return h=a.extend(h,z(y,t,!0,g)),!1}else if(h!==!0&&void 0!==h.pos&&h.pos!==b&&(y=h.pos,w(b,y,v().slice()),y!==b))return h=a.extend(h,z(y,t,!0)),!1;return(h===!0||void 0!==h.pos||void 0!==h.c)&&(j>0&&m(!0),u(y,a.extend({},k,{input:x(t,p,y)}),g,i(c))||(h=!1),!1)}}),h}function k(b,c,d){var e,h,i,j,k,o,p,q,r=a.extend(!0,{},l().validPositions),s=!1,u=n();for(j=l().validPositions[u];u>=0;u--)if(i=l().validPositions[u],i&&void 0!==i.alternation){if(e=u,h=l().validPositions[e].alternation,j.locator[i.alternation]!==i.locator[i.alternation])break;j=i}if(void 0!==h){q=parseInt(e);var v=void 0!==j.locator[j.alternation||h]?j.locator[j.alternation||h]:p[0];v.length>0&&(v=v.split(",")[0]);var w=l().validPositions[q],x=l().validPositions[q-1];a.each(t(q,x?x.locator:void 0,q-1),function(e,i){p=i.locator[h]?i.locator[h].toString().split(","):[];for(var j=0;j<p.length;j++){var t=[],u=0,x=0,y=!1;if(v<p[j]&&(void 0===i.na||a.inArray(p[j],i.na.split(","))===-1)){l().validPositions[q]=a.extend(!0,{},i);var A=l().validPositions[q].locator;for(l().validPositions[q].locator[h]=parseInt(p[j]),null==i.match.fn?(w.input!==i.match.def&&(y=!0,w.generatedInput!==!0&&t.push(w.input)),x++,l().validPositions[q].generatedInput=!/[0-9a-bA-Z]/.test(i.match.def),l().validPositions[q].input=i.match.def):l().validPositions[q].input=w.input,k=q+1;k<n(void 0,!0)+1;k++)o=l().validPositions[k],o&&o.generatedInput!==!0&&/[0-9a-bA-Z]/.test(o.input)?t.push(o.input):k<b&&u++,delete l().validPositions[k];for(y&&t[0]===i.match.def&&t.shift(),m(!0),s=!0;t.length>0;){var B=t.shift();if(B!==f.skipOptionalPartCharacter&&!(s=z(n(void 0,!0)+1,B,!1,g,!0)))break}if(s){l().validPositions[q].locator=A;var C=n(b)+1;for(k=q+1;k<n()+1;k++)o=l().validPositions[k],(void 0===o||null==o.match.fn)&&k<b+(x-u)&&x++;b+=x-u,s=z(b>C?C:b,c,d,g,!0)}if(s)return!1;m(),l().validPositions=a.extend(!0,{},r)}}})}return s}function r(b,c){var d=l().validPositions[c];if(d)for(var e=d.locator,f=e.length,g=b;g<c;g++)if(void 0===l().validPositions[g]&&!A(g,!0)){var h=t(g).slice(),i=p(h,!0),k=-1;""===h[h.length-1].match.def&&h.pop(),a.each(h,function(a,b){for(var c=0;c<f;c++){if(void 0===b.locator[c]||!y(b.locator[c].toString().split(","),e[c].toString().split(","),b.na)){var d=e[c],g=i.locator[c],h=b.locator[c];d-g>Math.abs(d-h)&&(i=b);break}k<c&&(k=c,i=b)}}),i=a.extend({},i,{input:F(g,i.match,!0)||i.match.def}),i.generatedInput=!0,u(g,i,!0),l().validPositions[c]=void 0,j(c,d.input,!0)}}function u(b,c,d,e){if(e||f.insertMode&&void 0!==l().validPositions[b]&&void 0===d){var g,h=a.extend(!0,{},l().validPositions),i=n(void 0,!0);for(g=b;g<=i;g++)delete l().validPositions[g];l().validPositions[b]=a.extend(!0,{},c);var j,k=!0,o=l().validPositions,p=!1,q=l().maskLength;for(g=j=b;g<=i;g++){var r=h[g];if(void 0!==r)for(var t=j;t<l().maskLength&&(null===r.match.fn&&o[g]&&(o[g].match.optionalQuantifier===!0||o[g].match.optionality===!0)||null!=r.match.fn);){if(t++,p===!1&&h[t]&&h[t].match.def===r.match.def)l().validPositions[t]=a.extend(!0,{},h[t]),l().validPositions[t].input=r.input,C(t),j=t,k=!0;else if(s(t,r.match.def)){var u=z(t,r.input,!0,!0);k=u!==!1,j=u.caret||u.insert?n():t,p=!0}else if(k=r.generatedInput===!0,!k&&t>=l().maskLength-1)break;if(l().maskLength<q&&(l().maskLength=q),k)break}if(!k)break}if(!k)return l().validPositions=a.extend(!0,{},h),m(!0),!1}else l().validPositions[b]=a.extend(!0,{},c);return m(!0),!0}function C(b){for(var c=b-1;c>-1&&!l().validPositions[c];c--);var d,e;for(c++;c<b;c++)void 0===l().validPositions[c]&&(f.jitMasking===!1||f.jitMasking>c)&&(e=t(c,q(c-1).locator,c-1).slice(),""===e[e.length-1].match.def&&e.pop(),d=p(e),d&&(d.match.def===f.radixPointDefinitionSymbol||!A(c,!0)||a.inArray(f.radixPoint,v())<c&&d.match.fn&&d.match.fn.test(F(c),l(),c,!1,f))&&(G=j(c,F(c,d.match,!0)||(null==d.match.fn?d.match.def:""!==F(c)?F(c):v()[c]),!0),G!==!1&&(l().validPositions[G.pos||c].generatedInput=!0)))}e=e===!0;var E=c;void 0!==c.begin&&(E=W&&!i(c)?c.end:c.begin);var G=!1,H=a.extend(!0,{},l().validPositions);if(C(E),i(c)&&(M(void 0,b.keyCode.DELETE,c),E=l().p),E<l().maskLength&&(G=j(E,d,e),(!e||g===!0)&&G===!1)){var I=l().validPositions[E];if(!I||null!==I.match.fn||I.match.def!==d&&d!==f.skipOptionalPartCharacter){if((f.insertMode||void 0===l().validPositions[B(E)])&&!A(E,!0))for(var J=E+1,K=B(E);J<=K;J++)if(G=j(J,d,e),G!==!1){r(E,void 0!==G.pos?G.pos:J),E=J;break}}else G={caret:B(E)}}return G===!1&&f.keepStatic&&!e&&h!==!0&&(G=k(E,d,e)),G===!0&&(G={pos:E}),a.isFunction(f.postValidation)&&G!==!1&&!e&&g!==!0&&(G=!!f.postValidation(v(!0),G,f)&&G),void 0===G.pos&&(G.pos=E),G===!1&&(m(!0),l().validPositions=a.extend(!0,{},H)),G}function A(a,b){var c;if(b?(c=q(a).match,""===c.def&&(c=r(a).match)):c=r(a).match,null!=c.fn)return c.fn;if(b!==!0&&a>-1){var d=t(a);return d.length>1+(""===d[d.length-1].match.def?1:0)}return!1}function B(a,b){var c=l().maskLength;if(a>=c)return c;for(var d=a;++d<c&&(b===!0&&(r(d).match.newBlockMarker!==!0||!A(d))||b!==!0&&!A(d)););return d}function C(a,b){var c,d=a;if(d<=0)return 0;for(;--d>0&&(b===!0&&r(d).match.newBlockMarker!==!0||b!==!0&&!A(d)&&(c=t(d),c.length<2||2===c.length&&""===c[1].match.def)););return d}function D(a){return void 0===l().validPositions[a]?F(a):l().validPositions[a].input}function E(b,c,d,e,g){if(e&&a.isFunction(f.onBeforeWrite)){var h=f.onBeforeWrite(e,c,d,f);if(h){if(h.refreshFromBuffer){var i=h.refreshFromBuffer;w(i===!0?i:i.start,i.end,h.buffer||c),c=v(!0)}void 0!==d&&(d=void 0!==h.caret?h.caret:d)}}b.inputmask._valueSet(c.join("")),void 0===d||void 0!==e&&"blur"===e.type?O(b,c,d):I(b,d),g===!0&&(Y=!0,a(b).trigger("input"))}function F(b,c,d){if(c=c||r(b).match,void 0!==c.placeholder||d===!0)return a.isFunction(c.placeholder)?c.placeholder(f):c.placeholder;if(null===c.fn){if(b>-1&&void 0===l().validPositions[b]){var e,g=t(b),h=[];if(g.length>1+(""===g[g.length-1].match.def?1:0))for(var i=0;i<g.length;i++)if(g[i].match.optionality!==!0&&g[i].match.optionalQuantifier!==!0&&(null===g[i].match.fn||void 0===e||g[i].match.fn.test(e.match.def,l(),b,!0,f)!==!1)&&(h.push(g[i]),null===g[i].match.fn&&(e=g[i]),h.length>1&&/[0-9a-bA-Z]/.test(h[0].match.def)))return f.placeholder.charAt(b%f.placeholder.length)}return c.def}return f.placeholder.charAt(b%f.placeholder.length)}function G(c,d,e,g,h,i){function j(){var a=!1,b=u().slice(p,B(p)).join("").indexOf(o);if(b!==-1&&!A(p)){a=!0;for(var c=u().slice(p,p+b),d=0;d<c.length;d++)if(" "!==c[d]){a=!1;break}}return a}var k=g.slice(),o="",p=0,r=void 0;if(m(),l().p=B(-1),!e)if(f.autoUnmask!==!0){var s=u().slice(0,B(-1)).join(""),t=k.join("").match(new RegExp("^"+b.escapeRegex(s),"g"));t&&t.length>0&&(k.splice(0,t.length*s.length),p=B(p))}else p=B(p);if(a.each(k,function(b,d){if(void 0!==d){var g=new a.Event("keypress");g.which=d.charCodeAt(0),o+=d;var h=n(void 0,!0),i=l().validPositions[h],k=q(h+1,i?i.locator.slice():void 0,h);if(!j()||e||f.autoUnmask){var s=e?b:null==k.match.fn&&k.match.optionality&&h+1<l().p?h+1:l().p;r=aa.keypressEvent.call(c,g,!0,!1,e,s),p=s+1,o=""}else r=aa.keypressEvent.call(c,g,!0,!1,!0,h+1);if(!e&&a.isFunction(f.onBeforeWrite)&&(r=f.onBeforeWrite(g,v(),r.forwardPosition,f),r&&r.refreshFromBuffer)){var t=r.refreshFromBuffer;w(t===!0?t:t.start,t.end,r.buffer),m(!0),r.caret&&(l().p=r.caret)}}}),d){var x=void 0,y=n();document.activeElement===c&&(h||r)&&(x=I(c).begin,h&&r===!1&&(x=B(n(x))),r&&i!==!0&&(x<y+1||y===-1)&&(x=f.numericInput&&void 0===r.caret?C(r.forwardPosition):r.forwardPosition)),E(c,v(),x,h||new a.Event("checkval"))}}function H(b){if(b){if(void 0===b.inputmask)return b.value;b.inputmask&&b.inputmask.refreshValue&&aa.setValueEvent.call(b)}var c=[],d=l().validPositions;for(var e in d)d[e].match&&null!=d[e].match.fn&&c.push(d[e].input);var g=0===c.length?"":(W?c.reverse():c).join("");if(a.isFunction(f.onUnMask)){var h=(W?v().slice().reverse():v()).join("");g=f.onUnMask(h,g,f)||g}return g}function I(a,b,c,d){function e(a){if(d!==!0&&W&&"number"==typeof a&&(!f.greedy||""!==f.placeholder)){var b=v().join("").length;a=b-a}return a}var h;if("number"!=typeof b)return a.setSelectionRange?(b=a.selectionStart,c=a.selectionEnd):window.getSelection?(h=window.getSelection().getRangeAt(0),h.commonAncestorContainer.parentNode!==a&&h.commonAncestorContainer!==a||(b=h.startOffset,c=h.endOffset)):document.selection&&document.selection.createRange&&(h=document.selection.createRange(),b=0-h.duplicate().moveStart("character",-a.inputmask._valueGet().length),c=b+h.text.length),{begin:e(b),end:e(c)};b=e(b),c=e(c),c="number"==typeof c?c:b;var i=parseInt(((a.ownerDocument.defaultView||window).getComputedStyle?(a.ownerDocument.defaultView||window).getComputedStyle(a,null):a.currentStyle).fontSize)*c;if(a.scrollLeft=i>a.scrollWidth?i:0,g||f.insertMode!==!1||b!==c||c++,a.setSelectionRange)a.selectionStart=b,a.selectionEnd=c;else if(window.getSelection){if(h=document.createRange(),void 0===a.firstChild||null===a.firstChild){var j=document.createTextNode("");a.appendChild(j)}h.setStart(a.firstChild,b<a.inputmask._valueGet().length?b:a.inputmask._valueGet().length),h.setEnd(a.firstChild,c<a.inputmask._valueGet().length?c:a.inputmask._valueGet().length),h.collapse(!0);var k=window.getSelection();k.removeAllRanges(),k.addRange(h)}else a.createTextRange&&(h=a.createTextRange(),h.collapse(!0),h.moveEnd("character",c),h.moveStart("character",b),h.select());O(a,void 0,{begin:b,end:c})}function J(b){var c,d,e=v(),f=e.length,g=n(),h={},i=l().validPositions[g],j=void 0!==i?i.locator.slice():void 0;for(c=g+1;c<e.length;c++)d=q(c,j,c-1),j=d.locator.slice(),h[c]=a.extend(!0,{},d);var k=i&&void 0!==i.alternation?i.locator[i.alternation]:void 0;for(c=f-1;c>g&&(d=h[c],(d.match.optionality||d.match.optionalQuantifier||k&&(k!==h[c].locator[i.alternation]&&null!=d.match.fn||null===d.match.fn&&d.locator[i.alternation]&&y(d.locator[i.alternation].toString().split(","),k.toString().split(","))&&""!==t(c)[0].def))&&e[c]===F(c,d.match));c--)f--;return b?{l:f,def:h[f]?h[f].match:void 0}:f}function K(a){for(var b,c=J(),d=a.length;c<d&&!A(c+1)&&(b=r(c+1))&&b.match.optionality!==!0&&b.match.optionalQuantifier!==!0;)c++;for(;(b=r(c-1))&&b.match.optionality&&b.input===f.skipOptionalPartCharacter;)c--;return a.splice(c),a}function L(b){if(a.isFunction(f.isComplete))return f.isComplete(b,f);if("*"!==f.repeat){var c=!1,d=J(!0),e=C(d.l);if(void 0===d.def||d.def.newBlockMarker||d.def.optionality||d.def.optionalQuantifier){c=!0;for(var g=0;g<=e;g++){var h=q(g).match;if(null!==h.fn&&void 0===l().validPositions[g]&&h.optionality!==!0&&h.optionalQuantifier!==!0||null===h.fn&&b[g]!==F(g,h)){c=!1;break}}}return c}}function M(c,d,e,g){function h(){if(f.keepStatic){for(var b=[],d=n(-1,!0),e=a.extend(!0,{},l().validPositions),g=l().validPositions[d];d>=0;d--){var h=l().validPositions[d];if(h){if(h.generatedInput!==!0&&/[0-9a-bA-Z]/.test(h.input)&&b.push(h.input),delete l().validPositions[d],void 0!==h.alternation&&h.locator[h.alternation]!==g.locator[h.alternation])break;g=h}}if(d>-1)for(l().p=B(n(-1,!0));b.length>0;){var i=new a.Event("keypress");i.which=b.pop().charCodeAt(0),aa.keypressEvent.call(c,i,!0,!1,!1,l().p)}else l().validPositions=a.extend(!0,{},e)}}if((f.numericInput||W)&&(d===b.keyCode.BACKSPACE?d=b.keyCode.DELETE:d===b.keyCode.DELETE&&(d=b.keyCode.BACKSPACE),W)){var i=e.end;e.end=e.begin,e.begin=i}d===b.keyCode.BACKSPACE&&(e.end-e.begin<1||f.insertMode===!1)?(e.begin=C(e.begin),void 0===l().validPositions[e.begin]||l().validPositions[e.begin].input!==f.groupSeparator&&l().validPositions[e.begin].input!==f.radixPoint||e.begin--):d===b.keyCode.DELETE&&e.begin===e.end&&(e.end=A(e.end,!0)?e.end+1:B(e.end)+1,void 0===l().validPositions[e.begin]||l().validPositions[e.begin].input!==f.groupSeparator&&l().validPositions[e.begin].input!==f.radixPoint||e.end++),o(e.begin,e.end,!1,g),g!==!0&&h();var j=n(e.begin,!0);j<e.begin?l().p=B(j):g!==!0&&(l().p=e.begin)}function N(b){function c(a){var c,d=document.createElement("span");for(var e in g)isNaN(e)&&e.indexOf("font")!==-1&&(d.style[e]=g[e]);d.style.textTransform=g.textTransform,d.style.letterSpacing=g.letterSpacing,d.style.position="absolute",d.style.height="auto",d.style.width="auto",d.style.visibility="hidden",d.style.whiteSpace="nowrap",document.body.appendChild(d);var f,h=b.inputmask._valueGet(),i=0;for(c=0,f=h.length;c<=f;c++){if(d.innerHTML+=h.charAt(c)||"_",d.offsetWidth>=a){var j=a-i,k=d.offsetWidth-a;d.innerHTML=h.charAt(c),j-=d.offsetWidth/3,c=j<k?c-1:c;break}i=d.offsetWidth}return document.body.removeChild(d),c}function d(){T.style.position="absolute",T.style.top=e.top+"px",T.style.left=e.left+"px",T.style.width=parseInt(b.offsetWidth)-parseInt(g.paddingLeft)-parseInt(g.paddingRight)-parseInt(g.borderLeftWidth)-parseInt(g.borderRightWidth)+"px",T.style.height=parseInt(b.offsetHeight)-parseInt(g.paddingTop)-parseInt(g.paddingBottom)-parseInt(g.borderTopWidth)-parseInt(g.borderBottomWidth)+"px",T.style.lineHeight=T.style.height,T.style.zIndex=isNaN(g.zIndex)?-1:g.zIndex-1,T.style.webkitAppearance="textfield",T.style.mozAppearance="textfield",T.style.Appearance="textfield"}var e=a(b).position(),g=(b.ownerDocument.defaultView||window).getComputedStyle(b,null);b.parentNode;T=document.createElement("div"),document.body.appendChild(T);for(var h in g)isNaN(h)&&"cssText"!==h&&h.indexOf("webkit")==-1&&(T.style[h]=g[h]);b.style.backgroundColor="transparent",b.style.color="transparent",b.style.webkitAppearance="caret",b.style.mozAppearance="caret",b.style.Appearance="caret",d(),a(window).on("resize",function(c){e=a(b).position(),g=(b.ownerDocument.defaultView||window).getComputedStyle(b,null),d()}),a(b).on("click",function(a){return I(b,c(a.clientX)),aa.clickEvent.call(this,[a])}),a(b).on("keydown",function(a){a.shiftKey||f.insertMode===!1||setTimeout(function(){O(b)},0)})}function O(a,b,c){function d(){g||null!==i.fn&&void 0!==j.input?g&&null!==i.fn&&void 0!==j.input&&(g=!1,e+="</span>"):(g=!0,e+="<span class='im-static''>")}if(void 0!==T){b=b||v(),void 0===c?c=I(a):void 0===c.begin&&(c={begin:c,end:c});var e="",g=!1;if(""!=b){var h,i,j,k=0,m=n();do k===c.begin&&document.activeElement===a&&(e+="<span class='im-caret' style='border-right-width: 1px;border-right-style: solid;'></span>"),l().validPositions[k]?(j=l().validPositions[k],i=j.match,h=j.locator.slice(),d(),e+=j.input):(j=q(k,h,k-1),i=j.match,h=j.locator.slice(),(f.jitMasking===!1||k<m||"number"==typeof f.jitMasking&&isFinite(f.jitMasking)&&f.jitMasking>k)&&(d(),e+=F(k,i))),k++;while((void 0===S||k<S)&&(null!==i.fn||""!==i.def)||m>k)}T.innerHTML=e}}function P(b){function c(b,c){function d(b){function d(b){if(a.valHooks&&(void 0===a.valHooks[b]||a.valHooks[b].inputmaskpatch!==!0)){var d=a.valHooks[b]&&a.valHooks[b].get?a.valHooks[b].get:function(a){return a.value},e=a.valHooks[b]&&a.valHooks[b].set?a.valHooks[b].set:function(a,b){return a.value=b,a};a.valHooks[b]={get:function(a){if(a.inputmask){if(a.inputmask.opts.autoUnmask)return a.inputmask.unmaskedvalue();var b=d(a);return n(void 0,void 0,a.inputmask.maskset.validPositions)!==-1||c.nullable!==!0?b:""}return d(a)},set:function(b,c){var d,f=a(b);return d=e(b,c),b.inputmask&&f.trigger("setvalue"),d},inputmaskpatch:!0}}}function e(){return this.inputmask?this.inputmask.opts.autoUnmask?this.inputmask.unmaskedvalue():n()!==-1||c.nullable!==!0?document.activeElement===this&&c.clearMaskOnLostFocus?(W?K(v().slice()).reverse():K(v().slice())).join(""):h.call(this):"":h.call(this)}function f(b){i.call(this,b),this.inputmask&&a(this).trigger("setvalue")}function g(b){_.on(b,"mouseenter",function(b){var c=a(this),d=this,e=d.inputmask._valueGet();e!==v().join("")&&c.trigger("setvalue")})}var h,i;if(!b.inputmask.__valueGet){if(c.noValuePatching!==!0){if(Object.getOwnPropertyDescriptor){"function"!=typeof Object.getPrototypeOf&&(Object.getPrototypeOf="object"==typeof"test".__proto__?function(a){return a.__proto__}:function(a){return a.constructor.prototype});var j=Object.getPrototypeOf?Object.getOwnPropertyDescriptor(Object.getPrototypeOf(b),"value"):void 0;j&&j.get&&j.set?(h=j.get,i=j.set,Object.defineProperty(b,"value",{get:e,set:f,configurable:!0})):"INPUT"!==b.tagName&&(h=function(){return this.textContent},i=function(a){this.textContent=a},Object.defineProperty(b,"value",{get:e,set:f,configurable:!0}))}else document.__lookupGetter__&&b.__lookupGetter__("value")&&(h=b.__lookupGetter__("value"),i=b.__lookupSetter__("value"),b.__defineGetter__("value",e),b.__defineSetter__("value",f));b.inputmask.__valueGet=h,b.inputmask.__valueSet=i}b.inputmask._valueGet=function(a){return W&&a!==!0?h.call(this.el).split("").reverse().join(""):h.call(this.el)},b.inputmask._valueSet=function(a,b){i.call(this.el,null===a||void 0===a?"":b!==!0&&W?a.split("").reverse().join(""):a)},void 0===h&&(h=function(){return this.value},i=function(a){this.value=a},d(b.type),g(b))}}var e=b.getAttribute("type"),f="INPUT"===b.tagName&&a.inArray(e,c.supportsInputType)!==-1||b.isContentEditable||"TEXTAREA"===b.tagName;if(!f)if("INPUT"===b.tagName){var g=document.createElement("input");g.setAttribute("type",e),f="text"===g.type,g=null}else f="partial";return f!==!1&&d(b),f}_.off(V);var d=c(b,f);if(d!==!1&&(V=b,R=a(V),("rtl"===V.dir||f.rightAlign)&&(V.style.textAlign="right"),("rtl"===V.dir||f.numericInput)&&(V.dir="ltr",V.removeAttribute("dir"),V.inputmask.isRTL=!0,W=!0),f.colorMask===!0&&N(V),j&&(V.hasOwnProperty("inputmode")&&(V.inputmode=f.inputmode,V.setAttribute("inputmode",f.inputmode)),"rtfm"===f.androidHack&&(f.colorMask!==!0&&N(V),V.type="password")),d===!0&&(_.on(V,"submit",aa.submitEvent),_.on(V,"reset",aa.resetEvent),_.on(V,"mouseenter",aa.mouseenterEvent),_.on(V,"blur",aa.blurEvent),_.on(V,"focus",aa.focusEvent),_.on(V,"mouseleave",aa.mouseleaveEvent),f.colorMask!==!0&&_.on(V,"click",aa.clickEvent),_.on(V,"dblclick",aa.dblclickEvent),_.on(V,"paste",aa.pasteEvent),_.on(V,"dragdrop",aa.pasteEvent),_.on(V,"drop",aa.pasteEvent),_.on(V,"cut",aa.cutEvent),_.on(V,"complete",f.oncomplete),_.on(V,"incomplete",f.onincomplete),_.on(V,"cleared",f.oncleared),j&&f.inputEventOnly===!0||(_.on(V,"keydown",aa.keydownEvent),_.on(V,"keypress",aa.keypressEvent)),_.on(V,"compositionstart",a.noop),_.on(V,"compositionupdate",a.noop),_.on(V,"compositionend",a.noop),_.on(V,"keyup",a.noop),_.on(V,"input",aa.inputFallBackEvent),_.on(V,"beforeinput",a.noop)),_.on(V,"setvalue",aa.setValueEvent),u(),""!==V.inputmask._valueGet()||f.clearMaskOnLostFocus===!1||document.activeElement===V)){var e=a.isFunction(f.onBeforeMask)?f.onBeforeMask(V.inputmask._valueGet(),f)||V.inputmask._valueGet():V.inputmask._valueGet();G(V,!0,!1,e.split(""));var g=v().slice();Q=g.join(""),L(g)===!1&&f.clearIncomplete&&m(),f.clearMaskOnLostFocus&&document.activeElement!==V&&(n()===-1?g=[]:K(g)),E(V,g),document.activeElement===V&&I(V,B(n()))}}d=d||this.maskset,f=f||this.opts;var Q,R,S,T,U,V=this.el,W=this.isRTL,X=!1,Y=!1,Z=!1,$=!1,_={on:function(c,d,e){var g=function(c){if(void 0===this.inputmask&&"FORM"!==this.nodeName){var d=a.data(this,"_inputmask_opts");d?new b(d).mask(this):_.off(this)}else{if("setvalue"===c.type||"FORM"===this.nodeName||!(this.disabled||this.readOnly&&!("keydown"===c.type&&c.ctrlKey&&67===c.keyCode||f.tabThrough===!1&&c.keyCode===b.keyCode.TAB))){switch(c.type){case"input":if(Y===!0)return Y=!1,c.preventDefault();break;case"keydown":X=!1,Y=!1;break;case"keypress":if(X===!0)return c.preventDefault();X=!0;break;case"click":if(h||i){var g=this,j=arguments;return setTimeout(function(){e.apply(g,j)},0),!1}}var k=e.apply(this,arguments);return k===!1&&(c.preventDefault(),c.stopPropagation()),k}c.preventDefault()}};c.inputmask.events[d]=c.inputmask.events[d]||[],c.inputmask.events[d].push(g),a.inArray(d,["submit","reset"])!==-1?null!=c.form&&a(c.form).on(d,g):a(c).on(d,g)},off:function(b,c){if(b.inputmask&&b.inputmask.events){var d;c?(d=[],d[c]=b.inputmask.events[c]):d=b.inputmask.events,a.each(d,function(c,d){for(;d.length>0;){var e=d.pop();a.inArray(c,["submit","reset"])!==-1?null!=b.form&&a(b.form).off(c,e):a(b).off(c,e)}delete b.inputmask.events[c]})}}},aa={keydownEvent:function(c){function d(a){var b=document.createElement("input"),c="on"+a,d=c in b;return d||(b.setAttribute(c,"return;"),d="function"==typeof b[c]),b=null,d}var e=this,g=a(e),h=c.keyCode,j=I(e);if(h===b.keyCode.BACKSPACE||h===b.keyCode.DELETE||i&&h===b.keyCode.BACKSPACE_SAFARI||c.ctrlKey&&h===b.keyCode.X&&!d("cut"))c.preventDefault(),M(e,h,j),E(e,v(!0),l().p,c,e.inputmask._valueGet()!==v().join("")),e.inputmask._valueGet()===u().join("")?g.trigger("cleared"):L(v())===!0&&g.trigger("complete");else if(h===b.keyCode.END||h===b.keyCode.PAGE_DOWN){c.preventDefault();var k=B(n());f.insertMode||k!==l().maskLength||c.shiftKey||k--,I(e,c.shiftKey?j.begin:k,k,!0)}else h===b.keyCode.HOME&&!c.shiftKey||h===b.keyCode.PAGE_UP?(c.preventDefault(),I(e,0,c.shiftKey?j.begin:0,!0)):(f.undoOnEscape&&h===b.keyCode.ESCAPE||90===h&&c.ctrlKey)&&c.altKey!==!0?(G(e,!0,!1,Q.split("")),g.trigger("click")):h!==b.keyCode.INSERT||c.shiftKey||c.ctrlKey?f.tabThrough===!0&&h===b.keyCode.TAB?(c.shiftKey===!0?(null===r(j.begin).match.fn&&(j.begin=B(j.begin)),j.end=C(j.begin,!0),j.begin=C(j.end,!0)):(j.begin=B(j.begin,!0),j.end=B(j.begin,!0),j.end<l().maskLength&&j.end--),j.begin<l().maskLength&&(c.preventDefault(),
I(e,j.begin,j.end))):c.shiftKey||f.insertMode===!1&&(h===b.keyCode.RIGHT?setTimeout(function(){var a=I(e);I(e,a.begin)},0):h===b.keyCode.LEFT&&setTimeout(function(){var a=I(e);I(e,W?a.begin+1:a.begin-1)},0)):(f.insertMode=!f.insertMode,I(e,f.insertMode||j.begin!==l().maskLength?j.begin:j.begin-1));f.onKeyDown.call(this,c,v(),I(e).begin,f),Z=a.inArray(h,f.ignorables)!==-1},keypressEvent:function(c,d,e,g,h){var i=this,j=a(i),k=c.which||c.charCode||c.keyCode;if(!(d===!0||c.ctrlKey&&c.altKey)&&(c.ctrlKey||c.metaKey||Z))return k===b.keyCode.ENTER&&Q!==v().join("")&&(Q=v().join(""),setTimeout(function(){j.trigger("change")},0)),!0;if(k){46===k&&c.shiftKey===!1&&""!==f.radixPoint&&(k=f.radixPoint.charCodeAt(0));var n,o=d?{begin:h,end:h}:I(i),p=String.fromCharCode(k);l().writeOutBuffer=!0;var q=z(o,p,g);if(q!==!1&&(m(!0),n=void 0!==q.caret?q.caret:d?q.pos+1:B(q.pos),l().p=n),e!==!1){var r=this;if(setTimeout(function(){f.onKeyValidation.call(r,k,q,f)},0),l().writeOutBuffer&&q!==!1){var s=v();E(i,s,f.numericInput&&void 0===q.caret?C(n):n,c,d!==!0),d!==!0&&setTimeout(function(){L(s)===!0&&j.trigger("complete")},0)}}if(c.preventDefault(),d)return q.forwardPosition=n,q}},pasteEvent:function(b){var c,d=this,e=b.originalEvent||b,g=a(d),h=d.inputmask._valueGet(!0),i=I(d);W&&(c=i.end,i.end=i.begin,i.begin=c);var j=h.substr(0,i.begin),k=h.substr(i.end,h.length);if(j===(W?u().reverse():u()).slice(0,i.begin).join("")&&(j=""),k===(W?u().reverse():u()).slice(i.end).join("")&&(k=""),W&&(c=j,j=k,k=c),window.clipboardData&&window.clipboardData.getData)h=j+window.clipboardData.getData("Text")+k;else{if(!e.clipboardData||!e.clipboardData.getData)return!0;h=j+e.clipboardData.getData("text/plain")+k}var l=h;if(a.isFunction(f.onBeforePaste)){if(l=f.onBeforePaste(h,f),l===!1)return b.preventDefault();l||(l=h)}return G(d,!1,!1,W?l.split("").reverse():l.toString().split("")),E(d,v(),B(n()),b,Q!==v().join("")),L(v())===!0&&g.trigger("complete"),b.preventDefault()},inputFallBackEvent:function(c){var d=this,e=d.inputmask._valueGet();if(v().join("")!==e){var f=I(d);if(e=e.replace(new RegExp("("+b.escapeRegex(u().join(""))+")*"),""),h){var g=e.replace(v().join(""),"");if(1===g.length){var i=new a.Event("keypress");return i.which=g.charCodeAt(0),aa.keypressEvent.call(d,i,!0,!0,!1,l().validPositions[f.begin-1]?f.begin:f.begin-1),!1}}if(f.begin>e.length&&(I(d,e.length),f=I(d)),v().length-e.length!==1||e.charAt(f.begin)===v()[f.begin]||e.charAt(f.begin+1)===v()[f.begin]||A(f.begin)){for(var j=n()+1,k=u().join("");null===e.match(b.escapeRegex(k)+"$");)k=k.slice(1);e=e.replace(k,""),e=e.split(""),G(d,!0,!1,e,c,f.begin<j),L(v())===!0&&a(d).trigger("complete")}else c.keyCode=b.keyCode.BACKSPACE,aa.keydownEvent.call(d,c);c.preventDefault()}},setValueEvent:function(b){this.inputmask.refreshValue=!1;var c=this,d=c.inputmask._valueGet();G(c,!0,!1,(a.isFunction(f.onBeforeMask)?f.onBeforeMask(d,f)||d:d).split("")),Q=v().join(""),(f.clearMaskOnLostFocus||f.clearIncomplete)&&c.inputmask._valueGet()===u().join("")&&c.inputmask._valueSet("")},focusEvent:function(a){var b=this,c=b.inputmask._valueGet();f.showMaskOnFocus&&(!f.showMaskOnHover||f.showMaskOnHover&&""===c)&&(b.inputmask._valueGet()!==v().join("")?E(b,v(),B(n())):$===!1&&I(b,B(n()))),f.positionCaretOnTab===!0&&aa.clickEvent.apply(b,[a,!0]),Q=v().join("")},mouseleaveEvent:function(a){var b=this;if($=!1,f.clearMaskOnLostFocus&&document.activeElement!==b){var c=v().slice(),d=b.inputmask._valueGet();d!==b.getAttribute("placeholder")&&""!==d&&(n()===-1&&d===u().join("")?c=[]:K(c),E(b,c))}},clickEvent:function(b,c){function d(b){if(""!==f.radixPoint){var c=l().validPositions;if(void 0===c[b]||c[b].input===F(b)){if(b<B(-1))return!0;var d=a.inArray(f.radixPoint,v());if(d!==-1){for(var e in c)if(d<e&&c[e].input!==F(e))return!1;return!0}}}return!1}var e=this;setTimeout(function(){if(document.activeElement===e){var b=I(e);if(c&&(b.begin=b.end),b.begin===b.end)switch(f.positionCaretOnClick){case"none":break;case"radixFocus":if(d(b.begin)){var g=a.inArray(f.radixPoint,v().join(""));I(e,f.numericInput?B(g):g);break}default:var h=b.begin,i=n(h,!0),j=B(i);if(h<j)I(e,A(h)||A(h-1)?h:B(h));else{var k=F(j);(""!==k&&v()[j]!==k&&r(j).match.optionalQuantifier!==!0||!A(j)&&r(j).match.def===k)&&(j=B(j)),I(e,j)}}}},0)},dblclickEvent:function(a){var b=this;setTimeout(function(){I(b,0,B(n()))},0)},cutEvent:function(c){var d=this,e=a(d),f=I(d),g=c.originalEvent||c,h=window.clipboardData||g.clipboardData,i=W?v().slice(f.end,f.begin):v().slice(f.begin,f.end);h.setData("text",W?i.reverse().join(""):i.join("")),document.execCommand&&document.execCommand("copy"),M(d,b.keyCode.DELETE,f),E(d,v(),l().p,c,Q!==v().join("")),d.inputmask._valueGet()===u().join("")&&e.trigger("cleared")},blurEvent:function(b){var c=a(this),d=this;if(d.inputmask){var e=d.inputmask._valueGet(),g=v().slice();Q!==g.join("")&&setTimeout(function(){c.trigger("change"),Q=g.join("")},0),""!==e&&(f.clearMaskOnLostFocus&&(n()===-1&&e===u().join("")?g=[]:K(g)),L(g)===!1&&(setTimeout(function(){c.trigger("incomplete")},0),f.clearIncomplete&&(m(),g=f.clearMaskOnLostFocus?[]:u().slice())),E(d,g,void 0,b))}},mouseenterEvent:function(a){var b=this;$=!0,document.activeElement!==b&&f.showMaskOnHover&&b.inputmask._valueGet()!==v().join("")&&E(b,v())},submitEvent:function(a){Q!==v().join("")&&R.trigger("change"),f.clearMaskOnLostFocus&&n()===-1&&V.inputmask._valueGet&&V.inputmask._valueGet()===u().join("")&&V.inputmask._valueSet(""),f.removeMaskOnSubmit&&(V.inputmask._valueSet(V.inputmask.unmaskedvalue(),!0),setTimeout(function(){E(V,v())},0))},resetEvent:function(a){V.inputmask.refreshValue=!0,setTimeout(function(){R.trigger("setvalue")},0)}};if(void 0!==c)switch(c.action){case"isComplete":return V=c.el,L(v());case"unmaskedvalue":return void 0!==V&&void 0===c.value||(U=c.value,U=(a.isFunction(f.onBeforeMask)?f.onBeforeMask(U,f)||U:U).split(""),G(void 0,!1,!1,W?U.reverse():U),a.isFunction(f.onBeforeWrite)&&f.onBeforeWrite(void 0,v(),0,f)),H(V);case"mask":P(V);break;case"format":return U=(a.isFunction(f.onBeforeMask)?f.onBeforeMask(c.value,f)||c.value:c.value).split(""),G(void 0,!1,!1,W?U.reverse():U),a.isFunction(f.onBeforeWrite)&&f.onBeforeWrite(void 0,v(),0,f),c.metadata?{value:W?v().slice().reverse().join(""):v().join(""),metadata:e.call(this,{action:"getmetadata"},d,f)}:W?v().slice().reverse().join(""):v().join("");case"isValid":c.value?(U=c.value.split(""),G(void 0,!1,!0,W?U.reverse():U)):c.value=v().join("");for(var ba=v(),ca=J(),da=ba.length-1;da>ca&&!A(da);da--);return ba.splice(ca,da+1-ca),L(ba)&&c.value===v().join("");case"getemptymask":return u().join("");case"remove":if(V){R=a(V),V.inputmask._valueSet(H(V)),_.off(V);var ea;Object.getOwnPropertyDescriptor&&Object.getPrototypeOf?(ea=Object.getOwnPropertyDescriptor(Object.getPrototypeOf(V),"value"),ea&&V.inputmask.__valueGet&&Object.defineProperty(V,"value",{get:V.inputmask.__valueGet,set:V.inputmask.__valueSet,configurable:!0})):document.__lookupGetter__&&V.__lookupGetter__("value")&&V.inputmask.__valueGet&&(V.__defineGetter__("value",V.inputmask.__valueGet),V.__defineSetter__("value",V.inputmask.__valueSet)),V.inputmask=void 0}return V;case"getmetadata":if(a.isArray(d.metadata)){var fa=k(!0,0,!1).join("");return a.each(d.metadata,function(a,b){if(b.mask===fa)return fa=b,!1}),fa}return d.metadata}}var f=navigator.userAgent,g=/mobile/i.test(f),h=/iemobile/i.test(f),i=/iphone/i.test(f)&&!h,j=/android/i.test(f)&&!h;return b.prototype={dataAttribute:"data-inputmask",defaults:{placeholder:"_",optionalmarker:{start:"[",end:"]"},quantifiermarker:{start:"{",end:"}"},groupmarker:{start:"(",end:")"},alternatormarker:"|",escapeChar:"\\",mask:null,oncomplete:a.noop,onincomplete:a.noop,oncleared:a.noop,repeat:0,greedy:!0,autoUnmask:!1,removeMaskOnSubmit:!1,clearMaskOnLostFocus:!0,insertMode:!0,clearIncomplete:!1,alias:null,onKeyDown:a.noop,onBeforeMask:null,onBeforePaste:function(b,c){return a.isFunction(c.onBeforeMask)?c.onBeforeMask(b,c):b},onBeforeWrite:null,onUnMask:null,showMaskOnFocus:!0,showMaskOnHover:!0,onKeyValidation:a.noop,skipOptionalPartCharacter:" ",numericInput:!1,rightAlign:!1,undoOnEscape:!0,radixPoint:"",radixPointDefinitionSymbol:void 0,groupSeparator:"",keepStatic:null,positionCaretOnTab:!0,tabThrough:!1,supportsInputType:["text","tel","password"],ignorables:[8,9,13,19,27,33,34,35,36,37,38,39,40,45,46,93,112,113,114,115,116,117,118,119,120,121,122,123,0,229],isComplete:null,canClearPosition:a.noop,postValidation:null,staticDefinitionSymbol:void 0,jitMasking:!1,nullable:!0,inputEventOnly:!1,noValuePatching:!1,positionCaretOnClick:"lvp",casing:null,inputmode:"verbatim",colorMask:!1,androidHack:!1},definitions:{9:{validator:"[0-9]",cardinality:1,definitionSymbol:"*"},a:{validator:"[A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",cardinality:1,definitionSymbol:"*"},"*":{validator:"[0-9A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",cardinality:1}},aliases:{},masksCache:{},mask:function(f){function g(b,d,e,f){function g(a,c){c=void 0!==c?c:b.getAttribute(f+"-"+a),null!==c&&("string"==typeof c&&(0===a.indexOf("on")?c=window[c]:"false"===c?c=!1:"true"===c&&(c=!0)),e[a]=c)}var h,i,j,k,l=b.getAttribute(f);if(l&&""!==l&&(l=l.replace(new RegExp("'","g"),'"'),i=JSON.parse("{"+l+"}")),i){j=void 0;for(k in i)if("alias"===k.toLowerCase()){j=i[k];break}}g("alias",j),e.alias&&c(e.alias,e,d);for(h in d){if(i){j=void 0;for(k in i)if(k.toLowerCase()===h.toLowerCase()){j=i[k];break}}g(h,j)}return a.extend(!0,d,e),d}var h=this;return"string"==typeof f&&(f=document.getElementById(f)||document.querySelectorAll(f)),f=f.nodeName?[f]:f,a.each(f,function(c,f){var i=a.extend(!0,{},h.opts);g(f,i,a.extend(!0,{},h.userOptions),h.dataAttribute);var j=d(i,h.noMasksCache);void 0!==j&&(void 0!==f.inputmask&&f.inputmask.remove(),f.inputmask=new b((void 0),(void 0),(!0)),f.inputmask.opts=i,f.inputmask.noMasksCache=h.noMasksCache,f.inputmask.userOptions=a.extend(!0,{},h.userOptions),f.inputmask.isRTL=h.isRTL,f.inputmask.el=f,f.inputmask.maskset=j,a.data(f,"_inputmask_opts",i),e.call(f.inputmask,{action:"mask"}))}),f&&f[0]?f[0].inputmask||this:this},option:function(b,c){return"string"==typeof b?this.opts[b]:"object"==typeof b?(a.extend(this.userOptions,b),this.el&&c!==!0&&this.mask(this.el),this):void 0},unmaskedvalue:function(a){return this.maskset=this.maskset||d(this.opts,this.noMasksCache),e.call(this,{action:"unmaskedvalue",value:a})},remove:function(){return e.call(this,{action:"remove"})},getemptymask:function(){return this.maskset=this.maskset||d(this.opts,this.noMasksCache),e.call(this,{action:"getemptymask"})},hasMaskedValue:function(){return!this.opts.autoUnmask},isComplete:function(){return this.maskset=this.maskset||d(this.opts,this.noMasksCache),e.call(this,{action:"isComplete"})},getmetadata:function(){return this.maskset=this.maskset||d(this.opts,this.noMasksCache),e.call(this,{action:"getmetadata"})},isValid:function(a){return this.maskset=this.maskset||d(this.opts,this.noMasksCache),e.call(this,{action:"isValid",value:a})},format:function(a,b){return this.maskset=this.maskset||d(this.opts,this.noMasksCache),e.call(this,{action:"format",value:a,metadata:b})},analyseMask:function(c,d){function e(a,b,c,d){this.matches=[],this.openGroup=a||!1,this.isGroup=a||!1,this.isOptional=b||!1,this.isQuantifier=c||!1,this.isAlternator=d||!1,this.quantifier={min:1,max:1}}function f(a,c,e){var f=(d.definitions?d.definitions[c]:void 0)||b.prototype.definitions[c];e=void 0!==e?e:a.matches.length;var g=a.matches[e-1];if(f&&!r){for(var h=f.prevalidator,i=h?h.length:0,j=1;j<f.cardinality;j++){var k=i>=j?h[j-1]:[],l=k.validator,m=k.cardinality;a.matches.splice(e++,0,{fn:l?"string"==typeof l?new RegExp(l):new function(){this.test=l}:new RegExp("."),cardinality:m?m:1,optionality:a.isOptional,newBlockMarker:void 0===g||g.def!==(f.definitionSymbol||c),casing:f.casing,def:f.definitionSymbol||c,placeholder:f.placeholder,nativeDef:c}),g=a.matches[e-1]}a.matches.splice(e++,0,{fn:f.validator?"string"==typeof f.validator?new RegExp(f.validator):new function(){this.test=f.validator}:new RegExp("."),cardinality:f.cardinality,optionality:a.isOptional,newBlockMarker:void 0===g||g.def!==(f.definitionSymbol||c),casing:f.casing,def:f.definitionSymbol||c,placeholder:f.placeholder,nativeDef:c})}else a.matches.splice(e++,0,{fn:null,cardinality:0,optionality:a.isOptional,newBlockMarker:void 0===g||g.def!==c,casing:null,def:d.staticDefinitionSymbol||c,placeholder:void 0!==d.staticDefinitionSymbol?c:void 0,nativeDef:c}),r=!1}function g(b){b&&b.matches&&a.each(b.matches,function(a,c){var e=b.matches[a+1];(void 0===e||void 0===e.matches||e.isQuantifier===!1)&&c&&c.isGroup&&(c.isGroup=!1,f(c,d.groupmarker.start,0),c.openGroup!==!0&&f(c,d.groupmarker.end)),g(c)})}function h(){if(t.length>0){if(m=t[t.length-1],f(m,k),m.isAlternator){n=t.pop();for(var a=0;a<n.matches.length;a++)n.matches[a].isGroup=!1;t.length>0?(m=t[t.length-1],m.matches.push(n)):s.matches.push(n)}}else f(s,k)}function i(a){function b(a){return a===d.optionalmarker.start?a=d.optionalmarker.end:a===d.optionalmarker.end?a=d.optionalmarker.start:a===d.groupmarker.start?a=d.groupmarker.end:a===d.groupmarker.end&&(a=d.groupmarker.start),a}a.matches=a.matches.reverse();for(var c in a.matches)if(a.matches.hasOwnProperty(c)){var e=parseInt(c);if(a.matches[c].isQuantifier&&a.matches[e+1]&&a.matches[e+1].isGroup){var f=a.matches[c];a.matches.splice(c,1),a.matches.splice(e+1,0,f)}void 0!==a.matches[c].matches?a.matches[c]=i(a.matches[c]):a.matches[c]=b(a.matches[c])}return a}for(var j,k,l,m,n,o,p,q=/(?:[?*+]|\{[0-9\+\*]+(?:,[0-9\+\*]*)?\})|[^.?*+^${[]()|\\]+|./g,r=!1,s=new e,t=[],u=[];j=q.exec(c);)if(k=j[0],r)h();else switch(k.charAt(0)){case d.escapeChar:r=!0;break;case d.optionalmarker.end:case d.groupmarker.end:if(l=t.pop(),l.openGroup=!1,void 0!==l)if(t.length>0){if(m=t[t.length-1],m.matches.push(l),m.isAlternator){n=t.pop();for(var v=0;v<n.matches.length;v++)n.matches[v].isGroup=!1;t.length>0?(m=t[t.length-1],m.matches.push(n)):s.matches.push(n)}}else s.matches.push(l);else h();break;case d.optionalmarker.start:t.push(new e((!1),(!0)));break;case d.groupmarker.start:t.push(new e((!0)));break;case d.quantifiermarker.start:var w=new e((!1),(!1),(!0));k=k.replace(/[{}]/g,"");var x=k.split(","),y=isNaN(x[0])?x[0]:parseInt(x[0]),z=1===x.length?y:isNaN(x[1])?x[1]:parseInt(x[1]);if("*"!==z&&"+"!==z||(y="*"===z?0:1),w.quantifier={min:y,max:z},t.length>0){var A=t[t.length-1].matches;j=A.pop(),j.isGroup||(p=new e((!0)),p.matches.push(j),j=p),A.push(j),A.push(w)}else j=s.matches.pop(),j.isGroup||(p=new e((!0)),p.matches.push(j),j=p),s.matches.push(j),s.matches.push(w);break;case d.alternatormarker:t.length>0?(m=t[t.length-1],o=m.matches.pop()):o=s.matches.pop(),o.isAlternator?t.push(o):(n=new e((!1),(!1),(!1),(!0)),n.matches.push(o),t.push(n));break;default:h()}for(;t.length>0;)l=t.pop(),s.matches.push(l);return s.matches.length>0&&(g(s),u.push(s)),d.numericInput&&i(u[0]),u}},b.extendDefaults=function(c){a.extend(!0,b.prototype.defaults,c)},b.extendDefinitions=function(c){a.extend(!0,b.prototype.definitions,c)},b.extendAliases=function(c){a.extend(!0,b.prototype.aliases,c)},b.format=function(a,c,d){return b(c).format(a,d)},b.unmask=function(a,c){return b(c).unmaskedvalue(a)},b.isValid=function(a,c){return b(c).isValid(a)},b.remove=function(b){a.each(b,function(a,b){b.inputmask&&b.inputmask.remove()})},b.escapeRegex=function(a){var b=["/",".","*","+","?","|","(",")","[","]","{","}","\\","$","^"];return a.replace(new RegExp("(\\"+b.join("|\\")+")","gim"),"\\$1")},b.keyCode={ALT:18,BACKSPACE:8,BACKSPACE_SAFARI:127,CAPS_LOCK:20,COMMA:188,COMMAND:91,COMMAND_LEFT:91,COMMAND_RIGHT:93,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,INSERT:45,LEFT:37,MENU:93,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SHIFT:16,SPACE:32,TAB:9,UP:38,WINDOWS:91,X:88},window.Inputmask=b,b}(jQuery),function(a,b){return void 0===a.fn.inputmask&&(a.fn.inputmask=function(c,d){var e,f=this[0];if(void 0===d&&(d={}),"string"==typeof c)switch(c){case"unmaskedvalue":return f&&f.inputmask?f.inputmask.unmaskedvalue():a(f).val();case"remove":return this.each(function(){this.inputmask&&this.inputmask.remove()});case"getemptymask":return f&&f.inputmask?f.inputmask.getemptymask():"";case"hasMaskedValue":return!(!f||!f.inputmask)&&f.inputmask.hasMaskedValue();case"isComplete":return!f||!f.inputmask||f.inputmask.isComplete();case"getmetadata":return f&&f.inputmask?f.inputmask.getmetadata():void 0;case"setvalue":a(f).val(d),f&&void 0===f.inputmask&&a(f).triggerHandler("setvalue");break;case"option":if("string"!=typeof d)return this.each(function(){if(void 0!==this.inputmask)return this.inputmask.option(d)});if(f&&void 0!==f.inputmask)return f.inputmask.option(d);break;default:return d.alias=c,e=new b(d),this.each(function(){e.mask(this)})}else{if("object"==typeof c)return e=new b(c),void 0===c.mask&&void 0===c.alias?this.each(function(){return void 0!==this.inputmask?this.inputmask.option(c):void e.mask(this)}):this.each(function(){e.mask(this)});if(void 0===c)return this.each(function(){e=new b(d),e.mask(this)})}}),a.fn.inputmask}(jQuery,Inputmask),function(a,b){function c(a){return isNaN(a)||29===new Date(a,2,0).getDate()}return b.extendAliases({"dd/mm/yyyy":{mask:"1/2/y",placeholder:"dd/mm/yyyy",regex:{val1pre:new RegExp("[0-3]"),val1:new RegExp("0[1-9]|[12][0-9]|3[01]"),val2pre:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|[12][0-9]|3[01])"+c+"[01])")},val2:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|[12][0-9])"+c+"(0[1-9]|1[012]))|(30"+c+"(0[13-9]|1[012]))|(31"+c+"(0[13578]|1[02]))")}},leapday:"29/02/",separator:"/",yearrange:{minyear:1900,maxyear:2099},isInYearRange:function(a,b,c){if(isNaN(a))return!1;var d=parseInt(a.concat(b.toString().slice(a.length))),e=parseInt(a.concat(c.toString().slice(a.length)));return!isNaN(d)&&(b<=d&&d<=c)||!isNaN(e)&&(b<=e&&e<=c)},determinebaseyear:function(a,b,c){var d=(new Date).getFullYear();if(a>d)return a;if(b<d){for(var e=b.toString().slice(0,2),f=b.toString().slice(2,4);b<e+c;)e--;var g=e+f;return a>g?a:g}if(a<=d&&d<=b){for(var h=d.toString().slice(0,2);b<h+c;)h--;var i=h+c;return i<a?a:i}return d},onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey&&c.keyCode===b.keyCode.RIGHT){var h=new Date;g.val(h.getDate().toString()+(h.getMonth()+1).toString()+h.getFullYear().toString()),g.trigger("setvalue")}},getFrontValue:function(a,b,c){for(var d=0,e=0,f=0;f<a.length&&"2"!==a.charAt(f);f++){var g=c.definitions[a.charAt(f)];g?(d+=e,e=g.cardinality):e++}return b.join("").substr(d,e)},postValidation:function(a,b,d){var e,f,g=a.join("");return 0===d.mask.indexOf("y")?(f=g.substr(0,4),e=g.substr(4,11)):(f=g.substr(6,11),e=g.substr(0,6)),b&&(e!==d.leapday||c(f))},definitions:{1:{validator:function(a,b,c,d,e){var f=e.regex.val1.test(a);return d||f||a.charAt(1)!==e.separator&&"-./".indexOf(a.charAt(1))===-1||!(f=e.regex.val1.test("0"+a.charAt(0)))?f:(b.buffer[c-1]="0",{refreshFromBuffer:{start:c-1,end:c},pos:c,c:a.charAt(0)})},cardinality:2,prevalidator:[{validator:function(a,b,c,d,e){var f=a;isNaN(b.buffer[c+1])||(f+=b.buffer[c+1]);var g=1===f.length?e.regex.val1pre.test(f):e.regex.val1.test(f);if(!d&&!g){if(g=e.regex.val1.test(a+"0"))return b.buffer[c]=a,b.buffer[++c]="0",{pos:c,c:"0"};if(g=e.regex.val1.test("0"+a))return b.buffer[c]="0",c++,{pos:c}}return g},cardinality:1}]},2:{validator:function(a,b,c,d,e){var f=e.getFrontValue(b.mask,b.buffer,e);f.indexOf(e.placeholder[0])!==-1&&(f="01"+e.separator);var g=e.regex.val2(e.separator).test(f+a);return d||g||a.charAt(1)!==e.separator&&"-./".indexOf(a.charAt(1))===-1||!(g=e.regex.val2(e.separator).test(f+"0"+a.charAt(0)))?g:(b.buffer[c-1]="0",{refreshFromBuffer:{start:c-1,end:c},pos:c,c:a.charAt(0)})},cardinality:2,prevalidator:[{validator:function(a,b,c,d,e){isNaN(b.buffer[c+1])||(a+=b.buffer[c+1]);var f=e.getFrontValue(b.mask,b.buffer,e);f.indexOf(e.placeholder[0])!==-1&&(f="01"+e.separator);var g=1===a.length?e.regex.val2pre(e.separator).test(f+a):e.regex.val2(e.separator).test(f+a);return d||g||!(g=e.regex.val2(e.separator).test(f+"0"+a))?g:(b.buffer[c]="0",c++,{pos:c})},cardinality:1}]},y:{validator:function(a,b,c,d,e){return e.isInYearRange(a,e.yearrange.minyear,e.yearrange.maxyear)},cardinality:4,prevalidator:[{validator:function(a,b,c,d,e){var f=e.isInYearRange(a,e.yearrange.minyear,e.yearrange.maxyear);if(!d&&!f){var g=e.determinebaseyear(e.yearrange.minyear,e.yearrange.maxyear,a+"0").toString().slice(0,1);if(f=e.isInYearRange(g+a,e.yearrange.minyear,e.yearrange.maxyear))return b.buffer[c++]=g.charAt(0),{pos:c};if(g=e.determinebaseyear(e.yearrange.minyear,e.yearrange.maxyear,a+"0").toString().slice(0,2),f=e.isInYearRange(g+a,e.yearrange.minyear,e.yearrange.maxyear))return b.buffer[c++]=g.charAt(0),b.buffer[c++]=g.charAt(1),{pos:c}}return f},cardinality:1},{validator:function(a,b,c,d,e){var f=e.isInYearRange(a,e.yearrange.minyear,e.yearrange.maxyear);if(!d&&!f){var g=e.determinebaseyear(e.yearrange.minyear,e.yearrange.maxyear,a).toString().slice(0,2);if(f=e.isInYearRange(a[0]+g[1]+a[1],e.yearrange.minyear,e.yearrange.maxyear))return b.buffer[c++]=g.charAt(1),{pos:c};if(g=e.determinebaseyear(e.yearrange.minyear,e.yearrange.maxyear,a).toString().slice(0,2),f=e.isInYearRange(g+a,e.yearrange.minyear,e.yearrange.maxyear))return b.buffer[c-1]=g.charAt(0),b.buffer[c++]=g.charAt(1),b.buffer[c++]=a.charAt(0),{refreshFromBuffer:{start:c-3,end:c},pos:c}}return f},cardinality:2},{validator:function(a,b,c,d,e){return e.isInYearRange(a,e.yearrange.minyear,e.yearrange.maxyear)},cardinality:3}]}},insertMode:!1,autoUnmask:!1},"mm/dd/yyyy":{placeholder:"mm/dd/yyyy",alias:"dd/mm/yyyy",regex:{val2pre:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[13-9]|1[012])"+c+"[0-3])|(02"+c+"[0-2])")},val2:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|1[012])"+c+"(0[1-9]|[12][0-9]))|((0[13-9]|1[012])"+c+"30)|((0[13578]|1[02])"+c+"31)")},val1pre:new RegExp("[01]"),val1:new RegExp("0[1-9]|1[012]")},leapday:"02/29/",onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey&&c.keyCode===b.keyCode.RIGHT){var h=new Date;g.val((h.getMonth()+1).toString()+h.getDate().toString()+h.getFullYear().toString()),g.trigger("setvalue")}}},"yyyy/mm/dd":{mask:"y/1/2",placeholder:"yyyy/mm/dd",alias:"mm/dd/yyyy",leapday:"/02/29",onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey&&c.keyCode===b.keyCode.RIGHT){var h=new Date;g.val(h.getFullYear().toString()+(h.getMonth()+1).toString()+h.getDate().toString()),g.trigger("setvalue")}}},"dd.mm.yyyy":{mask:"1.2.y",placeholder:"dd.mm.yyyy",leapday:"29.02.",separator:".",alias:"dd/mm/yyyy"},"dd-mm-yyyy":{mask:"1-2-y",placeholder:"dd-mm-yyyy",leapday:"29-02-",separator:"-",alias:"dd/mm/yyyy"},"mm.dd.yyyy":{mask:"1.2.y",placeholder:"mm.dd.yyyy",leapday:"02.29.",separator:".",alias:"mm/dd/yyyy"},"mm-dd-yyyy":{mask:"1-2-y",placeholder:"mm-dd-yyyy",leapday:"02-29-",separator:"-",alias:"mm/dd/yyyy"},"yyyy.mm.dd":{mask:"y.1.2",placeholder:"yyyy.mm.dd",leapday:".02.29",separator:".",alias:"yyyy/mm/dd"},"yyyy-mm-dd":{mask:"y-1-2",placeholder:"yyyy-mm-dd",leapday:"-02-29",separator:"-",alias:"yyyy/mm/dd"},datetime:{mask:"1/2/y h:s",placeholder:"dd/mm/yyyy hh:mm",alias:"dd/mm/yyyy",regex:{hrspre:new RegExp("[012]"),hrs24:new RegExp("2[0-4]|1[3-9]"),hrs:new RegExp("[01][0-9]|2[0-4]"),ampm:new RegExp("^[a|p|A|P][m|M]"),mspre:new RegExp("[0-5]"),ms:new RegExp("[0-5][0-9]")},timeseparator:":",hourFormat:"24",definitions:{h:{validator:function(a,b,c,d,e){if("24"===e.hourFormat&&24===parseInt(a,10))return b.buffer[c-1]="0",b.buffer[c]="0",{refreshFromBuffer:{start:c-1,end:c},c:"0"};var f=e.regex.hrs.test(a);if(!d&&!f&&(a.charAt(1)===e.timeseparator||"-.:".indexOf(a.charAt(1))!==-1)&&(f=e.regex.hrs.test("0"+a.charAt(0))))return b.buffer[c-1]="0",b.buffer[c]=a.charAt(0),c++,{refreshFromBuffer:{start:c-2,end:c},pos:c,c:e.timeseparator};if(f&&"24"!==e.hourFormat&&e.regex.hrs24.test(a)){var g=parseInt(a,10);return 24===g?(b.buffer[c+5]="a",b.buffer[c+6]="m"):(b.buffer[c+5]="p",b.buffer[c+6]="m"),g-=12,g<10?(b.buffer[c]=g.toString(),b.buffer[c-1]="0"):(b.buffer[c]=g.toString().charAt(1),b.buffer[c-1]=g.toString().charAt(0)),{refreshFromBuffer:{start:c-1,end:c+6},c:b.buffer[c]}}return f},cardinality:2,prevalidator:[{validator:function(a,b,c,d,e){var f=e.regex.hrspre.test(a);return d||f||!(f=e.regex.hrs.test("0"+a))?f:(b.buffer[c]="0",c++,{pos:c})},cardinality:1}]},s:{validator:"[0-5][0-9]",cardinality:2,prevalidator:[{validator:function(a,b,c,d,e){var f=e.regex.mspre.test(a);return d||f||!(f=e.regex.ms.test("0"+a))?f:(b.buffer[c]="0",c++,{pos:c})},cardinality:1}]},t:{validator:function(a,b,c,d,e){return e.regex.ampm.test(a+"m")},casing:"lower",cardinality:1}},insertMode:!1,autoUnmask:!1},datetime12:{mask:"1/2/y h:s t\\m",placeholder:"dd/mm/yyyy hh:mm xm",alias:"datetime",hourFormat:"12"},"mm/dd/yyyy hh:mm xm":{mask:"1/2/y h:s t\\m",placeholder:"mm/dd/yyyy hh:mm xm",alias:"datetime12",regex:{val2pre:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[13-9]|1[012])"+c+"[0-3])|(02"+c+"[0-2])")},val2:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|1[012])"+c+"(0[1-9]|[12][0-9]))|((0[13-9]|1[012])"+c+"30)|((0[13578]|1[02])"+c+"31)")},val1pre:new RegExp("[01]"),val1:new RegExp("0[1-9]|1[012]")},leapday:"02/29/",onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey&&c.keyCode===b.keyCode.RIGHT){var h=new Date;g.val((h.getMonth()+1).toString()+h.getDate().toString()+h.getFullYear().toString()),g.trigger("setvalue")}}},"hh:mm t":{mask:"h:s t\\m",placeholder:"hh:mm xm",alias:"datetime",hourFormat:"12"},"h:s t":{mask:"h:s t\\m",placeholder:"hh:mm xm",alias:"datetime",hourFormat:"12"},"hh:mm:ss":{mask:"h:s:s",placeholder:"hh:mm:ss",alias:"datetime",autoUnmask:!1},"hh:mm":{mask:"h:s",placeholder:"hh:mm",alias:"datetime",autoUnmask:!1},date:{alias:"dd/mm/yyyy"},"mm/yyyy":{mask:"1/y",placeholder:"mm/yyyy",leapday:"donotuse",separator:"/",alias:"mm/dd/yyyy"},shamsi:{regex:{val2pre:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|1[012])"+c+"[0-3])")},val2:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|1[012])"+c+"(0[1-9]|[12][0-9]))|((0[1-9]|1[012])"+c+"30)|((0[1-6])"+c+"31)")},val1pre:new RegExp("[01]"),val1:new RegExp("0[1-9]|1[012]")},yearrange:{minyear:1300,maxyear:1499},mask:"y/1/2",leapday:"/12/30",placeholder:"yyyy/mm/dd",alias:"mm/dd/yyyy",clearIncomplete:!0},"yyyy-mm-dd hh:mm:ss":{mask:"y-1-2 h:s:s",placeholder:"yyyy-mm-dd hh:mm:ss",alias:"datetime",separator:"-",leapday:"-02-29",regex:{val2pre:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[13-9]|1[012])"+c+"[0-3])|(02"+c+"[0-2])")},val2:function(a){var c=b.escapeRegex.call(this,a);return new RegExp("((0[1-9]|1[012])"+c+"(0[1-9]|[12][0-9]))|((0[13-9]|1[012])"+c+"30)|((0[13578]|1[02])"+c+"31)")},val1pre:new RegExp("[01]"),val1:new RegExp("0[1-9]|1[012]")},onKeyDown:function(a,b,c,d){}}}),b}(jQuery,Inputmask),function(a,b){return b.extendDefinitions({A:{validator:"[A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",cardinality:1,casing:"upper"},"&":{validator:"[0-9A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",cardinality:1,casing:"upper"},"#":{validator:"[0-9A-Fa-f]",cardinality:1,casing:"upper"}}),b.extendAliases({url:{definitions:{i:{validator:".",cardinality:1}},mask:"(\\http://)|(\\http\\s://)|(ftp://)|(ftp\\s://)i{+}",insertMode:!1,autoUnmask:!1,inputmode:"url"},ip:{mask:"i[i[i]].i[i[i]].i[i[i]].i[i[i]]",definitions:{i:{validator:function(a,b,c,d,e){return c-1>-1&&"."!==b.buffer[c-1]?(a=b.buffer[c-1]+a,a=c-2>-1&&"."!==b.buffer[c-2]?b.buffer[c-2]+a:"0"+a):a="00"+a,new RegExp("25[0-5]|2[0-4][0-9]|[01][0-9][0-9]").test(a)},cardinality:1}},onUnMask:function(a,b,c){return a},inputmode:"numeric"},email:{mask:"*{1,64}[.*{1,64}][.*{1,64}][.*{1,63}]@-{1,63}.-{1,63}[.-{1,63}][.-{1,63}]",greedy:!1,onBeforePaste:function(a,b){return a=a.toLowerCase(),a.replace("mailto:","")},definitions:{"*":{validator:"[0-9A-Za-z!#$%&'*+/=?^_`{|}~-]",cardinality:1,casing:"lower"},"-":{validator:"[0-9A-Za-z-]",cardinality:1,casing:"lower"}},onUnMask:function(a,b,c){return a},inputmode:"email"},mac:{mask:"##:##:##:##:##:##"},vin:{mask:"V{13}9{4}",definitions:{V:{validator:"[A-HJ-NPR-Za-hj-npr-z\\d]",cardinality:1,casing:"upper"}},clearIncomplete:!0,autoUnmask:!0}}),b}(jQuery,Inputmask),function(a,b){return b.extendAliases({numeric:{mask:function(a){function c(b){for(var c="",d=0;d<b.length;d++)c+=a.definitions[b.charAt(d)]||a.optionalmarker.start===b.charAt(d)||a.optionalmarker.end===b.charAt(d)||a.quantifiermarker.start===b.charAt(d)||a.quantifiermarker.end===b.charAt(d)||a.groupmarker.start===b.charAt(d)||a.groupmarker.end===b.charAt(d)||a.alternatormarker===b.charAt(d)?"\\"+b.charAt(d):b.charAt(d);return c}if(0!==a.repeat&&isNaN(a.integerDigits)&&(a.integerDigits=a.repeat),a.repeat=0,a.groupSeparator===a.radixPoint&&("."===a.radixPoint?a.groupSeparator=",":","===a.radixPoint?a.groupSeparator=".":a.groupSeparator="")," "===a.groupSeparator&&(a.skipOptionalPartCharacter=void 0),a.autoGroup=a.autoGroup&&""!==a.groupSeparator,a.autoGroup&&("string"==typeof a.groupSize&&isFinite(a.groupSize)&&(a.groupSize=parseInt(a.groupSize)),isFinite(a.integerDigits))){var d=Math.floor(a.integerDigits/a.groupSize),e=a.integerDigits%a.groupSize;a.integerDigits=parseInt(a.integerDigits)+(0===e?d-1:d),a.integerDigits<1&&(a.integerDigits="*")}a.placeholder.length>1&&(a.placeholder=a.placeholder.charAt(0)),"radixFocus"===a.positionCaretOnClick&&""===a.placeholder&&a.integerOptional===!1&&(a.positionCaretOnClick="lvp"),a.definitions[";"]=a.definitions["~"],a.definitions[";"].definitionSymbol="~",a.numericInput===!0&&(a.positionCaretOnClick="radixFocus"===a.positionCaretOnClick?"lvp":a.positionCaretOnClick,a.digitsOptional=!1,isNaN(a.digits)&&(a.digits=2),a.decimalProtect=!1);var f="[+]";if(f+=c(a.prefix),f+=a.integerOptional===!0?"~{1,"+a.integerDigits+"}":"~{"+a.integerDigits+"}",void 0!==a.digits){a.radixPointDefinitionSymbol=a.decimalProtect?":":a.radixPoint;var g=a.digits.toString().split(",");isFinite(g[0]&&g[1]&&isFinite(g[1]))?f+=a.radixPointDefinitionSymbol+";{"+a.digits+"}":(isNaN(a.digits)||parseInt(a.digits)>0)&&(f+=a.digitsOptional?"["+a.radixPointDefinitionSymbol+";{1,"+a.digits+"}]":a.radixPointDefinitionSymbol+";{"+a.digits+"}")}return f+=c(a.suffix),f+="[-]",a.greedy=!1,null!==a.min&&(a.min=a.min.toString().replace(new RegExp(b.escapeRegex(a.groupSeparator),"g"),""),","===a.radixPoint&&(a.min=a.min.replace(a.radixPoint,"."))),null!==a.max&&(a.max=a.max.toString().replace(new RegExp(b.escapeRegex(a.groupSeparator),"g"),""),","===a.radixPoint&&(a.max=a.max.replace(a.radixPoint,"."))),f},placeholder:"",greedy:!1,digits:"*",digitsOptional:!0,radixPoint:".",positionCaretOnClick:"radixFocus",groupSize:3,groupSeparator:"",autoGroup:!1,allowPlus:!0,allowMinus:!0,negationSymbol:{front:"-",back:""},integerDigits:"+",integerOptional:!0,prefix:"",suffix:"",rightAlign:!0,decimalProtect:!0,min:null,max:null,step:1,insertMode:!0,autoUnmask:!1,unmaskAsNumber:!1,inputmode:"numeric",postFormat:function(c,d,e){e.numericInput===!0&&(c=c.reverse(),isFinite(d)&&(d=c.join("").length-d-1));var f,g;d=d>=c.length?c.length-1:d<0?0:d;var h=c[d],i=c.slice();h===e.groupSeparator&&d>e.prefix.length&&d<c.length-e.suffix.length&&(i.splice(d--,1),h=i[d]);var j=i.join("").match(new RegExp("^"+b.escapeRegex(e.negationSymbol.front)));j=null!==j&&1===j.length,d>(j?e.negationSymbol.front.length:0)+e.prefix.length&&d<i.length-e.suffix.length&&(i[d]="!");var k=i.join(""),l=i.join();if(j&&(k=k.replace(new RegExp("^"+b.escapeRegex(e.negationSymbol.front)),""),k=k.replace(new RegExp(b.escapeRegex(e.negationSymbol.back)+"$"),"")),k=k.replace(new RegExp(b.escapeRegex(e.suffix)+"$"),""),k=k.replace(new RegExp("^"+b.escapeRegex(e.prefix)),""),k.length>0&&e.autoGroup||k.indexOf(e.groupSeparator)!==-1){var m=b.escapeRegex(e.groupSeparator);
k=k.replace(new RegExp(m,"g"),"");var n=k.split(h===e.radixPoint?"!":e.radixPoint);if(k=""===e.radixPoint?k:n[0],h!==e.negationSymbol.front&&(k=k.replace("!","?")),k.length>e.groupSize)for(var o=new RegExp("([-+]?[\\d?]+)([\\d?]{"+e.groupSize+"})");o.test(k)&&""!==e.groupSeparator;)k=k.replace(o,"$1"+e.groupSeparator+"$2"),k=k.replace(e.groupSeparator+e.groupSeparator,e.groupSeparator);k=k.replace("?","!"),""!==e.radixPoint&&n.length>1&&(k+=(h===e.radixPoint?"!":e.radixPoint)+n[1])}k=e.prefix+k+e.suffix,j&&(k=e.negationSymbol.front+k+e.negationSymbol.back);var p=l!==k.split("").join(),q=a.inArray("!",k);if(q===-1&&(q=d),p){for(c.length=k.length,f=0,g=k.length;f<g;f++)c[f]=k.charAt(f);c[q]=h}return q=e.numericInput&&isFinite(d)?c.join("").length-q-1:q,e.numericInput&&(c=c.reverse(),a.inArray(e.radixPoint,c)<q&&c.join("").length-e.suffix.length!==q&&(q-=1)),{pos:q,refreshFromBuffer:p,buffer:c,isNegative:j}},onBeforeWrite:function(c,d,e,f){var g;if(c&&("blur"===c.type||"checkval"===c.type||"keydown"===c.type)){var h=f.numericInput?d.slice().reverse().join(""):d.join(""),i=h.replace(f.prefix,"");i=i.replace(f.suffix,""),i=i.replace(new RegExp(b.escapeRegex(f.groupSeparator),"g"),""),","===f.radixPoint&&(i=i.replace(f.radixPoint,"."));var j=i.match(new RegExp("[-"+b.escapeRegex(f.negationSymbol.front)+"]","g"));if(j=null!==j&&1===j.length,i=i.replace(new RegExp("[-"+b.escapeRegex(f.negationSymbol.front)+"]","g"),""),i=i.replace(new RegExp(b.escapeRegex(f.negationSymbol.back)+"$"),""),isNaN(f.placeholder)&&(i=i.replace(new RegExp(b.escapeRegex(f.placeholder),"g"),"")),i=i===f.negationSymbol.front?i+"0":i,""!==i&&isFinite(i)){var k=parseFloat(i),l=j?k*-1:k;if("blur"===c.type&&(null!==f.min&&isFinite(f.min)&&l<parseFloat(f.min)?(k=Math.abs(f.min),j=f.min<0,h=void 0):null!==f.max&&isFinite(f.max)&&l>parseFloat(f.max)&&(k=Math.abs(f.max),j=f.max<0,h=void 0)),i=k.toString().replace(".",f.radixPoint).split(""),isFinite(f.digits)){var m=a.inArray(f.radixPoint,i),n=a.inArray(f.radixPoint,h);m===-1&&(i.push(f.radixPoint),m=i.length-1);for(var o=1;o<=f.digits;o++)f.digitsOptional||void 0!==i[m+o]&&i[m+o]!==f.placeholder.charAt(0)?n!==-1&&void 0!==h[n+o]&&(i[m+o]=i[m+o]||h[n+o]):i[m+o]="0";i[i.length-1]===f.radixPoint&&delete i[i.length-1]}if(k.toString()!==i&&k.toString()+"."!==i||j)return i=(f.prefix+i.join("")).split(""),!j||0===k&&"blur"===c.type||(i.unshift(f.negationSymbol.front),i.push(f.negationSymbol.back)),f.numericInput&&(i=i.reverse()),g=f.postFormat(i,f.numericInput?e:e-1,f),g.buffer&&(g.refreshFromBuffer=g.buffer.join("")!==d.join("")),g}}if(f.autoGroup)return g=f.postFormat(d,f.numericInput?e:e-1,f),g.caret=e<(g.isNegative?f.negationSymbol.front.length:0)+f.prefix.length||e>g.buffer.length-(g.isNegative?f.negationSymbol.back.length:0)?g.pos:g.pos+1,g},regex:{integerPart:function(a){return new RegExp("["+b.escapeRegex(a.negationSymbol.front)+"+]?\\d+")},integerNPart:function(a){return new RegExp("[\\d"+b.escapeRegex(a.groupSeparator)+b.escapeRegex(a.placeholder.charAt(0))+"]+")}},signHandler:function(a,b,c,d,e){if(!d&&e.allowMinus&&"-"===a||e.allowPlus&&"+"===a){var f=b.buffer.join("").match(e.regex.integerPart(e));if(f&&f[0].length>0)return b.buffer[f.index]===("-"===a?"+":e.negationSymbol.front)?"-"===a?""!==e.negationSymbol.back?{pos:0,c:e.negationSymbol.front,remove:0,caret:c,insert:{pos:b.buffer.length-1,c:e.negationSymbol.back}}:{pos:0,c:e.negationSymbol.front,remove:0,caret:c}:""!==e.negationSymbol.back?{pos:0,c:"+",remove:[0,b.buffer.length-1],caret:c}:{pos:0,c:"+",remove:0,caret:c}:b.buffer[0]===("-"===a?e.negationSymbol.front:"+")?"-"===a&&""!==e.negationSymbol.back?{remove:[0,b.buffer.length-1],caret:c-1}:{remove:0,caret:c-1}:"-"===a?""!==e.negationSymbol.back?{pos:0,c:e.negationSymbol.front,caret:c+1,insert:{pos:b.buffer.length,c:e.negationSymbol.back}}:{pos:0,c:e.negationSymbol.front,caret:c+1}:{pos:0,c:a,caret:c+1}}return!1},radixHandler:function(b,c,d,e,f){if(!e&&f.numericInput!==!0&&b===f.radixPoint&&void 0!==f.digits&&(isNaN(f.digits)||parseInt(f.digits)>0)){var g=a.inArray(f.radixPoint,c.buffer),h=c.buffer.join("").match(f.regex.integerPart(f));if(g!==-1&&c.validPositions[g])return c.validPositions[g-1]?{caret:g+1}:{pos:h.index,c:h[0],caret:g+1};if(!h||"0"===h[0]&&h.index+1!==d)return c.buffer[h?h.index:d]="0",{pos:(h?h.index:d)+1,c:f.radixPoint}}return!1},leadingZeroHandler:function(b,c,d,e,f,g){if(!e){var h=d,i=f.numericInput===!0?c.buffer.slice("").reverse():c.buffer.slice("");f.numericInput&&(d=i.join("").length-d-1),i.splice(0,f.prefix.length),i.splice(i.length-f.suffix.length,f.suffix.length),d-=f.prefix.length;var j=a.inArray(f.radixPoint,i),k=i.slice(0,j!==-1?j:void 0).join("").match(f.regex.integerNPart(f));if(k&&(j===-1||d<=j||f.numericInput)){var l=j===-1?0:parseInt(i.slice(j+1).join("")),m=0===k[0].indexOf(""!==f.placeholder?f.placeholder.charAt(0):"0");if(f.numericInput){if(m&&0!==l&&g!==!0)return c.buffer.splice(i.length-k.index-1+f.suffix.length,1),{pos:h,remove:i.length-k.index-1+f.suffix.length}}else{if(m&&(k.index+1===d||g!==!0&&0===l))return c.buffer.splice(k.index+f.prefix.length,1),{pos:k.index+f.prefix.length,remove:k.index+f.prefix.length};if("0"===b&&d<=k.index&&k[0]!==f.groupSeparator)return!1}}}return!0},definitions:{"~":{validator:function(c,d,e,f,g,h){var i=g.signHandler(c,d,e,f,g);if(!i&&(i=g.radixHandler(c,d,e,f,g),!i&&(i=f?new RegExp("[0-9"+b.escapeRegex(g.groupSeparator)+"]").test(c):new RegExp("[0-9]").test(c),i===!0&&(i=g.leadingZeroHandler(c,d,e,f,g,h),i===!0&&g.numericInput!==!0)))){var j=a.inArray(g.radixPoint,d.buffer);i=j!==-1&&(g.digitsOptional===!1||d.validPositions[e])&&g.numericInput!==!0&&e>j&&!f?{pos:e,remove:e}:{pos:e}}return i},cardinality:1},"+":{validator:function(a,b,c,d,e){var f=e.signHandler(a,b,c,d,e);return!f&&(d&&e.allowMinus&&a===e.negationSymbol.front||e.allowMinus&&"-"===a||e.allowPlus&&"+"===a)&&(f=!(!d&&"-"===a)||(""!==e.negationSymbol.back?{pos:c,c:"-"===a?e.negationSymbol.front:"+",caret:c+1,insert:{pos:b.buffer.length,c:e.negationSymbol.back}}:{pos:c,c:"-"===a?e.negationSymbol.front:"+",caret:c+1})),f},cardinality:1,placeholder:""},"-":{validator:function(a,b,c,d,e){var f=e.signHandler(a,b,c,d,e);return!f&&d&&e.allowMinus&&a===e.negationSymbol.back&&(f=!0),f},cardinality:1,placeholder:""},":":{validator:function(a,c,d,e,f){var g=f.signHandler(a,c,d,e,f);if(!g){var h="["+b.escapeRegex(f.radixPoint)+"]";g=new RegExp(h).test(a),g&&c.validPositions[d]&&c.validPositions[d].match.placeholder===f.radixPoint&&(g={caret:d+1})}return g},cardinality:1,placeholder:function(a){return a.radixPoint}}},onUnMask:function(a,c,d){if(""===c&&d.nullable===!0)return c;var e=a.replace(d.prefix,"");return e=e.replace(d.suffix,""),e=e.replace(new RegExp(b.escapeRegex(d.groupSeparator),"g"),""),d.unmaskAsNumber?(""!==d.radixPoint&&e.indexOf(d.radixPoint)!==-1&&(e=e.replace(b.escapeRegex.call(this,d.radixPoint),".")),Number(e)):e},isComplete:function(a,c){var d=a.join(""),e=a.slice();if(c.postFormat(e,0,c),e.join("")!==d)return!1;var f=d.replace(c.prefix,"");return f=f.replace(c.suffix,""),f=f.replace(new RegExp(b.escapeRegex(c.groupSeparator),"g"),""),","===c.radixPoint&&(f=f.replace(b.escapeRegex(c.radixPoint),".")),isFinite(f)},onBeforeMask:function(a,c){if(a=a.toString(),c.numericInput===!0&&(a=a.split("").reverse().join("")),""!==c.radixPoint&&isFinite(a)){var d=a.split("."),e=""!==c.groupSeparator?parseInt(c.groupSize):0;2===d.length&&(d[0].length>e||d[1].length>e)&&(a=a.replace(".",c.radixPoint))}var f=a.match(/,/g),g=a.match(/\./g);if(g&&f?g.length>f.length?(a=a.replace(/\./g,""),a=a.replace(",",c.radixPoint)):f.length>g.length?(a=a.replace(/,/g,""),a=a.replace(".",c.radixPoint)):a=a.indexOf(".")<a.indexOf(",")?a.replace(/\./g,""):a=a.replace(/,/g,""):a=a.replace(new RegExp(b.escapeRegex(c.groupSeparator),"g"),""),0===c.digits&&(a.indexOf(".")!==-1?a=a.substring(0,a.indexOf(".")):a.indexOf(",")!==-1&&(a=a.substring(0,a.indexOf(",")))),""!==c.radixPoint&&isFinite(c.digits)&&a.indexOf(c.radixPoint)!==-1){var h=a.split(c.radixPoint),i=h[1].match(new RegExp("\\d*"))[0];if(parseInt(c.digits)<i.toString().length){var j=Math.pow(10,parseInt(c.digits));a=a.replace(b.escapeRegex(c.radixPoint),"."),a=Math.round(parseFloat(a)*j)/j,a=a.toString().replace(".",c.radixPoint)}}return c.numericInput===!0&&(a=a.split("").reverse().join("")),a},canClearPosition:function(a,b,c,d,e){var f=a.validPositions[b].input,g=f!==e.radixPoint||null!==a.validPositions[b].match.fn&&e.decimalProtect===!1||isFinite(f)||b===c||f===e.groupSeparator||f===e.negationSymbol.front||f===e.negationSymbol.back;return g},onKeyDown:function(c,d,e,f){var g=a(this);if(c.ctrlKey)switch(c.keyCode){case b.keyCode.UP:g.val(parseFloat(this.inputmask.unmaskedvalue())+parseInt(f.step)),g.trigger("setvalue");break;case b.keyCode.DOWN:g.val(parseFloat(this.inputmask.unmaskedvalue())-parseInt(f.step)),g.trigger("setvalue")}}},currency:{prefix:"$ ",groupSeparator:",",alias:"numeric",placeholder:"0",autoGroup:!0,digits:2,digitsOptional:!1,clearMaskOnLostFocus:!1},decimal:{alias:"numeric"},integer:{alias:"numeric",digits:0,radixPoint:""},percentage:{alias:"numeric",digits:2,radixPoint:".",placeholder:"0",autoGroup:!1,min:0,max:100,suffix:" %",allowPlus:!1,allowMinus:!1}}),b}(jQuery,Inputmask),function(a,b){function c(a,b){var c=(a.mask||a).replace(/#/g,"9").replace(/\)/,"9").replace(/[+()#-]/g,""),d=(b.mask||b).replace(/#/g,"9").replace(/\)/,"9").replace(/[+()#-]/g,""),e=(a.mask||a).split("#")[0],f=(b.mask||b).split("#")[0];return 0===f.indexOf(e)?-1:0===e.indexOf(f)?1:c.localeCompare(d)}var d=b.prototype.analyseMask;return b.prototype.analyseMask=function(b,c){function e(a,c,d){c=c||"",d=d||g,""!==c&&(d[c]={});for(var f="",h=d[c]||d,i=a.length-1;i>=0;i--)b=a[i].mask||a[i],f=b.substr(0,1),h[f]=h[f]||[],h[f].unshift(b.substr(1)),a.splice(i,1);for(var j in h)h[j].length>500&&e(h[j].slice(),j,h)}function f(b){var d="",e=[];for(var g in b)a.isArray(b[g])?1===b[g].length?e.push(g+b[g]):e.push(g+c.groupmarker.start+b[g].join(c.groupmarker.end+c.alternatormarker+c.groupmarker.start)+c.groupmarker.end):e.push(g+f(b[g]));return d+=1===e.length?e[0]:c.groupmarker.start+e.join(c.groupmarker.end+c.alternatormarker+c.groupmarker.start)+c.groupmarker.end}var g={};c.phoneCodes&&(c.phoneCodes&&c.phoneCodes.length>1e3&&(b=b.substr(1,b.length-2),e(b.split(c.groupmarker.end+c.alternatormarker+c.groupmarker.start)),b=f(g)),b=b.replace(/9/g,"\\9"));var h=d.call(this,b,c);return h},b.extendAliases({abstractphone:{groupmarker:{start:"<",end:">"},countrycode:"",phoneCodes:[],mask:function(a){return a.definitions={"#":b.prototype.definitions[9]},a.phoneCodes.sort(c)},keepStatic:!0,onBeforeMask:function(a,b){var c=a.replace(/^0{1,2}/,"").replace(/[\s]/g,"");return(c.indexOf(b.countrycode)>1||c.indexOf(b.countrycode)===-1)&&(c="+"+b.countrycode+c),c},onUnMask:function(a,b,c){return b},inputmode:"tel"}}),b}(jQuery,Inputmask),function(a,b){return b.extendAliases({Regex:{mask:"r",greedy:!1,repeat:"*",regex:null,regexTokens:null,tokenizer:/\[\^?]?(?:[^\\\]]+|\\[\S\s]?)*]?|\\(?:0(?:[0-3][0-7]{0,2}|[4-7][0-7]?)?|[1-9][0-9]*|x[0-9A-Fa-f]{2}|u[0-9A-Fa-f]{4}|c[A-Za-z]|[\S\s]?)|\((?:\?[:=!]?)?|(?:[?*+]|\{[0-9]+(?:,[0-9]*)?\})\??|[^.?*+^${[()|\\]+|./g,quantifierFilter:/[0-9]+[^,]/,isComplete:function(a,b){return new RegExp(b.regex,b.casing?"i":"").test(a.join(""))},definitions:{r:{validator:function(b,c,d,e,f){function g(a,b){this.matches=[],this.isGroup=a||!1,this.isQuantifier=b||!1,this.quantifier={min:1,max:1},this.repeaterPart=void 0}function h(){var a,b,c=new g,d=[];for(f.regexTokens=[];a=f.tokenizer.exec(f.regex);)switch(b=a[0],b.charAt(0)){case"(":d.push(new g((!0)));break;case")":k=d.pop(),d.length>0?d[d.length-1].matches.push(k):c.matches.push(k);break;case"{":case"+":case"*":var e=new g((!1),(!0));b=b.replace(/[{}]/g,"");var h=b.split(","),i=isNaN(h[0])?h[0]:parseInt(h[0]),j=1===h.length?i:isNaN(h[1])?h[1]:parseInt(h[1]);if(e.quantifier={min:i,max:j},d.length>0){var l=d[d.length-1].matches;a=l.pop(),a.isGroup||(k=new g((!0)),k.matches.push(a),a=k),l.push(a),l.push(e)}else a=c.matches.pop(),a.isGroup||(k=new g((!0)),k.matches.push(a),a=k),c.matches.push(a),c.matches.push(e);break;default:d.length>0?d[d.length-1].matches.push(b):c.matches.push(b)}c.matches.length>0&&f.regexTokens.push(c)}function i(b,c){var d=!1;c&&(m+="(",o++);for(var e=0;e<b.matches.length;e++){var g=b.matches[e];if(g.isGroup===!0)d=i(g,!0);else if(g.isQuantifier===!0){var h=a.inArray(g,b.matches),k=b.matches[h-1],l=m;if(isNaN(g.quantifier.max)){for(;g.repeaterPart&&g.repeaterPart!==m&&g.repeaterPart.length>m.length&&!(d=i(k,!0)););d=d||i(k,!0),d&&(g.repeaterPart=m),m=l+g.quantifier.max}else{for(var n=0,p=g.quantifier.max-1;n<p&&!(d=i(k,!0));n++);m=l+"{"+g.quantifier.min+","+g.quantifier.max+"}"}}else if(void 0!==g.matches)for(var q=0;q<g.length&&!(d=i(g[q],c));q++);else{var r;if("["==g.charAt(0)){r=m,r+=g;for(var s=0;s<o;s++)r+=")";var t=new RegExp("^("+r+")$",f.casing?"i":"");d=t.test(j)}else for(var u=0,v=g.length;u<v;u++)if("\\"!==g.charAt(u)){r=m,r+=g.substr(0,u+1),r=r.replace(/\|$/,"");for(var s=0;s<o;s++)r+=")";var t=new RegExp("^("+r+")$",f.casing?"i":"");if(d=t.test(j))break}m+=g}if(d)break}return c&&(m+=")",o--),d}var j,k,l=c.buffer.slice(),m="",n=!1,o=0;null===f.regexTokens&&h(),l.splice(d,0,b),j=l.join("");for(var p=0;p<f.regexTokens.length;p++){var q=f.regexTokens[p];if(n=i(q,q.isGroup))break}return n},cardinality:1}}}}),b}(jQuery,Inputmask);