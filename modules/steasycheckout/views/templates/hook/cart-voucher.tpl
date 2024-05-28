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
{if $cart.vouchers.allowed && $steco.vis_voucher_zone == 1}
  {block name='cart_voucher'}
  <div class="steco-cart-voucher">
     <div class="promo-code {if $steco.presentation_voucher == 0}voucher_slide{/if}" id="promo-code">
        <div class="steco_promo_title steco_mb_10 {if $steco.presentation_voucher == 0}voucher_open{/if}"><span class="on-voucher">{l s='Have a promo code' d='Shop.Theme.Transformer'}</span></div>
        <div {if $steco.presentation_voucher == 0}id="voucher_box"{/if} class="{if $steco.presentation_voucher == 0}collapse{/if}">
        {block name='cart_voucher_form'}
        <form action="{$steco_urls.cart}" data-link-action="add-voucher" method="post">
          <input type="hidden" name="token" value="{$static_token}">
          <input type="hidden" name="addDiscount" value="1">
          <div class="input-group mar_b10">
            <input class="promo-input form-control" type="text" name="discount_name" placeholder="{l s='Promo code' d='Shop.Theme.Transformer'}">
            <span class="input-group-btn">
              <button type="submit" class="btn small_cart_btn btn-default steco_btn voucher"><span>{l s='Add code' d='Shop.Theme.Transformer'}</span></button>
            </span>
          </div>
        </form>
        
        {/block}
        {block name='cart_voucher_notifications'}
        <div class="alert alert-danger js-error steco_display_none" role="alert">
          <span class="js-error-text"></span>
        </div>
        {/block}
        
      {if $cart.discounts|count > 0}
      <div class="block_all_code">
        <p class="block-promo promo-highlighted steco_mb_10">
          {l s='Take advantage of our exclusive offers:' d='Shop.Theme.Transformer'}
        </p>
        <ul class="js-discount promo-discounts">
        {foreach from=$cart.discounts item=discount}
          <li>
            <span class="code" title="{l s='Click to apply' d='Shop.Theme.Transformer'}">{$discount.code}</span> - {$discount.name} <span class="code" title="{l s='Click to apply' d='Shop.Theme.Transformer'}"><i class="fto-plus-circled"></i><span>{$discount.code}</span></span>
          </li>
        {/foreach}
        </ul>
        </div>
      {/if}
      </div>
      </div>
  </div>
  {/block}
{/if}




