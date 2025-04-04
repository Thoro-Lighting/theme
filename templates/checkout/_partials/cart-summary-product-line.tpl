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
{block name='cart_summary_product_line'}
  <a href="{$product.url}" title="{$product.name}" class="mar_r6">
    <img class="general_border" src="{if isset($product.cover.bySize.small_default.url) && $product.cover.bySize.small_default.url}{$product.cover.bySize.small_default.url}{elseif isset($urls.no_picture_image)}{$urls.no_picture_image.bySize.cart_default.url}{else}{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-small_default.jpg{/if}" alt="{$product.name}" />
  </a>
  <div class="product-quantity mar_r4">{$product.quantity}x</div>
  <div class="product-name flex_child mar_r4">{$product.name}</div>
  <div class="summary-product-price">
  {assign var='price_tax_cart_products' value=Configuration::get('STSN_PRICE_TAX_CART_PRODUCTS')}
    <span class="product-price price">{$product.price} {if $price_tax_cart_products > 0}<span class="name_price">{$product.labels.tax_long}</span>{/if}</span>
    {hook h='displayProductPriceBlock' product=$product type="unit_price"}
  </div>
{/block}
