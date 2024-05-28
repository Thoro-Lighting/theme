{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
* @copyright 2007-2015 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}

{extends file='customer/page.tpl'}

{block name='page_content'}
  <h3 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i class="fto-angle-double-left side_close_left"></i></a>{l s='My alerts' d='Shop.Theme.Transformer'}</h3>
  {if $mailAlerts}
    <ul class="products product_list row grid mb-5">
      {foreach from=$mailAlerts item=mailAlert}
        <li class="mailalerst_product_item product_list_item ajax_block_product p-b-1 col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-4 col-6">
        {include 'module:ps_emailalerts/views/templates/front/mailalerts-account-line.tpl' mailAlert=$mailAlert}</li>
      {/foreach}
      </ul>
  {else}
    <p class="warning">{l s='No mail alerts yet' d='Shop.Theme.Transformer'}.</p>
  {/if}
{/block}
