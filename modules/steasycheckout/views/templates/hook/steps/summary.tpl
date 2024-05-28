<div class="steco_cart_summay_box steco_mb_6">
{*{if $cart.carrier_shipping_free_price_value > 0}
<div class="free-delivery_info free-right">
<div class="free-info-icon">{l s='Free shipping' d='Shop.Theme.Transformer'}</div>
{if $cart.free_delivery}
<div class="free-info-clock">
<span>0 {$currency.sign}</span>
<div class="free-info"><div class="" style="width:{100-(($cart.free_delivery_value/$cart.carrier_shipping_free_price_value)*100)}%"></div></div>
<span>{$cart.carrier_shipping_free_price}</span>
</div>
{/if}
<div class="free-info-text">{if $cart.free_delivery}{l s='For free shipping by courier' d='Shop.Theme.Transformer'} "{$cart.carrier_name}" {l s='you are missing' d='Shop.Theme.Transformer'} <span>{$cart.free_delivery nofilter}.</span>{else}<span class="delivery-sucess">{l s='Congratulations! you managed to get free courier shipping' d='Shop.Theme.Transformer'} "{$cart.carrier_name}".</span>{/if}</div>
</div>
{/if}*}

    <div class="steco_cart_summay_item steco_cart_summay_{if $steco.cart_summary==2}big{else}small{/if}">
    <p class="summary-head">{l s='Cart summary' d='ShopThemeCheckout'} <a class="edit-summary" title="{l s='edit basket' d='ShopThemeTransformer'}" href="{$link->getModuleLink('steasycheckout','default')|escape:'html'}"></a></p>
     {block name='cart_summary_products'}
     <ul class="small_cart_product_list steco_base_list_line medium_list step-2">
     {foreach from=$cart.products item=product}
     <li class="line_item">
     {include file='module:steasycheckout/views/templates/hook/cart-product-line-mini.tpl' product=$product}
     </li>
     {/foreach}
     </ul>
     {/block}
      
      {block name='cart_summary_subtotals'}
	      {foreach from=$cart.subtotals item="subtotal"}
	        {if $subtotal && $subtotal.type !== 'tax' && $subtotal.type !== 'products_discounts'}
	          <div class="cart-summary-line clearfix cart-summary-subtotals" id="cart-subtotal-{$subtotal.type}">
	            <span class="label">{$subtotal.label}{if $subtotal.type != 'payment'}:{/if}{if $subtotal.type == 'shipping' OR $subtotal.type == 'payment'}<a class="edit-summary" href="{$link->getModuleLink('steasycheckout','default')|escape:'html'}" title="{l s='edit basket' d='ShopThemeTransformer'}"></a>{/if}</span>
	      
	            {if $subtotal.type != 'payment'}<span class="value price">{$subtotal.value nofilter}</span>{/if}
	          </div>
	        {/if}
	      {/foreach}
	    {/block}
	    {if $cart.carrier_shipping_free_price_value > 0 && {$cart.free_delivery}}
	         <div class="cart-summary-line clearfix cart-summary-subtotals free-delivery-text">
	         <span class="label">{l s='It is missing for free shipping' d='ShopThemeTransformer'}:</span>
	         <span class="value price">{$cart.free_delivery}</span>
	         </div>
	    {/if}
	    {if $cart.vouchers.added}<div class="voucher-box">
            {foreach from=$cart.vouchers.added item=voucher}
              <div class="line_item voucher">
                <div class="steco_flex_container steco_flex_start">
                  <span class="steco_mr_r4">{l s='Discount voucher applied' d='Shop.Theme.Transformer'}: <span class="voucher-name_add">{$voucher.name}</span></span>
                  <span class="steco_mr_r4">{$voucher.reduction_formatted nofilter}</span>
                  <a href="{$voucher.delete_url}" data-link-action="remove-voucher" class="flex_child" title="{l s='Remove' d='Shop.Theme.Transformer'}"><i class="fto-trash mar_l4"></i></a>
                </div>
              </div>
            {/foreach}
            </div>
        {/if}
        
        
        
	     {block name='cart_summary_totals'}
	      {include file='module:steasycheckout/views/templates/hook/cart-summary-totals.tpl' cart=$cart}
	    {/block}
	       {block name='cart_summary_voucher'}
          {include file='module:steasycheckout/views/templates/hook/cart-voucher.tpl'}
        {/block}
        
        
</div>
</div>
<button class="btn_arrow small_cart_btn btn btn-default btn_full_width bt_first_step summary_bt" type="button">{l s='Check out' d='ShopThemeTransformer'}</button>
<div id="payment-confirmation" class="steco_text_center">
  <button type="submit" class="btn btn-default steco_btn steco_btn_more_padding {if $arrow_buttons}btn_arrow{/if} bt_last_step summary_bt">
        {l s='I order and pay' d='Shop.Theme.Transformer'}  {If $steco.show_payment_name}{if $selected_payment_confirming}{$selected_payment_confirming}{else}{$selected_payment_name}{/if}{/if}
  </button>
</div>
<div class="modal" id="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="st_modal_close" data-dismiss="modal" aria-label="{l s='Close' d='ShopThemeTransformer'}">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="js-modal-content general_border p-4"></div>
      </div>
    </div>
</div>
{hook h='displayEstimatedDeliveryDate'}
{if $page.page_name == 'module-steasycheckout-default'}<div class="modal-backdrop fade show"></div>{/if}

