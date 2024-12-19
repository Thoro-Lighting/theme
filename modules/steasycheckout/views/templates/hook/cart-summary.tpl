{if $cart.carrier_shipping_free_price_value > 0}
<div class="steco_flex_container  free-delivery_info">
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
{/if}
{$with_other_columns = false}
{if count($steco.columns[$step_number])>1}
{$with_other_columns = true}
{/if}
<div class="steco_layer"></div>
{*<p class="cart-name-top">1. {l s='Your cart' d='ShopThemeTransformer'} <span> - {l s='%product_count%' sprintf=['%product_count%' =>$cart.products_count] d='Shop.Theme.Checkout'} {l s='pcs.' d='Shop.Theme.Transformer'}</span> {hook h='displayCartShare'}<a href="{$link->getModuleLink('steasycheckout','default')|escape:'html'}" class="summary_step_edit"><i class="fto-pencil"></i> <span class="btn-line-under">{l s='edit basket' d='ShopThemeTransformer'}</span></a></p>*}
<section id="js-checkout-summary" class="js-cart steco-checkout-summary steco_column_inner" data-refresh-url="{$steco_urls.cart}?ajax=1&action=refresh">
   <div class="checkout-summary-block">
     {hook h='displayCheckoutSummaryTop'}
    {block name='cart_summary_products'}
      <ul class="small_cart_product_list steco_base_list_line medium_list">
        {foreach from=$cart.products item=product}
          <li class="line_item {if $steco.cart_summary==2}big_cart_on{/if}" data-id-product="{$product.id_product}">
         {include file='module:steasycheckout/views/templates/hook/cart-product-line.tpl' product=$product}
         </li>
        {/foreach}
       
        
         <li class="last-info">{hook h='displayEstimatedDeliveryDate'}{hook h='displayDeliveryTime' cart=$cart}</li>
         
         
        </ul>
    {/block}
        {hook h="displayClearCartBtn"}
  </div>
</div>
</section>
