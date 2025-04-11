<div class="steco_layer"></div>
<div id="{$identifier}"
          class = "steco_column_inner {[
                      'steco-step'        => true,
                      'steco-reachable'      => $step_is_reachable,
                      'steco-complete'       => true,
                      'steco-incomplete'       => false
                  ]|classnames}">

{hook h='displayPaymentTop'}
  {if isset($is_free) && $is_free}
    <p>{l s='No payment needed for this order.' d='ShopThemeTransformer'}</p>
  {/if}
  
  <div class="payment-options {if isset($is_free) && $is_free}hidden-xs-up{/if} steco-payment-option row">
   <div class="cart-name-top">{l s='Payment method' d='ShopThemeTransformer'}</div>
    {foreach $payment_options as $module_options}
      {foreach $module_options as $option}
          <div id="{$option.id}-container" class="payment-option steco_mb_6 col-12 payment-plus">
           
            <label for="{$option.id}" class="steco_flex_container align-items-start {if $option.payment > 0}label-plus{/if}">
              <span class="steco-custom-input-box steco-tick">
                <input
                  type="radio"
                  class="steco-custom-input {if $option.binary} binary {/if}"
                  id="{$option.id}"
                  data-module-name="{$option.module_name}"
                  name="payment-option"
                  type="radio"
                  required
                  {if $selected_payment_option == $option.id || (isset($is_free) && $is_free)} checked {/if}
                >
                <span class="steco-custom-input-item steco-custom-input-radio"><div class="payment-check"><span class="checkbox-checked"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.4016 1.2002L4.85554 10.8002L1.60156 7.52782" stroke="#FBFBFB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                </span><i class="eco-spin5 steco-animate-spin"></i></div></span>
              </span>
              
               <span class="align-items-start full-width">
                     <div class="row">
                     
                      <div class="payment-img col-sm-2 col-3">
                      <img decoding="async" src="{$option.logo}" alt="{$option.call_to_action_text}" class="img-fluid" />
                      </div>
                      <div class="payment-name {if $option.payment > 0}col-sm-8 col-6{else}col-sm-10 col-9{/if}"><span class="payment-span"><span class="payment-name-plus">{$option.call_to_action_text}</span><br><div class="estimated-delivery">{$option.subtitle}</div></span></div>
                      {if $option.payment > 0}<div class="payment-price-plus col-sm-2 col-5 allign_right">{$option.payment}</div>{/if}
                       </div>
                       </span>
                  
            </label>

          
            <form method="GET" class="steco_display_none">
              {if $option.id === $selected_payment_option}
                {l s='Selected' d='ShopThemeTransformer'}
              {else}
                <button type="submit" name="select_payment_option" value="{$option.id}">
                  {l s='Choose' d='ShopThemeTransformer'}
                </button>
              {/if}
            </form>
          </div>
          
       

    
        <div
          id="pay-with-{$option.id}-form"
          class="js-payment-option-form"
          {if $option.id != $selected_payment_option} style="display:none;" {/if}
        >
          {if $option.form}
            {$option.form nofilter}
          {else}
            <form class="payment-form" method="POST" action="{$option.action nofilter}">
              {foreach from=$option.inputs item=input}
                <input type="{$input.type}" name="{$input.name}" value="{$input.value}">
              {/foreach}
              <button style="display:none" id="pay-with-{$option.id}" type="submit"></button>
            </form>
          {/if}
        </div>
      {/foreach}
    {foreachelse}
      <div class="alert alert-danger">{l s='Unfortunately, there are no payment method available.' d='ShopThemeTransformer'}</div>
    {/foreach}
  </div>
<div class="steco_incomplete_message alert alert-danger">{l s='Please select a payment method.' d='ShopThemeTransformer'}</div>
{include  file = 'module:steasycheckout/views/templates/hook/_partials/notifications.tpl'}
  {hook h='displayPaymentByBinaries'}
</div>