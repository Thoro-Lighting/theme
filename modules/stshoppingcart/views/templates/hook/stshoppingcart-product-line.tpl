<div class="flex_container flex_start">
<img decoding="async" class="small_cart_product_image" src="{if isset($product.cover.bySize.cart_default.url) && $product.cover.bySize.cart_default.url}{$product.cover.bySize.cart_default.url}{elseif isset($urls.no_picture_image)}{$urls.no_picture_image.bySize.cart_default.url}{/if}" width="{$product.cover.bySize.cart_default.width}" height="{$product.cover.bySize.cart_default.height}" alt="{$product.cover.legend}" title="{$product.cover.legend}" itemprop="image">
   <div class="small_cart_info flex_child">
      <div class="flex_container flex_start mar_b4 name_pr">
        <a href="{$product.url}" rel="nofollow" title="{$product.name}" class="product-name mar_r4 mb-2 flex_child">{$product.name|truncate:200:'...'}</a>
        
        <div class="remove_button">
            <a  class="ajax_remove_button"
                rel="nofollow"
                href="{$product.remove_from_cart_url}"
                data-link-action="remove-from-cart"
                title="{l s="Remove product" d="ShopThemeTransformer"}"
            >
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6.17647H20M10 16.7647V10.4118M14 16.7647V10.4118M16 21H8C6.89543 21 6 20.0519 6 18.8824V7.23529C6 6.65052 6.44772 6.17647 7 6.17647H17C17.5523 6.17647 18 6.65052 18 7.23529V18.8824C18 20.0519 17.1046 21 16 21ZM10 6.17647H14C14.5523 6.17647 15 5.70242 15 5.11765V4.05882C15 3.47405 14.5523 3 14 3H10C9.44772 3 9 3.47405 9 4.05882V5.11765C9 5.70242 9.44772 6.17647 10 6.17647Z" stroke="#181B1A" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </a>
            </div>
        
        </div>
        <div class="flex_start">
        <div class="mini-cart-price-gt flex_container mt-2">
         
        <div class="qty qty_wrap qty_wrap_big">
            <input
                class="cart_quantity cart_quantity_{$product.id_product} {if $product.quantity>=$product.stock_quantity} hits_the_max_limit{/if} {if $product.quantity<=$product.minimal_quantity} hits_the_min_limit{/if}"
                type="text"
                value="{$product.quantity}"
                name="cart_quantity"
              data-down-url="{$product.down_quantity_url}"
              data-up-url="{$product.up_quantity_url}"
              data-update-url="{$product.update_quantity_url}"
              data-product-id="{$product.id_product}"
                data-minimal-quantity="{$product.minimal_quantity}"
                data-quantity="{$product.stock_quantity}"
                data-id-product-attribute="{$product.id_product_attribute}"
                data-id-customization="{$product.id_customization}"
                data-allow-oosp="{if $product.add_to_cart_url && $product.allow_oosp}1{else}0{/if}"
              />
        </div>
        {assign var='price_tax_cart_products' value=Configuration::get('STSN_PRICE_TAX_CART_PRODUCTS')}
            {assign var='cart_promo_price' value=Configuration::get('ST_CART_PROMO_PRICE')}
                   <div class="price">{if isset($product.is_gift) && $product.is_gift}{l s='Gift' d='Shop.Theme.Checkout'}{else}<span class="{if $product.has_discount && $cart_promo_price == 1}new_price_color{/if}">{$product.price nofilter}</span>{/if}{if $price_tax_cart_products == 1}<br><span class="name_price">{$product.labels.tax_long}</span>{/if}{if $product.has_discount && $cart_promo_price == 1}<br><span class="regular-price">{$product.regular_price nofilter}</span>{/if}</div>
        </div>
      </div>
    </div>
</div>



 



            
            
