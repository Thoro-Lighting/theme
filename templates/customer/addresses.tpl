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
{extends file='customer/page.tpl'}


{block name='page_content'}
  {block name='page_title'}
    <h6 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i
          class="fto-angle-double-left side_close_left"></i></a>{l s='Your addresses' d='Shop.Theme.Customeraccount'}</h6>
  {/block}

  <div class="row com_grid_view account_box_bg pad_rwd">
    <div class="head_account_bg">
      <p class="steco_sub_heading_mini">
        {l s='Create and edit your shipping and billing addresses.' d='Shop.Theme.Transformer'}</p>
    </div>
    {foreach $customer.addresses as $address}
      <div
        class="col-md-6 {if $address@index%2==0} first-item-of-large-line  first-item-of-desktop-line first-item-of-line {/if}">
        {block name='customer_address'}
          {include file='customer/_partials/block-address.tpl' address=$address}
        {/block}
      </div>
    {/foreach}
    <a href="{$urls.pages.address}" data-link-action="add-address"
      class="btn-block btn-secondary js-submit-active steco_address_btn">
      {*<i class="fto-plus-2 fs_md mar_r4"></i>*}{l s='Create new address' d='Shop.Theme.Actions'}
    </a>

  </div>

  {* <div class="addresses-footer mb-3">
    <a href="{$urls.pages.address}" data-link-action="add-address" class="">
      <i class="fto-plus-2 fs_md mar_r4"></i>{l s='Create new address' d='Shop.Theme.Actions'}
    </a>
  </div>*}

{/block}