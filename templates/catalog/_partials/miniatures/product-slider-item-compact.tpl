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
<div class="pro_column_box clearfix line_item loved_product_item" {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} {if isset($from_product_page) && $from_product_page} itemprop="{$from_product_page}" {/if} itemscope itemtype="https://schema.org/Product" {/if} data-id_source="{$product['id_product']}" data-type="1">
  <a href="{$product.url}" title="{$product.name}" class="pro_column_left">
    <img src="{if isset($product.cover.bySize.cart_default_2x.url) && $product.cover.bySize.cart_default_2x.url}{$product.cover.bySize.cart_default_2x.url}{elseif isset($urls.no_picture_image)}{$urls.no_picture_image.bySize.cart_default.url}{else}{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-cart_default.jpg{/if}" width="{$product.cover.bySize.cart_default_2x.width}" height="{$product.cover.bySize.cart_default_2x.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="image"{/if} />
  </a>
  <div class="pro_column_right">
    <div style="
    display: flex;
    justify-content: space-between;">
      <h3 {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="name" {/if} class="s_title_block nohidden"><a href="{$product.url}" title="{$product.name}" {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="url"{/if}>{$product.name|truncate:50:'...'}</a></h3>
      <button class="loved_remove_product">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 6.17647H20M10 16.7647V10.4118M14 16.7647V10.4118M16 21H8C6.89543 21 6 20.0519 6 18.8824V7.23529C6 6.65052 6.44772 6.17647 7 6.17647H17C17.5523 6.17647 18 6.65052 18 7.23529V18.8824C18 20.0519 17.1046 21 16 21ZM10 6.17647H14C14.5523 6.17647 15 5.70242 15 5.11765V4.05882C15 3.47405 14.5523 3 14 3H10C9.44772 3 9 3.47405 9 4.05882V5.11765C9 5.70242 9.44772 6.17647 10 6.17647Z" stroke="#181B1A" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </button>
    </div>

    {block name='product_price_and_shipping'}
      {if $product.show_price}
        <div class="product-price-and-shipping" {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="offers" itemscope itemtype="https://schema.org/Offer"{/if}>
          {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)}<meta itemprop="priceCurrency" content="{$currency.iso_code}">{/if}
          {hook h='displayProductPriceBlock' product=$product type="before_price"}

          <span {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="price" content="{$product.price_amount}" {/if} class="price {if $product.has_discount}new_price_color{/if}" >{$product.price nofilter}</span>
            {if $product.has_discount}
            {hook h='displayProductPriceBlock' product=$product type="old_price"}

            <p class="regular-price">{$product.regular_price nofilter}</p>
            
          {/if}

          {hook h='displayProductPriceBlock' product=$product type='unit_price'}

          {hook h='displayProductPriceBlock' product=$product type='weight'}
        </div>
      {/if}
    {/block}
  </div>
</div>
