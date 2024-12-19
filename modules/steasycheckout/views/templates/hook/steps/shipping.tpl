<div class="steco_layer"></div>
<div id="{$identifier}"
          class = "steco_column_inner {[
                      'steco-step'        => true,
                      'steco-reachable'      => $step_is_reachable,
                      'steco-complete'       => $step_is_complete,
                      'steco-incomplete'       => !$step_is_complete
                  ]|classnames}">
  <div id="hook-display-before-carrier">
    {$hookDisplayBeforeCarrier nofilter}
  </div>


  <div class="delivery-options-list">
  
    {if $delivery_options|count}
      <form
        id="js-delivery"
        data-url-update="{url entity='module' name='steasycheckout' controller='default' params=['action' => 'selectDeliveryOption']}"
        method="post"
        class="steco_deliverys_form"
      >
      <div class="cart-name-top">2. {l s='Delivery method' d='ShopThemeTransformer'}</div>
        <div class="form-fields">
          {block name='delivery_options'}
            <div class="delivery-options row">
              {foreach $delivery_options as $carrier_id=>$carrier}
                  <div class="{if $steco.carriers_per_xl}col-xl-{(12/$steco.carriers_per_xl)|replace:'.':'-'}{/if} col-lg-{(12/$steco.carriers_per_lg)|replace:'.':'-'} col-md-{(12/$steco.carriers_per_md)|replace:'.':'-'} col-sm-{(12/$steco.carriers_per_sm)|replace:'.':'-'} col-{(12/$steco.carriers_per_xs)|replace:'.':'-'} {if $steco.carriers_per_xl && $carrier@iteration%$steco.carriers_per_xl == 1} first-item-of-desktop-line{/if}{if $carrier@iteration%$steco.carriers_per_lg == 1} first-item-of-line{/if}{if $carrier@iteration%$steco.carriers_per_md == 1} first-item-of-tablet-line{/if}{if $carrier@iteration%$steco.carriers_per_sm == 1} first-item-of-mobile-line{/if}{if $carrier@iteration%$steco.carriers_per_xs == 1} first-item-of-portrait-line{/if}">
                  <div class="delivery-option steco-delivery-option steco_mb_6 {if $delivery_option == $carrier_id} steco_selected{/if} {if $steco.carrier_method_description == 1 OR ($steco.carrier_method_description== 2 && $sttheme.is_mobile_device)}shipping-two-rows{/if}">
                   <label for="delivery_option_{$carrier.id}" class="delivery-option-{$carrier.id} steco_flex_container align-items-start">
                    <span class="steco-custom-input-box steco-tick">
                      <input
                        type="radio"
                        class="steco-custom-input "
                        name="delivery_option[{$id_address}]" id="delivery_option_{$carrier.id}" value="{$carrier_id}"{if $delivery_option == $carrier_id} checked{/if}
                      
                      >
                      <span class="steco-custom-input-item steco-custom-input-radio"><i class="eco-ok checkbox-checked"></i><i class="eco-spin5 steco-animate-spin"></i></span>
                    </span>
                     <span class="align-items-start full-width">
                     <div class="row">
                       
                         <div class="carrier-img col-sm-2 col-3">
                          <img decoding="async" src="{$carrier.logo}" alt="{$carrier.name}" class="img-fluid"/>
                          </div>
                        
                           <div class="carrier-name col-sm-8 col-6">{$carrier.name}<br>{hook h='displayEstimatedDeliveryDate' id_carrier=$carrier.id}{hook h='displayDeliveryTime' carrier=$carrier cart=$cart}</div>
                          
                    
                          
                          <div class="carrier-price col-sm-2 col-4 allign_right carrier-price-logo">{$carrier.price nofilter}</div>
                          </div>
                       </span>
                
                      
                     
                    </label>
                  </div>
                  <div class="row carrier-extra-content"{if $delivery_option != $carrier_id} style="display:none;"{/if}>
                    {$carrier.extraContent nofilter}
                  </div>
                  </div>
              {/foreach}
            </div>
          {/block}
          <div class="order-options row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            {if $recyclablePackAllowed}
              <div class="steco_flex_container steco_flex_start steco-delivery-option gift-option steco_flex_left steco_mb_6">
              <label class="steco_flex_container align-items-start">
              <span class="steco-custom-input-box steco-tick">
                <input  id    = "input_recyclable"
                        name  = "recyclable"
                        type  = "checkbox"
                        value = "1"
                        class = "steco-custom-input steco-shipping-option"
                        {if $recyclable} checked {/if}
                        autocomplete="off" 
                >
                <span class="steco-custom-input-item"><i class="eco-ok checkbox-checked"></i><i class="eco-spin5 steco-animate-spin"></i></span>
              </span>
             <span class="steco_flex_child steco_flex_container align-items-start">
             <div class="row">
              <label for="input_recyclable" class="steco_mb_0 col-lg-11 col-12 label-plus">{l s='I would like to receive my order in recycled packaging.' d='Shop.Theme.Checkout'}</label>
              
              </div></span>
              </label>
              </div>
            {/if}
                        </div>
          </div>
        </div>
         <div id="delivery_message_box" class="message_cart">
  {*<label for="delivery_message">{l s='If you would like to add a comment about your order, please write it in the field below.' d='Shop.Theme.Transformer'}</label><br/>*}
  <textarea rows="2" cols="120" id="delivery_message" name="delivery_message" placeholder="{l s='If you would like to add a comment about your order, please write it in the field below.' d='Shop.Theme.Transformer'}">{$delivery_message}</textarea>
  </div>
  
  
  {if $gift.allowed}
              <div class="steco_flex_container steco_flex_startgift-option steco_flex_left steco_mb_6 mt-4">
              <label class="steco_flex_container align-items-start">
              <span class="steco-custom-input-box steco-tick">
                <input  id    = "input_gift"
                        name  = "gift"
                        type  = "checkbox"
                        value = "1"
                        class = "steco-custom-input steco-gift-checkbox steco-shipping-option"
                        {if $gift.isGift} checked {/if}
                        autocomplete="off" 
                >
                <span class="steco-custom-input-item"><i class="eco-ok checkbox-checked"></i><i class="eco-spin5 steco-animate-spin"></i></span>
              </span>
              <span class="steco_flex_child steco_flex_container align-items-start">
              <label for="input_gift" class="steco_mb_0 label-plus">{l s='I would like my order to be gift wrapped' d='Shop.Theme.Transformer'} - <strong>{l s='additional cost of' d='Shop.Theme.Transformer'}: {$gift.label}</strong>.
                 </label>

              </span>
              </label>
              </div>
              

            {/if}
  
      </form>
    {else}
      <p class="alert alert-danger">{l s='Unfortunately, there are no carriers available for your delivery address.' d='Shop.Theme.Checkout'}</p>
    {/if}
  </div>
  
{*<div class="steco_incomplete_message alert alert-danger">{l s='Please select a carrier.' d='ShopThemeTransformer'}</div>*}

{include  file = 'module:steasycheckout/views/templates/hook/_partials/notifications.tpl'}

 
   
  

  <div id="hook-display-after-carrier">
    {$hookDisplayAfterCarrier nofilter}
  </div>

  <div id="extra_carrier"></div>
</div>