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
<div class="list-group mb-3">

   {* {include file='customer/_partials/my-account-items.tpl'} *}
   {*     <div class="list-group-item">
            <a href="{url entity=index params=['mylogout'=>'']}" class="sign-out-link" title="{l s='Sign out' d='Shop.Theme.Actions'}"><i class="fto-logout-1 mar_r4 fs_lg"></i>{l s='Sign out' d='Shop.Theme.Actions'} - {$customer.firstname}</a>
            </div>*}

   <ul class="account-aside">
      <li>
          <a class="btn-line landing-link{if $urls.current_url == $urls.pages.my_account} page-current{/if}" href="{$urls.pages.my_account}"
            title="{l s='Dashboard' d='Shop.Theme.Transformer'}">
            {l s='Dashboard' d='Shop.Theme.Transformer'}
         </a>
      </li>

      <li>
         <a class="btn-line  identity-link{if $urls.current_url == $urls.pages.identity} page-current{/if}" href="{$urls.pages.identity}"
            title="{l s='My data' d='Shop.Theme.Transformer'}">
            {l s='My data' d='Shop.Theme.Transformer'}
         </a>
      </li>

      {if $customer.addresses|count}
         <li>
            <a class="btn-line  addresses-link{if $urls.current_url == $urls.pages.addresses} page-current{/if}" href="{$urls.pages.addresses}"
               title="{l s='My addresses' d='Shop.Theme.Transformer'}">
               {l s='My addresses' d='Shop.Theme.Transformer'}
            </a>
         </li>
      {else}
         <li>
            <a class="btn-line  address-link{if $urls.current_url == $urls.pages.address} page-current{/if}" href="{$urls.pages.address}"
               title="{l s='Add first address' d='Shop.Theme.Transformer'}">
               {l s='Add first address' d='Shop.Theme.Transformer'}
            </a>
         </li>
      {/if}

      {if !$configuration.is_catalog}
         <li>
            <a class="btn-line  history-link{if $urls.current_url == $urls.pages.history} page-current{/if}" href="{$urls.pages.history}"
               title="{l s='Order history' d='Shop.Theme.Transformer'}">
               {l s='Order history' d='Shop.Theme.Transformer'}
            </a>
         </li>
      {/if}

      {if $configuration.voucher_enabled && !$configuration.is_catalog}
         <li>
            <a class="btn-line  discounts-link{if $urls.current_url == $urls.pages.discount} page-current{/if}" href="{$urls.pages.discount}"
               title="{l s='My vouchers' d='Shop.Theme.Transformer'}">
               {l s='My vouchers' d='Shop.Theme.Transformer'}
            </a>
         </li>
      {/if}

      {if $configuration.return_enabled && !$configuration.is_catalog}
         <div>
            <a class="btn-line  returns-link{if $urls.current_url == $urls.pages.order_follow} page-current{/if}" href="{$urls.pages.order_follow}"
               title="{l s='Merchandise returns' d='Shop.Theme.Transformer'}">
               {l s='Merchandise returns' d='Shop.Theme.Transformer'}
            </a>
         </div>
      {/if}




      {block name='display_customer_account'}
         {hook h='displayCustomeraccount'}
      {/block}

      {if $customer.is_logged}
         <li>
            <a href="{url entity=index params=['mylogout'=>'']}" class="sign-out-link "
               title="{l s='Sign out' d='Shop.Theme.Actions'}">
               <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                     d="M15.2194 20.6504L18.9253 20.6504C19.487 20.6504 20.0256 20.4291 20.4227 20.0353C20.8199 19.6415 21.043 19.1073 21.043 18.5504L21.043 5.95039C21.043 5.39344 20.8199 4.85929 20.4227 4.46547C20.0256 4.07164 19.487 3.85039 18.9253 3.85039L15.2194 3.85039M14.9563 12.2504L2.95625 12.2504M2.95625 12.2504L7.5414 17.0504M2.95625 12.2504L7.5414 7.45039"
                     stroke="#3D4C99" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
               {l s='Sign out' d='Shop.Theme.Actions'}</a>
         </li>
      {/if}
   </ul>

</div>