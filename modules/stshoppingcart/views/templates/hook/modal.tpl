<div id="blockcart-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="{l s='Popup shopping cart' d='Shop.Theme.Transformer'}" aria-hidden="true">
   {assign var='simillar_widow' value=Configuration::get('ST_SIMILLAR_WIDOW')}
  <div class="modal-dialog" role="document">
    <div class="modal-content {if $simillar_widow == 0}mini_modal{/if}">
      <a href="javascript:;" class="close st_modal_close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Transformer'}">
        <span aria-hidden="true">&times;</span>
      </a>
      <div class="modal-body modal_cart general_border">
      <div class="row no_brder">
      <div class="top-success">
      <div class="alert alert-success" role="alert">
         {l s='Product successfully added to your shopping cart' d='Shop.Theme.Transformer'}   
      </div>
      {*<p>
          Ilość w koszyku: {$product.quantity} <br>
          Koszyk - na stanie: {$product.quantity_minus_cart} <br>
          Na stanie: {$product.quantity_available} <br>
        </p>

        <div id="product-availability" class="{if $product.availability == 'available'} product-available {elseif $product.availability == 'last_remaining_items'} product-last-items {else} product-unavailable {/if} mar_b6 fs_md sticky_off">
              {if $product.show_availability && $product.availability_message}
              {if in_array($sttheme.show_avail_info, array(1,2,3))}
              <p class="mb-1 mt-3 availability_message {if $product.quantity_minus_cart > 0}avail_plus{else}avail_minus{/if}"> {$product.availability_message}{if in_array($sttheme.show_avail_info, array(1))},
                      <span class="product-quantities" data-stock="{$product.quantity_minus_cart}" data-allow-oosp="{$product.allow_oosp}">{$product.quantity_minus_cart}</span> {l s='pcs.' d='Shop.Theme.Transformer'}
              </p>    
                  {/if}
              {/if}
              {/if}
             
             {if in_array($sttheme.show_avail_info, array(1,3,4))}
              {if isset($product.additional_delivery_times)}
              <p class="delivery_message mb-3">
            {if $product.additional_delivery_times == 1}
              {if $product.delivery_information}
                <span class="delivery-information">{$product.delivery_information}</span>
              {/if}
            {elseif $product.additional_delivery_times == 2}
              {if $product.quantity_minus_cart > 0}
                <span class="delivery-information">{$product.delivery_in_stock}</span>
              {elseif $product.quantity_minus_cart <= 0 && $product.add_to_cart_url}
                <span class="delivery-information">{$product.delivery_out_stock}</span>
              {/if}
              </p>
            {/if}
            {/if}
            {/if}
        </div>*}
      
      </div>
      <div class="col-md-6 left_zone">
            <div class="row">
                <div class="col-md-4">
                    <img class="m-b-1" src="{$product.cover.bySize.modal_default.url}" width="{$product.cover.bySize.modal_default.width}" height="{$product.cover.bySize.modal_default.height}" alt="{$product.cover.legend}" title="{$product.cover.legend}" />
                </div>
                <div class="col-md-8">
                

                    <div class="product_name_wrap"><h1 class="product_name m-b-1">{$product.name}</h1></div>
                    
                    {assign var='manufacturer_cart' value=Configuration::get('STSN_MANUFACTURER_CART')}
                   
                    {if $product.manufacturer_name && $manufacturer_cart == 1}<div class="modal_manufacturer">{$product.manufacturer_name|escape:'htmlall':'UTF-8'}</div>{/if}
                    
                    
                    {assign var='ref_cart_products' value=Configuration::get('STSN_REF_CART_PRODUCTS')}
                    {assign var='product_weight' value=Configuration::get('ST_PRODUCT_WEIGHT')}
                    <ul class="list_detail_item">
                   {if $ref_cart_products == 1 && $product.reference_to_display}<li class="ref_numbers"><span>{l s='Reference' d='Shop.Theme.Transformer'}:</span> {$product.reference_to_display}</li>{/if}
                        {foreach from=$product.attributes item="property_value" key="property"}
                            <li><span>{$property}:</span> {$property_value}</li>
                        {/foreach}
                        {if $product_weight == 0 && $product.weight}
        <li class="modal_weight">{l s='Weight' d='Shop.Theme.Transformer'}:</span> <span>{$product.weight} {$product.weight_unit}</li>
        {/if}
                     </ul>   
                     
       
        
                     
                     <ul class="quantity_detail_item m-y-1">
                        <li class="md_quantity"><span>{l s='Quantity' d='Shop.Theme.Transformer'}:</span> {$product.cart_quantity}</li>
                        {assign var='price_tax_cart_products' value=Configuration::get('STSN_PRICE_TAX_CART_PRODUCTS')}
                        {assign var='price_tax_cart' value=Configuration::get('STSN_PRICE_TAX_CART')}
                        <li class="md_price"><span>{l s='Price:' d='Shop.Theme.Transformer'}</span> <span class="price-modal">{$product.price nofilter} {if $price_tax_cart_products == 1}</span><span class="name_price">{$product.labels.tax_long}</span>{/if}</li>
                    </ul>
                </div>
            </div>

         </div>
        <div class="col-md-6 right_zone">
        <div class="modal_cart_details">
        
       
            {if $cart.products_count > 1}
                <p class="cart-products-count">{l s='There are %products_count% items in your cart.' sprintf=['%products_count%' => $cart.products_count] d='Shop.Theme.Checkout'}</p>
              {else}
                <p class="cart-products-count">{l s='There is %product_count% item in your cart.' sprintf=['%product_count%' =>$cart.products_count] d='Shop.Theme.Checkout'}</p>
              {/if}
              <ul class="list_detail_item">
                {foreach from=$cart.subtotals_popup item="subtotal"}
                  {if $subtotal.value}
                    <li class="md_totals type-{$subtotal.type} amount-{$subtotal.amount|intval}">
                      <span>{$subtotal.label nofilter}:</span> 
                      <span class="right_info">{$subtotal.value nofilter}</span>
                    </li>
                  {/if}
                {/foreach}
                <li class="md_totalp">
                  <span>{$cart.totals_popup.total.label nofilter}:</span>
                  <span class="right_info">{$cart.totals_popup.total.value nofilter}</span>
                </li>
              </ul>
        </div>
        
            {assign var='checkout_button' value=Configuration::get('ST_BLOCK_CART_CHECKOUT')}
            <div class="cart-content-btn">
              <div class="row">
                <div class="col-md-12">
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
</div>{/if}
{if $cart.free_delivery == 0 && $cart.carrier_shipping_free_price_value != 0} 
<p class="free-deliver-grahpic-plus">{l s='Congratulations! free delivery' d='Shop.Theme.Transformer'}</p>
{/if}
{/if}
                
                    {if !isset($checkout_button) || (isset($checkout_button) && $checkout_button==0)}<a href="{$cart_url}" class="btn btn-default btn-full-width btn_arrow" rel="nofollow" title="{l s='Shopping cart' d='Shop.Theme.Transformer'}">{l s='Shopping cart' d='Shop.Theme.Transformer'} {*<i class="fto-angle-right"></i>*}</a>{/if}
                    {if isset($checkout_button) && ($checkout_button==1 || $checkout_button==2)}<a href="{$order_url}" class="btn btn-default btn-full-width btn_to_checkout btn_arrow"rel="nofollow" title="{l s='Proceed to checkout' d='Shop.Theme.Transformer'}">{l s='Proceed to checkout' d='Shop.Theme.Transformer'} {*<i class="fto-angle-right"></i>*}</a>{/if}
                </div>
                <div class="col-md-12">
                    {if isset($checkout_button) && $checkout_button==2}
                    <a href="{$cart_url}" class="btn btn-default btn-full-width btn_arrow" rel="nofollow" title="{l s='Shopping cart' d='Shop.Theme.Transformer'}">{l s='Shopping cart' d='Shop.Theme.Transformer'} {*<i class="fto-angle-right">*}</i></a>
                    {else}
                    <button type="button" class="small_continue btn_arrow bt_left btn btn-default btn-full-width " data-dismiss="modal">{*<i class="fto-angle-left"></i>*}{l s='Continue shopping' d='Shop.Theme.Transformer'}</button>
                    {/if}
                </div>
              </div>
              {if isset($checkout_button) && $checkout_button==2}
              <a href="javascript:;" class="inline_block mb-2 to-continue btn_full_width" data-dismiss="modal"><!-- <i class="fto-left-open mar_r4"></i> --><span class="btn-line-under">{l s='Continue shopping' d='Shop.Theme.Transformer'}</span></a>
              {/if}
            </div>
 </div>
 
 
 </div>
        {if $cart_cross_selling}
            <section class="modal_products_container products_slider" >
              <div class="title_block flex_container title_align_0 title_style_{(int)$heading_style}">
                  <div class="flex_child title_flex_left"></div>
                  <div class="title_block_inner">{l s='Products you may like' d='Shop.Theme.Transformer'}</div>
                  <div class="flex_child title_flex_right"></div>
                  <div class="swiper-button-tr"><div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>
              </div>
              <div class="block_content">
                   <div class="swiper-container" {if $is_rtl} dir="rtl" {/if}>
                        <div class="swiper-wrapper">
                            {foreach $cart_cross_selling as $product}
                                <article class="swiper-slide">
                                    <a href="{$product.url}" title="{$product.name}" class="text-center">
                                        <img src="{$product.cover.bySize.small_default.url}" width="{$product.cover.bySize.small_default.width}" height="{$product.cover.bySize.small_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" class="mar_b4" />
                                        {if $product.show_price}<div class="price">{$product.price nofilter}</div>{/if} 
                                    </a>
                                </article>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </section>
        {/if}
      </div>
    </div>
  </div>
</div>
