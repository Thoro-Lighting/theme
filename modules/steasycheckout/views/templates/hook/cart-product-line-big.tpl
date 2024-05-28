{extends file='module:steasycheckout/views/templates/hook/cart-product-line.tpl'}
{assign var='price_tax_cart_products' value=Configuration::get('STSN_PRICE_TAX_CART_PRODUCTS')}
{assign var='promotion_strickers' value=Configuration::get('STECO_PROMOTION_STRICKERS')}
{assign var='promotion_price' value=Configuration::get('STECO_PROMOTION_PRICE')}
{assign var='promotion_save' value=Configuration::get('STECO_PROMOTION_SAVE')}
{block name='small_cart_info'}
    <div class="small_cart_info steco_flex_child {if $price_tax_cart_products < 1}big_padding{/if}">
        <div class="steco_flex_container steco_flex_start">
        <div class="steco_step_number steco_mr_r6 hidden-md-down"></div>
        <div class=" steco_flex_child  flex_container">     
        {if $steco.cart_pro_image == 1}<div class="col-lg-1 col-md-1 prod_img"><a href="{$product.url}" rel="nofollow" title="{$product.name}"><img decoding="async" class="small_cart_product_image steco_mr_r6" src="{$product.cover.bySize.cart_default.url}" width="{$product.cover.bySize.cart_default.width}" height="{$product.cover.bySize.cart_default.height}" alt="{$product.cover.legend}" title="{$product.cover.legend}" itemprop="image"></a></div>{/if}
        
                    <div class="line_left {if $steco.cart_pro_remove && (!isset($product.is_gift) || !$product.is_gift)}col-lg-5 col-md-3{else}col-lg-6 col-md-4{/if}">
                        {if $product.has_discount && $promotion_strickers == 1}<div class="steco_flex_child promo"><span class="cart_promo_stickers">{l s='Promotion' d='Shop.Theme.Transformer'}</span></div>{/if}
                        <a href="{$product.url}" rel="nofollow" title="{$product.name}" class="product-name steco_mr_r4 steco_flex_child">{$product.name}</a>
                       
               {assign var='manufacturer_cart' value=Configuration::get('STSN_MANUFACTURER_CART')}
               {if $product.manufacturer_name && $manufacturer_cart > 0}
               <div class="small_cart_attr_attr cart_manufacturer">{$product.manufacturer_name|escape:'htmlall':'UTF-8'}</div>{/if}
                       
                       {if $steco.cart_pro_name} {if count($product.attributes)}
                        <div class="steco_pro_attr_box">
                        {foreach from=$product.attributes item="property_value" key="property"}
                          <div class="small_cart_attr_attr">
                              <span class="small_cart_attr_k">{$property}:</span> <span>{$property_value}</span>
                          </div>
                        {/foreach}
                        </div>
                        {/if}
                        {/if}
                       
                       {if $ref_cart_products > 0 && $product.reference_to_display}<div class="small_cart_attr_attr"><span class="small_cart_attr_k">{l s='Reference' d='Shop.Theme.Transformer'}: {$product.reference_to_display}</span></div>{/if}
              {if $steco.weight_products == 1 && $product.weight > 0}<div class="small_cart_attr_attr"><span class="small_cart_attr_k">{l s='Weight' d='Shop.Theme.Transformer'}: {$product.weight} {$product.weight_unit}</span></div>{/if}
               
                    </div>
                    
                   
                
                <div class="col-lg-2 col-md-3 cart_align_center line_left price">
                <div class="steco_flex_child"><span class="{if $product.has_discount && $promotion_price == 1}new_price_color{/if}">{$product.price nofilter} {if $price_tax_cart_products > 0}<span class="name_price">{$product.labels.tax_long}</span>{/if}</span> {if $product.has_discount && $promotion_price == 1}<span class="regular-price">{$product.regular_price nofilter}</span>{/if}{if $product.has_discount && $promotion_save == 1}<br>{if $product.discount_type === 'percentage'}<span class="discount-cart">{l s='Save' d='Shop.Theme.Transformer'} {$product.discount_percentage nofilter}</span>
                {else}<span class="discount-cart">{l s='Save' d='Shop.Theme.Transformer'} {$product.discount_to_display nofilter}</span>{/if}{/if}
                </div>
                </div>
                <div class="col-lg-2 col-md-2 cart_align_center line_left quantity">
                    <div class="steco_flex_child">
                    <div class="qty_wrap">
                    {if $steco.cart_pro_quantity && (!isset($product.is_gift) || !$product.is_gift)}
                        <div class="name_cart"><input class="cart_quantity cart_quantity_{$product.id_product} {if $product.quantity>=$product.stock_quantity} hits_the_max_limit{/if} {if $product.quantity<=$product.minimal_quantity} hits_the_min_limit{/if} js-cart-line-product-quantity"
                            type="text"
                            value="{$product.quantity}"
                            name="product-quantity-spin"
                          data-down-url="{$product.down_quantity_url}"
                          data-up-url="{$product.up_quantity_url}"
                          data-update-url="{$product.update_quantity_url}"
                          data-product-id="{$product.id_product}"
                            data-minimal-quantity="{$product.minimal_quantity}"
                            data-quantity="{$product.stock_quantity}"
                            data-id-product-attribute="{$product.id_product_attribute}"
                            data-id-customization="{$product.id_customization}"
                            data-allow-oosp="{if $product.add_to_cart_url && $product.allow_oosp}1{else}0{/if}"
                          /></div>
                          
                           <div class="name_summary">{$product.quantity} {l s='pcs.' d='Shop.Theme.Transformer'}</div>
                          
                    {else}
                        <div class="name_summary quantity_cart">{$product.quantity} {l s='pcs.' d='Shop.Theme.Transformer'}</div>
                    {/if}
                    </div>
                    </div></div>
          {if $steco.cart_pro_remove && (!isset($product.is_gift) || !$product.is_gift)}
            <div class="col-lg-1 col-md-1 cart_align_center line_left remove">
                   <a
                  class                       = "remove-from-cart"
                  rel                         = "nofollow"
                  href                        = "{$product.remove_from_cart_url}"
                  data-link-action            = "delete-from-cart"
                  data-id-product             = "{$product.id_product|escape:'javascript'}"
                  data-id-product-attribute   = "{$product.id_product_attribute|escape:'javascript'}"
                  data-id-customization       = "{$product.id_customization|escape:'javascript'}"
                title="{l s='Remove' mod='steasycheckout'}"
              >
                <i class="fto-trash"></i> {if !$sttheme.is_mobile_device}<span>{l s='Delete' d='Shop.Theme.Transformer'}</span>{/if} 
            </a>
            </div>
            {/if}
            <div class="col-lg-1 col-md-2 cart_align_center line_left big_price">
            <div class="price steco_mr_r4">{if isset($product.is_gift) && $product.is_gift}{l s='Gift' d='Shop.Theme.Transformer'}{else}{$product.total nofilter} {if $price_tax_cart_products > 0}<br><span class="name_price">{$product.labels.tax_long}</span>{/if}{/if}</div>
           </div>
        </div>
    </div>
{/block}