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
  <h6 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i class="fto-angle-double-left side_close_left"></i></a>{l s='Merchandise returns' d='Shop.Theme.Customeraccount'}</h6>
{/block}
  {if $ordersReturn && count($ordersReturn)}

    <p>{l s='Here is a list of pending merchandise returns' d='Shop.Theme.Customeraccount'}.</p>

    <table class="table  table-bordered hidden-sm-down">
      <thead>
        <tr>
          <th>{l s='Order' d='Shop.Theme.Customeraccount'}</th>
          <th>{l s='Return' d='Shop.Theme.Customeraccount'}</th>
          <th>{l s='Package status' d='Shop.Theme.Customeraccount'}</th>
          <th>{l s='Date issued' d='Shop.Theme.Customeraccount'}</th>
          <th>{l s='Returns form' d='Shop.Theme.Customeraccount'}</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$ordersReturn item=return}
          <tr>
            <td><a href="{$return.details_url}">{$return.reference}</a></td>
            <td><a href="{$return.return_url}">{$return.return_number}</a></td>
            <td>{$return.state_name}</td>
            <td>{$return.return_date}</td>
            <td class="text-center">
              {if $return.print_url}
                <a href="{$return.print_url}">{l s='Print out' d='Shop.Theme.Actions'}</a>
              {else}
                -
              {/if}
            </td>
          </tr>
        {/foreach}
      </tbody>
    </table>
    <div class="order-returns hidden-md-up base_list_line medium_list">
      {foreach from=$ordersReturn item=return}
          <ul class="order-return line_item mb-0">
            <li>
              <strong>{l s='Order' d='Shop.Theme.Customeraccount'}</strong>
              <a href="{$return.details_url}">{$return.reference}</a>
            </li>
            <li>
              <strong>{l s='Return' d='Shop.Theme.Customeraccount'}</strong>
              <a href="{$return.return_url}">{$return.return_number}</a>
            </li>
            <li>
              <strong>{l s='Package status' d='Shop.Theme.Customeraccount'}</strong>
              {$return.state_name}
            </li>
            <li>
              <strong>{l s='Date issued' d='Shop.Theme.Customeraccount'}</strong>
              {$return.return_date}
            </li>
            {if $return.print_url}
              <li>
                <strong>{l s='Returns form' d='Shop.Theme.Customeraccount'}</strong>
                <a href="{$return.print_url}">{l s='Print out' d='Shop.Theme.Actions'}</a>
              </li>
            {/if}
          </ul>
      {/foreach}
    </div>

  {/if}

{/block}
