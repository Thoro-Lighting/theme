{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{*shouldEnableAddToCartButton Also in catalog\_partials\miniatures\product-simple.tpl*}
{assign var="has_add_to_cart" value=0}
{if $sttheme.display_add_to_cart!=3 && !$sttheme.is_catalog && $product.add_to_cart_url && ($product.quantity>0 || $product.allow_oosp)}{$has_add_to_cart=1}{/if}{*hao xiang quantity_wanted is not set in homepage and category page, so using add_to_cart_url only is not correct, have to use quantity and allow_oosp*}
<div class="pro_simple_box clearfix">
            <div class="itemlist_left">
                <a class="product_image" href="{$product.url}" title="{$product.name}"><img src="{if isset($product.cover.bySize.small_default.url) && $product.cover.bySize.small_default.url}{$product.cover.bySize.small_default.url}{elseif isset($urls.no_picture_image)}{$urls.no_picture_image.bySize.small_default.url}{else}{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-small_default.jpg{/if}" {if $sttheme.retina && isset($product.cover.bySize.small_default_2x.url)} srcset="{$product.cover.bySize.small_default_2x.url} 2x" {/if} width="{$product.cover.bySize.small_default.width}" height="{$product.cover.bySize.small_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" /></a>
            </div>
            <div class="itemlist_right">
                <h3 class="s_title_block two_rows"><a href="{$product.url}" title="{$product.name}">{$product.name|truncate:40:'...'}</a></h3>
                
                {block name='product_price_and_shipping'}
                  {if $product.show_price}
                    <div class="product-price-and-shipping pad_b6">
                      {hook h='displayProductPriceBlock' product=$product type="before_price"}

                      <span class="price {if $product.has_discount}new_price_color{/if}">{$product.price nofilter} {if $price_tax  == 0}<span class="name_price big">{$product.labels.tax_long}</span>{/if}</span>
                       {if $two_prices == 0}<p>{$product.price_other nofilter} {if $price_tax  == 0}<span class="name_price small">{$product.labels.tax_long_other}</span>{/if}</p>{/if}
                      
                      {hook h='displayProductPriceBlock' product=$product type="price"}
                      {hook h='displayProductPriceBlock' product=$product type="after_price"}
                      {if $product.has_discount}
                        {hook h='displayProductPriceBlock' product=$product type="old_price"}

                        <span class="regular-price">{$product.regular_price nofilter}</span>
                        {if !$sttheme.hide_discount}
                        {if $product.discount_type === 'percentage'}
                          <span class="discount discount-percentage">{$product.discount_percentage nofilter}</span>
                        {else}
                          <span class="discount discount-amount">-{$product.discount_to_display nofilter}</span>
                        {/if}
                        {/if}
                      {/if}


                      {hook h='displayProductPriceBlock' product=$product type='unit_price'}

                      {hook h='displayProductPriceBlock' product=$product type='weight'}
                    </div>
                  {/if}
                {/block}
        {if $has_add_to_cart && ($sttheme.pro_quantity_input==1 || $sttheme.pro_quantity_input==3)}
        <div class="s_quantity_wanted qty_wrap">
            <input
                class="pro_quantity"
                type="text"
                value="{if $product.minimal_quantity}{$product.minimal_quantity}{else}1{/if}"
                name="pro_quantity"
                data-minimal-quantity="{$product.minimal_quantity}"
              />
        </div>
        {/if}
        {assign var="add_to_cart_class" value="btn btn-default"}
        {if $has_add_to_cart}
          {include file='catalog/_partials/miniatures/btn-add-to-cart.tpl' classname=$add_to_cart_class}
        {else}
          {include file='catalog/_partials/miniatures/btn-view-more.tpl' classname=$add_to_cart_class}
        {/if}
            </div>
 </div>