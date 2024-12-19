{*
*
* 2012-2018 Patryk Marek PrestaDev.pl
*
* Patryk Marek PrestaDev.pl - PD Ask about product Pro module © All rights reserved.
*
* DISCLAIMER
*
* Do not edit, modify or copy this file.
* If you wish to customize it, contact us at info@prestadev.pl.
*
* @author    Patryk Marek PrestaDev.pl <info@prestadev.pl>
* @copyright 2012-2018 Patryk Marek - PrestaDev.pl
* @license   License is for use in domain / or one multistore enviroment (do not modify or reuse this code or part of it) if you want any changes please contact with me at info@prestadev.pl
* @link      http://prestadev.pl
* @package   Ask about product Pro for Prestashop 1.5.x and 1.6.x and 1.7.x
* @version   2.0.1
* @date      06-01-2014
*
*}


<script type="text/javascript">

	// Validiation Errors Translations
	var email_error = '{l s='Please enter a valid email address.' mod='pdaskaboutproductpro'}';
	var firstname_error = '{l s='Please enter your first name.' mod='pdaskaboutproductpro'}';
	var lastname_error = '{l s='Please enter your last name.' mod='pdaskaboutproductpro'}';
	var commpany_error = '{l s='Please enter your company name.' mod='pdaskaboutproductpro'}';
	var vat_error = '{l s='Please enter your vat number.' mod='pdaskaboutproductpro'}';
	var phone_error = '{l s='Please enter your phone number.' mod='pdaskaboutproductpro'}';
	var phone_prefix_error = '{l s='Please enter your phone prefix number.' mod='pdaskaboutproductpro'}';
	var mobile_phone_error = '{l s='Please enter your mobile phone number.' mod='pdaskaboutproductpro'}';
	var mobile_phone_prefix_error = '{l s='Please enter your mobile phone prefix number.' mod='pdaskaboutproductpro'}';
	var address_error = '{l s='Please enter your address.' mod='pdaskaboutproductpro'}';
	var city_error = '{l s='Please enter your city name.' mod='pdaskaboutproductpro'}';
	var postcode_error = '{l s='Please enter your postcode.' mod='pdaskaboutproductpro'}';
	var question_error = '{l s='Please enter your question.' mod='pdaskaboutproductpro'}';
	var sucsess_message = '{l s='Email was send.' mod='pdaskaboutproductpro'}';
	var privacy_policy_error = '{l s='Please accept privacy policy' mod='pdaskaboutproductpro'}';
	var captcha_error = '{l s='Please solve captcha challenge' mod='pdaskaboutproductpro'}';


	document.addEventListener("DOMContentLoaded", function(event) { 
		$('document').ready(function(){
			bindfancyboxClick();
			validateFormAAPP();
		});		
	});

	function fancyMessageBox(msg, title) {
	    if (title) msg = "<p>" + msg + "</p>";
	    msg += "<br/><p class=\"submit\" style=\"text-align:right; padding-bottom: 0\"><input class=\"button\" type=\"button\" value=\"OK\" onclick=\"$.fancybox.close();\" /></p>";
		if(!!$.prototype.fancybox)
	    	$.fancybox( msg,{ldelim}'autoDimensions': false, 'autoSize': false, 'width': 500, 'height': 'auto', 'openEffect': 'none', 'closeEffect': 'none'{rdelim} );
	}


	function validateFormAAPP() {

		$("form#aap_customer_question_form_{$aap_product->id}").validate({
				rules: {
					{foreach from=$aap_fields_names item=field key=k name=fields}
						{if in_array($k, $aap_fields_a)}
							{if $k eq 'email'}
								{$k|lower|escape:'htmlall':'UTF-8'}: {
									required: true,
									email: true,
								},
							{else}
								{if in_array($k, $aap_fields_r)}
									{$k|lower|escape:'htmlall':'UTF-8'}: "required",
								{/if}
							{/if}
						{/if}
					{/foreach}
				
				},
				errorPlacement: function(error, element) {
				// Append error within linked label
				$( element )
					.closest( "form" )
						.find( "div[for='" + element.attr( "id" ) + "']" )
							.append( error );
				},
				messages: {
					email: email_error,
					firstname: firstname_error,
					lastname: lastname_error,
					commpany: commpany_error,
					vat: vat_error,
					phone: phone_error,
					mobile_phone: mobile_phone_error,
					phone_prefix: phone_prefix_error,
					mobile_phone_prefix: mobile_phone_prefix_error,
					address: address_error,
					city: city_error,
					postcode: postcode_error,
					question: question_error,
					privacy_policy: privacy_policy_error
				},
				submitHandler: function(form){
					$("#sendQuestionEmail").attr("disabled", true);
					var datas = [];
					$('form#aap_customer_question_form_{$aap_product->id}').find('input, textarea').each(function(index){
						var o = {};
						o[$(this).attr('name')] = $(this).val();
						if ($(this).val() != '') {
							datas.push(o);
						}
					});
					var response = '',
						recaptcha_value = 0;
					{if !empty($grecaptcha_public_site_key) && !empty($grecaptcha_secret_key)}
						{foreach from=$aap_fields_names item=field key=k}
							{if in_array($k, $aap_fields_a)}
								{if $field[1] == 'recaptcha'}
									response = grecaptcha.getResponse();
									recaptcha_value = parseInt($('#recaptcha_value').val());
								{/if}
							{/if}
						{/foreach}
					{/if}

					$.ajax({
						{literal}
						url: pdaskaboutproductpro_ajax_link,
						type: "POST",
						data: {action: 'submitAskAboutProduct', recaptcha: recaptcha_value, response: response,  secure_key: '{/literal}{$aap_secure_key}{literal}', customerqdata: JSON.stringify(datas)},{/literal}{literal}
						dataType: "json",
						success: function(result){
							if (result === false) {
								$('#g-recaptcha-error').show().text(captcha_error);
								$().show().text(captcha_error);
								$("#sendQuestionEmail").attr("disabled", false);
							} else {
								$('#g-recaptcha-error').hide().text('');
								$("#sendQuestionEmail").attr("disabled", false);
								$.fancybox.close();
								var msg = result.question_send ? "{/literal}{l s='Your email with question has been sent successfully.' mod='pdaskaboutproductpro'}{literal}" : "{/literal}{l s='Your e-mail could not be sent.' mod='pdaskaboutproductpro'}{literal}";
								var title = "{/literal}{l s='Ask about product' mod='pdaskaboutproductpro'}{literal}";
								fancyMessageBox(msg, title);
							}
							{/literal}
						}
					});
				}
		});
	}

	function bindfancyboxClick() {
		if (!!$.prototype.fancybox) {
			$('#pd_send_custommer_question_button_{$aap_product->id}').fancybox({
				'hideOnContentClick': false,
				afterLoad: function() {
				    $('.quickview').modal('hide');
				}
			});
		}
	}

