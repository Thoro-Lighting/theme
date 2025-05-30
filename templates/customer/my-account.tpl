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

  {block name='page_title' hide}
    {l s='Your account' d='Shop.Theme.Customeraccount'}
  {/block}

  <div>
    <h2 class="page_heading">{l s='Hello, %firstname% %lastname%' 
            d='Shop.Theme.Customeraccount'
            sprintf=[
              '%firstname%' => $customer.firstname,
              '%lastname%' => $customer.lastname
            ]
          }!</h6>
    {hook h="displayMyAccountDashboard"}
    <div class="myacount_dashbord_list">
      {include file='customer/_partials/my-account-items.tpl'}
    </div>
  </div>
{/block}


{block name='page_footer'}{/block}