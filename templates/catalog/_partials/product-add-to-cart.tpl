<div class="product-add-to-cart  mb-3">
  {if !$configuration.is_catalog}
     {foreach $product.extraContent as $extra}
              {if $extra.moduleName=='stvideo'}
                  {include file="module:stvideo/views/templates/hook/stvideo_link.tpl" stvideos=$extra.content video_position=array(12)}
              {/if}
     {/foreach}    
   <div id="container_sticky_cart_all">
    <div class="pro_cart_block flex_container lex_column_sm">
    <div class="sticky-box">
    <div class="sticky-left">
     <div class="prod_img_sticky sticky_mobile_off"><img class="" src="{$product.cover.bySize.cart_default.url}" /></div>
     <div class="sticky-name"><p class="prod_name_sticky sticky_off sticky_mobile_off">{$product.name}</p>
     {hook h="displayStars" id_product=$product.id_product}
     </div>
    </div>
    {block name='product_quantity'}  
       <div class="product-quantity flex_child {if !$product.add_to_cart_url} hide_main_cart_button {/if}">
          <div class="sticy-price price {if $product.has_discount}promo_price{/if}">{$product.price nofilter} {if $sttheme.tax_label_price  == 1}<span>{$product.labels.tax_long}</span>{/if}</div>
      <div class="qty qty_wrap qty_wrap_big mar_b6">
          <input
            type="text"
            name="qty"
            id="quantity_wanted"
            value="{$product.quantity_wanted}"
            class="input-group"
            min="{$product.minimal_quantity}"
            data-quantity="{$product.quantity}"
            aria-label="{l s='Quantity' d='Shop.Theme.Actions'}"
          >
        </div>
       <div class="add">
          <button class="btn btn-main add-to-cart btn-spin" data-button-action="add-to-cart" type="submit" {if !$product.add_to_cart_url} disabled {/if}>
            <span>{l s='Add to cart' d='Shop.Theme.Actions'}</span>
          </button>
        </div>
        <div class="loved-sticky">{hook h='displayProductCartRight'}</div>
    </div>
      {block name='product_minimal_quantity'}
      {if $product.minimal_quantity > 1}
      <div class="product-minimal-quantity mar_b6">
          {l
          s='The minimum purchase order quantity for the product is %quantity%.'
          d='Shop.Theme.Checkout'
          sprintf=['%quantity%' => $product.minimal_quantity]
          }
      </div>
        {/if}
    {/block}     
      </div>
    {/block}
</div>
</div>
    {block name='product_availability_date'}
      {if $product.availability_date}
        <div class="product-availability-date mar_b6">
          <span>{l s='Availability date:' d='Shop.Theme.Catalog'} </span> {$product.availability_date}
        </div>
      {/if}
    {/block}
    {block name='product_availability'}
        <div id="product-availability" class="{if $product.availability == 'available'} product-available {elseif $product.availability == 'last_remaining_items'} product-last-items {else} product-unavailable {/if} mar_b6 fs_md sticky_off">
        <p class="mb-1 mt-3 availability_message {if $product.quantity > 0}avail_plus{else}avail_minus{/if}">{$product.availability_message}{if isset($product.additional_delivery_times)}<span class="delivery_message">{if $product.additional_delivery_times == 1}{if $product.delivery_information}<span class="delivery-information">, {$product.delivery_information}</span>{/if}{elseif $product.additional_delivery_times == 2}{if $product.quantity > 0}<span class="delivery-information">, {$product.delivery_in_stock}</span>{elseif $product.quantity <= 0 && $product.add_to_cart_url}<span class="delivery-information">, {$product.delivery_out_stock}</span>{/if}</span>{/if}{/if}</p> 
        </div>
    {/block}
 {/if}
</div>