</script>


{if !$content_only}


       <div class=""><div id="pd_aap_send_custommer_form_{$aap_product->id}" class="pd_aap_send_custommer_form">
		<div class="content_form">
				{if $aap_hook == 1 || $aap_hook == 2 || $aap_hook == 4 || $aap_hook == 5}
				</form> {* add here because leftColumn hook are in form tag *}
				{/if}
				<form id="aap_customer_question_form_{$aap_product->id}" class="cmxform" action="" method="get">
				<div class="form_container">
					{if $page.page_name != 'configuration' && $page.page_name != 'architecture'}
						<p class="mb-4">{l s='Please fill below informations. Customer service will contact with You soon as is possible.' mod='pdaskaboutproductpro'}</p>
					{/if}
					<fieldset>
						{foreach from=$aap_fields_names item=field key=k}
							{if in_array($k, $aap_fields_a)}
								<div for="{$k}" class="form-group form-group-small animation_placeholder placeholder_error_5 fields_border_2 text_style {if ($k == lastname OR $k == firstname OR $k == email) && $customer.is_logged}st-not-empty{/if}">
									
									{if $field[1] == 'textarea'}
										<label for="{$k}" class="{if in_array($k, $aap_fields_r)}required{/if} form-control-placeholder">{if in_array($k, $aap_fields_r)}<span class="label_required">*</span>{/if} {$field[0]}<span class="ring">...</span></label>
										<span class="has_error_icon"></span>
										<textarea class="form-control" id="{$k}" name="{$k}" rows="5" cols="5"></textarea> 
									{elseif $field[1] == 'text'}
										<label for="{$k}" class="{if in_array($k, $aap_fields_r)}required{/if} form-control-placeholder">{if in_array($k, $aap_fields_r)}<span class="label_required">*</span>{/if} {$field[0]}<span class="ring">...</span></label>
										<span class="has_error_icon"></span>
										<input id="{$k}" class="form-control" type="text" name="{$k}" value="{if $k == 'firstname' AND isset({$aap_c_firstname})}{$aap_c_firstname}{elseif $k == 'lastname' AND isset({$aap_c_lastname})}{$aap_c_lastname}{elseif $k == 'email' AND isset({$aap_c_email})}{$aap_c_email}{/if}">
									{elseif $field[1] === 'checkbox'}
										<input class="privacy_policy form-control" type="checkbox" name="{$k}" id="{$k}" required="true" value="1" />
		                            	<label class="{$k}" for="{$k}" class="{if in_array($k, $aap_fields_r)}required{/if} form-control-placeholder">{l s='I have read the privacy policy' mod='pdaskaboutproductpro'}{if in_array($k, $aap_fields_r)}<sup class="required">*</sup>{/if}
		                           {elseif $field[1] == 'recaptcha'}
										<label id="g-recaptcha-error" class="error" for="g-recaptcha" style="display:none;"></label>
		                            	{if !empty($grecaptcha_public_site_key) && !empty($grecaptcha_secret_key)}
			                            	<div 
			                            		class="g-recaptcha" 
			                            		data-sitekey="{$grecaptcha_public_site_key}">
			                            	</div>
			                            	<script src="https://www.google.com/recaptcha/api.js"></script>
		                            	{/if}
		                            	
									{/if}
								</div>
							{/if}
						{/foreach}
					{if $page.page_name != 'configuration' && $page.page_name != 'architecture'}
						<p class="txt_required mb-0"><span class="label_required">*</span> {l s='Required fields' mod='pdaskaboutproductpro'}</p>
					{/if}
				
					<p class="submit">
						<input id="id_product_send" name="id_product" type="hidden" value="{$aap_product->id}" />
						<input name="recaptcha_value" id="recaptcha_value" type="hidden" value="{$captcha_enabled}" />
						{if $page.page_name == 'configuration' || $page.page_name == 'architecture'}
							<button  id="sendQuestionEmail" class="btn btn-default btn-large btn_arrow" name="sendQuestionEmail" type="submit">
									{l s='Send message' d='Shop.Theme.Global'}
							</button>
						{else}
							<input id="sendQuestionEmail" class="btn btn-primary" name="sendQuestionEmail" type="submit" value="{l s='Send' mod='pdaskaboutproductpro'}" />
						{/if}
	
					</p>
					{if $page.page_name == 'configuration' || $page.page_name == 'architecture'}
						<p class="privacy">{l s='Privacy policy text' d='Shop.Theme.Global'}</p>
					{/if}
				</fieldset>
				</div>
				</form>
			</div>
          </div></div>
    


	

{/if}