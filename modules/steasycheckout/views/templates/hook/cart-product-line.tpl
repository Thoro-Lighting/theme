{assign var='price_tax_cart_products' value=Configuration::get('STSN_PRICE_TAX_CART_PRODUCTS')}
{assign var='promotion_price' value=Configuration::get('STECO_PROMOTION_PRICE')}
{assign var='promotion_save' value=Configuration::get('STECO_PROMOTION_SAVE')}
{block name='small_cart_info'}
  <div class="small_cart_info steco_flex_child {if $price_tax_cart_products < 1}big_padding{/if}">
    <div class="steco_flex_container steco_flex_start">
      <div class=" steco_flex_child  flex_container">
        <div class="prod_img"><a href="{$product.url}" rel="nofollow" title="{$product.name}"><img
              decoding="async" class="steco_mr_r6" src="{$product.cover.bySize.modal_default.url}"
              width="{$product.cover.bySize.modal_default.width}" height="{$product.cover.bySize.modal_default.height}"
              alt="{$product.cover.legend}" title="{$product.cover.legend}" itemprop="image"></a></div>
        <div class="right_zone_mobile">
          <div class="steco_flex_child  flex_container">
            <div
              class="{if $steco.cart_pro_remove && (!isset($product.is_gift) || !$product.is_gift)}col-lg-6 col-md-7{else}col-lg-8 col-md-8{/if} line_left prod_name">

              <a href="{$product.url}" rel="nofollow" title="{$product.name}"
                class="product-name steco_mr_r4 steco_flex_child">{$product.name}</a>


              <div class="steco_flex_child mini_price"><span
                  class="{if $product.has_discount && $promotion_price == 1}new_price_color{/if}">{$product.price nofilter}
                  {if $price_tax_cart_products > 0}<span class="name_price">{$product.labels.tax_long}</span>{/if}</span>
                {if $product.has_discount && $promotion_price == 1}<span
                    class="regular-price">{$product.regular_price nofilter}</span>{/if}{if $product.has_discount && $promotion_save == 1}<br>{if $product.discount_type === 'percentage'}<span
                    class="discount-cart">{l s='Save' d='Shop.Theme.Transformer'}
                    {$product.discount_percentage nofilter}</span>
                {else}<span class="discount-cart">{l s='Save' d='Shop.Theme.Transformer'}
                  {$product.discount_to_display nofilter}</span>{/if}
                {/if}
            </div>

          </div>




          <div class="col-lg-2 col-md-2 cart_align_center line_left quantity">
            <div class="steco_flex_child">
              <div class="qty qty_wrap qty_wrap_big">

                <div class="name_cart"><input
                    class="cart_quantity cart_quantity_{$product.id_product} {if $product.quantity>=$product.stock_quantity} hits_the_max_limit{/if} {if $product.quantity<=$product.minimal_quantity} hits_the_min_limit{/if} js-cart-line-product-quantity"
                    type="text" value="{$product.quantity}" name="product-quantity-spin"
                    data-down-url="{$product.down_quantity_url}" data-up-url="{$product.up_quantity_url}"
                    data-update-url="{$product.update_quantity_url}" data-product-id="{$product.id_product}"
                    data-minimal-quantity="{$product.minimal_quantity}" data-quantity="{$product.stock_quantity}"
                    data-id-product-attribute="{$product.id_product_attribute}"
                    data-id-customization="{$product.id_customization}"
                    data-allow-oosp="{if $product.add_to_cart_url && $product.allow_oosp}1{else}0{/if}" /></div>

                <div class="name_summary">{$product.quantity} {l s='pcs.' d='Shop.Theme.Transformer'}</div>

              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-2 cart_align_center line_left big_price">
            <div class="price steco_mr_r4 {if $product.has_discount && $promotion_price == 1}new_price_color{/if}">
              {if isset($product.is_gift) && $product.is_gift}
                {l s='Gift' d='Shop.Theme.Transformer'}
              {else}{$product.total nofilter}
                {if $price_tax_cart_products > 0}<span class="name_price">{$product.labels.tax_long}</span>{/if}{/if}
              </div>
            </div>

            {if (!isset($product.is_gift) || !$product.is_gift)}
              <div class="col-lg-1 col-md-1 cart_align_center line_left remove">
                <a class="remove-from-cart" rel="nofollow" href="{$product.remove_from_cart_url}"
                  data-link-action="delete-from-cart" data-id-product="{$product.id_product|escape:'javascript'}"
                  data-id-product-attribute="{$product.id_product_attribute|escape:'javascript'}"
                  data-id-customization="{$product.id_customization|escape:'javascript'}"
                  title="{l s='Remove' mod='steasycheckout'}">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6.17647H20M10 16.7647V10.4118M14 16.7647V10.4118M16 21H8C6.89543 21 6 20.0519 6 18.8824V7.23529C6 6.65052 6.44772 6.17647 7 6.17647H17C17.5523 6.17647 18 6.65052 18 7.23529V18.8824C18 20.0519 17.1046 21 16 21ZM10 6.17647H14C14.5523 6.17647 15 5.70242 15 5.11765V4.05882C15 3.47405 14.5523 3 14 3H10C9.44772 3 9 3.47405 9 4.05882V5.11765C9 5.70242 9.44772 6.17647 10 6.17647Z" stroke="#181B1A" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </a>
              </div>
            {/if}

          </div>
        </div>
      </div>
    </div>
{/block}