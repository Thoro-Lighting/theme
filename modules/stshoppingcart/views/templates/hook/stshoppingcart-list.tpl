      <div class="shoppingcart-list">
      {if $cart.products_count}
           <div class="cart_top_info">
     
    
    {foreach from=$cart.products item=product name=data}
    {if $smarty.foreach.data.last  && $smarty.foreach.data.iteration > 2}<p>{$cart.totals_popup.total.label nofilter}: <span>{$cart.totals_popup.total.value nofilter}</span> <a href="{$cart_url}" rel="nofollow"  title="{l s='Pay' d='Shop.Theme.Transformer'}"><span class="btn-line-under">{l s='Pay' d='Shop.Theme.Transformer'}</span> <i class="fto-angle-right"></i></a>
     </p>{/if}
    {/foreach}
    
      </div>
      <div class="small_cart_product_list_container px-3 pt-5 pb-3">
      
      
          <ul class="small_cart_product_list base_list_line medium_list">
            {foreach from=$cart.products item=product}
              <li class="line_item">{include file='module:stshoppingcart/views/templates/hook/stshoppingcart-product-line.tpl' product=$product}</li>
            {/foreach}
            {if $cart.vouchers.added}
                {foreach from=$cart.vouchers.added item=voucher}
                  <li class="line_item voucher">
                    <div class="flex_container flex_start">
                     <span class="mar_r4">{l s='Voucher' d='Shop.Theme.Transformer'}:</span>
                      <span class="mar_r4">{$voucher.name}</span>
                      <span class="mar_r4">{$voucher.reduction_formatted}</span>
                      <a href="{$voucher.delete_url}" data-link-action="remove-voucher" class="flex_child" title="{l s='Remove' d='Shop.Theme.Actions'}"><i class="icone_svg"></i></a>
                    </div>
                  </li>
                {/foreach}
            {/if}
          </ul>
{hook h="displayClearCartBtn"}
          </div>
         <div class="sidebar_button sidecart cart">
          <div class="small_cart_sumary base_list_line">

            {foreach from=$cart.subtotals_popup item="subtotal"}
              {if $subtotal.value}
               <div class="line_item flex_container flex_space_between type-{$subtotal.type} amount-{$subtotal.amount|intval}">
                  <span class="cart-summary-k">
                   {$subtotal.label nofilter}: 
                  </span>
                  <div class="cart-summary-v price">
                    {$subtotal.value nofilter}
                  </div>
                </div>
              {/if}
            {/foreach}
          
            <div class="line_item last_one flex_container flex_space_between">
              <span class="cart-summary-k">
                  {$cart.totals_popup.total.label nofilter}:
              </span>
              <span class="cart-summary-v price font-weight-bold">
                {$cart.totals_popup.total.value nofilter}
              </span>
            </div>
             
          </div>
           {if $cart.shopping_free == 3}
          
{if $cart.free_delivery && $cart.carrier_shipping_free_price_value != 0}
<div class="free-delivery_info-small">
 <div class="line_item flex_container flex_space_between free-deliver-grahpic">
                  <span class="cart-summary-k">
                  {l s='For free delivery' d='Shop.Theme.Transformer'}:
                  </span>
                  <div class="cart-summary-v price">
                   {$cart.free_delivery nofilter}
                  </div>
                </div>

<div class="free-info-small"><div class="" style="width:{100-(($cart.free_delivery_value/$cart.carrier_shipping_free_price_value)*100)}%"></div></div>
</div>
{/if}
{/if}
          
          {assign var='checkout_button' value=Configuration::get('ST_BLOCK_CART_CHECKOUT')}
          {assign var='arrow_buttons' value=Configuration::get('STSN_ARROW_BUTTONS')}
          {assign var='button_checkout' value=Configuration::get('ST_BUTTON_CHECKOUT')}
                   
          {if $checkout_button==0 || $checkout_button==2}<a href="{$cart_url}" rel="nofollow" class=" btn btn-main btn_full_width benabled" title="{l s='Pay' d='Shop.Theme.Transformer'}">{l s='Pay' d='Shop.Theme.Transformer'} {*<i class="fto-angle-right"></i>*}</a>{/if}
          {if $checkout_button==1 || $checkout_button==2}<a href="{$order_url}" rel="nofollow" class=" btn btn-main btn_full_width {if $checkout_button==2} benabled {/if} btn_to_checkout {if $button_checkout == 1}checkout_border{/if}" title="{l s='Checkout' d='Shop.Theme.Actions'}"><span class="{if $button_checkout == 1}btn-line-under{/if}">{l s='Checkout' d='Shop.Theme.Actions'}</span> {*<i class="fto-angle-right"></i>*}</a>{/if}
      
      
      
      </div>
      
      {else}
      
      {assign var='empty_cart' value=Configuration::get('ST_EMPTY_CART')}
    
      
        <div class="cart_empty {if $empty_cart == 0}px-3 pt-5 pb-3{/if}">{if $empty_cart == 0}{l s='Your shopping cart is empty.' d='Shop.Theme.Transformer'}{elseif $empty_cart == 4}
        
        <div class="cart_empty_sidebar">{hook h='displayCartEmpty'}</div>
        {else}
        <div class="cart_empty_sidebar">{hook h='displayCartEmpty'}</div>
        <div class="cart_empty_link">
        {assign var='button_style' value=Configuration::get('ST_BUTTON_STYLE')}
        <h6>{l s='You do not know where to start?' d='Shop.Theme.Transformer'}</h6>
       {if $empty_cart == 1}<a href="{$urls.pages.new_products}" title="{l s='See new products' d='Shop.Theme.Transformer'}" class="btn-secondary">{l s='See new products' d='Shop.Theme.Transformer'}</a>{/if}
       {if $empty_cart == 2}<a href="{$urls.pages.prices_drop}" title="{l s='See promotions' d='Shop.Theme.Transformer'}" class="btn-secondary">{l s='See promotions' d='Shop.Theme.Transformer'}</a>{/if}
         
        {if $empty_cart == 3}
        {assign var='cart_category' value=Configuration::get('ST_CART_CATEGORY')}
        <a href="{$link->getCategoryLink($cart_category)|escape:'html'}" title="{l s='See recommended products' d='Shop.Theme.Transformer'}" class="btn-secondary">{l s='See recommended products' d='Shop.Theme.Transformer'}</a>{/if}
       
       
        
        </div>
        
        
        {/if}
        </div>
      {/if}
      </div>