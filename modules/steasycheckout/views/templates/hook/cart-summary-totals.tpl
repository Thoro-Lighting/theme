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
 {if $steco.text_free_delivery == 1}
 {if $cart.shopping_free == 0}{$cart.free_delivery_cartlist nofilter}{/if}
 {/if}
 
<div class="cart-summary-totals">
 {assign var='taxin_cart' value=Configuration::get('ST_TAXIN_CART')}
                  {if $taxin_cart == 0}
{block name='cart_summary_tax'}
    <div class="cart-summary-line clearfix">
      <span class="label sub">{$cart.subtotals.tax.label}:</span>
      <span class="value sub price" data-total="{$cart.subtotals.tax.value}">{$cart.subtotals.tax.value nofilter}</span>
    </div>
  {/block}
  {/if}

  {block name='cart_summary_total'}
    <div class="cart-summary-line clearfix cart-total">
      <span class="label">{$cart.totals.total.label nofilter}{if $price_tax_cart == 0}<span class="name_price_left">{$cart.labels.tax_long}</span>{/if}:</span>
      <span class="value price fs_lg font-weight-bold" data-total="{$cart.totals.total.value}" data-amount="{$cart.totals.total.amount}">{$cart.totals.total.value nofilter}</span>
    </div>
  {/block}
  
</div>
