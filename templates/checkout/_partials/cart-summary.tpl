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
<section id="js-checkout-summary" class="js-cart" data-refresh-url="{$urls.pages.cart}?ajax=1&action=refresh">
  <div class="card-block checkout-summary-block">
    {hook h='displayCheckoutSummaryTop'}
    {block name='cart_summary_products'}
      <div class="cart-summary-products">

        <div class="mar_b6">
        <a href="#" class="font-weight-bold" data-toggle="collapse" data-target="#cart-summary-product-list">
            {$cart.summary_string}
            <i class="fto-down-open mar_l4"></i>
        </a>
        </div>

        {block name='cart_summary_product_list'}
          <div class="collapse" id="cart-summary-product-list">
            <ul class="summary-product-list base_list_line dotted_line">
              {foreach from=$cart.products item=product}
                <li class="summary-product-item flex_container line_item">{include file='checkout/_partials/cart-summary-product-line.tpl' product=$product}</li>
              {/foreach}
            </ul>
          </div>
        {/block}
      </div>
    {/block}

    {block name='cart_summary_subtotals'}
      {foreach from=$cart.subtotals item="subtotal"}
        {if $subtotal && $subtotal.type !== 'tax'}
          <div class="cart-summary-line clearfix cart-summary-subtotals" id="cart-subtotal-{$subtotal.type}">
            <span class="label">{$subtotal.label}{if 'products' == $subtotal.type}{if $price_tax_cart == 0}<span class="name_price">({$product.labels.tax_long})</span>{/if}{/if}:</span>
            <span class="value price">{$subtotal.value}</span>
          </div>
        {/if}
      {/foreach}
    {/block}
    
   {if $cart.shopping_free == 0}{$cart.free_delivery_list nofilter}{/if}

  </div>

  {block name='cart_summary_voucher'}
    {include file='checkout/_partials/cart-voucher.tpl'}
  {/block}

  <hr>

  {block name='cart_summary_totals'}
    {include file='checkout/_partials/cart-summary-totals.tpl' cart=$cart}
  {/block}

</section>
