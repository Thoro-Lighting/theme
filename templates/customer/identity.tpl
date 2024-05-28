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
{extends 'customer/page.tpl'}


{block name='page_content'}
{block name='page_title'}
  <h6 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i class="fto-angle-double-left side_close_left"></i></a>{l s='Your personal information' d='Shop.Theme.Customeraccount'}</h6>
{/block}
<div class="account_box_bg pad_rwd">
<div class="head_account_bg">
  <div class="hello_info">{l s='Welcome' d='Shop.Theme.Transformer'} {$customer.firstname} {$customer.lastname}</div>
  <p class="steco_sub_heading_mini">{l s='Manage your data in the store.' d='Shop.Theme.Transformer'}</p>
  </div>

<div class="col-md-9 col-xl-6">
      <div class="article">
  {render file='customer/_partials/customer-form.tpl' ui=$customer_form}
   </div>
    </div>
  
  </div>
{/block}