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


	$('document').ready(function(){
		bindfancyboxClick();
		validateFormAAPP();
	});	

	function fancyMessageBox(msg, title) {
	    if (title) msg = "<h2>" + title + "</h2><p>" + msg + "</p>";
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
						.find( "label[for='" + element.attr( "id" ) + "']" )
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
				'hideOnContentClick': false
			});
		}
	}

</script>


{if $aap_hook == 0}
<li class="askaboutproduct position0">
	<a id="pd_send_custommer_question_button_{$aap_product->id}" href="#pd_aap_send_custommer_form_{$aap_product->id}">{l s='Ask about product' mod='pdaskaboutproductpro'}</a>
</li>
{elseif $aap_hook == 1}
<p class="buttons_bottom_block no-print">
<span class="askaboutproduct position1">
	<a id="pd_send_custommer_question_button_{$aap_product->id}" class="btn btn-default button button-medium" href="#pd_aap_send_custommer_form_{$aap_product->id}">
		<span>{l s='Ask about product' mod='pdaskaboutproductpro'}</span>
	</a>
</span>
</p>
{elseif $aap_hook == 2}
<p class="askaboutproduct position2">
	<a id="pd_send_custommer_question_button_{$aap_product->id}" class="btn btn-default button button-small" href="#pd_aap_send_custommer_form_{$aap_product->id}">
		<span>
			{l s='Ask about product' mod='pdaskaboutproductpro'}
		</span>
	</a>
</p>
{elseif $aap_hook == 3}
<section class="page-product-box">
	<h3 class="page-product-heading">{l s='Ask about product' mod='pdaskaboutproductpro'}</h3>
{/if}

{if $aap_hook != 3}
	<div style="display:none;">
{else}
	<div id="idTabAAP">
{/if}
	<div id="pd_aap_send_custommer_form_{$aap_product->id}{if $aap_hook == 3}_tab_content{/if}" class="pd_aap_send_custommer_form">
		{if $aap_hook != 3}<h2 class="title page-subheading">{l s='Ask about product' mod='pdaskaboutproductpro'}</h2>{/if}
		<div class="row">
			
			{if $aap_hook != 3 && $aap_product_infos}
			<div class="product clearfix col-xs-12 col-sm-4">
				<img decoding="async" class="img-responsive img-fluid img" src="{$link->getImageLink($aap_product->link_rewrite, $aap_product_cover, 'home_default')|escape:'htmlall':'UTF-8'}" height="{$homeSize.height|escape:'htmlall':'UTF-8'}" width="{$homeSize.width|escape:'htmlall':'UTF-8'}" alt="{$aap_product->name|escape:htmlall:'UTF-8'}" />
				<div class="product_desc">
					<p class="product_name"><strong>{$aap_product->name|escape:'htmlall':'UTF-8'}</strong></p>
					{* CANT ESCAPE PRODUCT DESCRIPTION HTML *}

					{if $ps_version_17}
						{$aap_product->description_short nofilter}
					{else}
						{$aap_product->description_short}
					{/if}
				</div>
			</div>
			{/if}
			
			<div class="content_form col-xs-12 {if $aap_hook != 3 && $aap_product_infos}col-sm-8 col-sm-8 {else}col-sm-12 col-ld-12{/if}">
				{if $aap_hook == 1}
				</form> {* add here because leftColumn hook are in form tag *}
				{/if}
				<form id="aap_customer_question_form_{$aap_product->id}" class="cmxform" action="" method="get">
				<div class="form_container">
					<p>{l s='Please fill below informations. Customer service will contact with You soon as is possible.' mod='pdaskaboutproductpro'}</p>
					<fieldset>
						{foreach from=$aap_fields_names item=field key=k}
							{if in_array($k, $aap_fields_a)}
								<p class="text">
							
									<label for="{$k|escape:'htmlall':'UTF-8'}">{$field[0]|escape:'htmlall':'UTF-8'} {if in_array($k, $aap_fields_r)}<sup class="required">*</sup>{/if} :</label>
									{if $field[1] == 'textarea'}
										<textarea id="{$k|escape:'htmlall':'UTF-8'}" name="{$k|escape:'htmlall':'UTF-8'}" rows="5" cols="5"></textarea> 
									{elseif $field[1] == 'text'}
										<input id="{$k|escape:'htmlall':'UTF-8'}" type="text" name="{$k|escape:'htmlall':'UTF-8'}" value="{if $k|escape:'htmlall':'UTF-8' == 'firstname' AND isset({$aap_c_firstname})}{$aap_c_firstname|escape:'htmlall':'UTF-8'}{elseif $k|escape:'htmlall':'UTF-8' == 'lastname' AND isset({$aap_c_lastname})}{$aap_c_lastname|escape:'htmlall':'UTF-8'}{elseif $k|escape:'htmlall':'UTF-8' == 'email' AND isset({$aap_c_email})}{$aap_c_email|escape:'htmlall':'UTF-8'}{/if}">
									{elseif $field[1] == 'checkbox'}
										<input class="privacy_policy" type="checkbox" name="{$k}" id="{$k}" required="true" value="1" />
		                            	<label class="{$k}" for="{$k}">{l s='I have read the privacy policy' mod='pdaskaboutproductpro'}{if in_array($k, $aap_fields_r)}<sup class="required">*</sup>{/if} 

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
									
								</p>
							{/if}
						{/foreach}

					<p class="txt_required"><sup class="required">*</sup> {l s='Required fields' mod='pdaskaboutproductpro'}</p>
				
					<p class="submit">
						<input name="recaptcha_value" id="recaptcha_value" type="hidden" value="{$captcha_enabled}" />
						<input id="id_product_send" name="id_product" type="hidden" value="{$aap_product->id|escape:'htmlall':'UTF-8'}" />
						{if $aap_hook != 3}<a href="#" onclick="$.fancybox.close();">{l s='Cancel' mod='pdaskaboutproductpro'}</a>&nbsp;{l s='or' mod='pdaskaboutproductpro'}&nbsp;{/if}
						<input id="sendQuestionEmail" class="btn button button-small" name="sendQuestionEmail" type="submit" value="{l s='Send' mod='pdaskaboutproductpro'}" />
					</p>
				</fieldset>
				</div>
				</form>
			</div>
		</div>
	</div>
{if $aap_hook != 3}
</div>
{else}
</div>
{/if}

{if $ps_version_16 && $aap_hook == 3}
</section>
{/if}


