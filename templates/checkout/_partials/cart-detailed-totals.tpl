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
 {block name='cart_detailed_totals'}
<div class="cart-detailed-totals">
{assign var='cart_value' value=Configuration::get('ST_CART_VALUE')}
  <div class="card-block">
    {foreach from=$cart.subtotals item="subtotal"}
      {if $subtotal.value && $subtotal.type !== 'tax'}
        <div class="cart-summary-line clearfix" id="cart-subtotal-{$subtotal.type}">
          <span class="label{if 'products' === $subtotal.type} js-subtotal{/if}">
            {if 'products' == $subtotal.type}
              {$cart.summary_string}{if $price_tax_cart == 0}<span class="name_price">{$cart.labels.tax_short}</span>{/if}:
            {else}
              {if $subtotal.type != 'shipping' || $cart_value == 0}{$subtotal.label}:{/if}
            {/if}
          </span>
          <div class="value price">
            {if $subtotal.type != 'shipping' || $cart_value == 0}{$subtotal.value}{/if}
            {if $subtotal.type === 'shipping'}
              <div class="shipping_sub_total_details">{hook h='displayCheckoutSubtotalDetails' subtotal=$subtotal}</div>
            {/if}
          </div>          
        </div>
      {/if}
    {/foreach}
    {if $cart.shopping_free == 0}{$cart.free_delivery_list nofilter}{/if}
  </div>

  {block name='cart_voucher'}
    {include file='checkout/_partials/cart-voucher.tpl'}
  {/block}

  <hr>
  
  

  <div class="card-block">
  
  {assign var='taxin_cart' value=Configuration::get('ST_TAXIN_CART')}
                  {if $taxin_cart == 0}
    {block name='cart_summary_tax'}
    <div class="cart-summary-line clearfix cart-total">
      <span class="label sub">{$cart.subtotals.tax.label}:</span>
      <span class="value sub price">{$cart.subtotals.tax.value}</span>
    </div>
  {/block}
  {/if}
  
    <div class="cart-summary-line clearfix cart-total">
      <span class="label">{$cart.totals.total.label}{if $price_tax_cart == 0}<span class="name_price">{$cart.labels.tax_short}</span>{/if}:</span>
      <span class="value price fs_lg font-weight-bold">{if $cart_value == 1}{$cart.total_without_shipping}{else}{$cart.totals.total.value}{/if}</span>
    </div>

      </div>

  <hr>
</div>
{/block}