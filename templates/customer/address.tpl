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
    {if $editing}
      <h6 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i
            class="fto-angle-double-left side_close_left"></i></a>{l s='Update your address' d='Shop.Theme.Customeraccount'}
      </h6>
    {else}
      <h6 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i
            class="fto-angle-double-left side_close_left"></i></a>{l s='New address' d='Shop.Theme.Customeraccount'}</h6>
    {/if}
  {/block}


  <div class="head_account_bg">

    <p>
      {if $editing}
        {l s='You are editing the address.' d='Shop.Theme.Transformer'}
      {else}
        {l s='Add a new address to your address book.' d='Shop.Theme.Transformer'}
      {/if}
    </p>
  </div>
  <div class="row">
    <div class="col-md-9">
      {render template="customer/_partials/address-form.tpl" ui=$address_form}
    </div>
  </div>

{/block}