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
   <h6 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i class="fto-angle-double-left side_close_left"></i></a>{l s='Order details' d='Shop.Theme.Customeraccount'}</h6>
{/block}
  {block name='order_infos'}
    <div id="order-infos">
      <div class="box">
          <div class="row">
            <div class="col-{if $order.details.reorder_url}6{else}12{/if} fs_lg heading_color">
                {l
                  s='Order Reference %reference% - placed on %date%'
                  d='Shop.Theme.Customeraccount'
                  sprintf=['%reference%' => $order.details.reference, '%date%' => $order.details.order_date]
                }
            </div>
            {if $order.details.reorder_url}
              <div class="col-lg-6 col-md-6 text-right">
                <a href="{$order.details.reorder_url}" class="go btn-line-under" title="{l s='Reorder' d='Shop.Theme.Actions'}">{l s='Reorder' d='Shop.Theme.Actions'}</a>
              </div>
            {/if}
            <div class="clearfix"></div>
          </div>
      </div>

      <div class="box">
          <ul>
            <li><span class="heading_color">{l s='Carrier' d='Shop.Theme.Checkout'}:</span> {$order.carrier.name}</li>
            <li><span class="heading_color">{l s='Payment method' d='Shop.Theme.Checkout'}:</span> {$order.details.payment}</li>

            {if $order.details.invoice_url}
              <li>
                <a href="{$order.details.invoice_url}" class="go" title="{l s='Download your invoice as a PDF file.' d='Shop.Theme.Customeraccount'}">
                  {l s='Download your invoice as a PDF file.' d='Shop.Theme.Customeraccount'}
                </a>
              </li>
            {/if}

            {if $order.details.recyclable}
              <li>
                {l s='You have given permission to receive your order in recycled packaging.' d='Shop.Theme.Customeraccount'}
              </li>
            {/if}

            {if $order.details.gift_message}
              <li>{l s='You have requested gift wrapping for this order.' d='Shop.Theme.Customeraccount'}</li>
              <li>{l s='Message' d='Shop.Theme.Customeraccount'} {$order.details.gift_message nofilter}</li>
            {/if}
          </ul>
      </div>
    </div>
  {/block}

<div class="account_box_bg">
  {block name='order_history'}
    <section id="order-history" class="box">
      <h6 class="hello_info">{l s='Follow your order\'s status step-by-step' d='Shop.Theme.Customeraccount'}</h6>
      <table class="table  table-bordered table-labeled hidden-xs-down">
        <thead>
          <tr>
            <th>{l s='Date' d='Shop.Theme.Global'}</th>
            <th>{l s='Status' d='Shop.Theme.Global'}</th>
          </tr>
        </thead>
        <tbody>
          {foreach from=$order.history item=state}
            <tr>
              <td>{$state.history_date}</td>
              <td>
                <span class="badge badge-default {$state.contrast}" style="background-color:{$state.color}">
                  {$state.ostate_name}
                </span>
              </td>
            </tr>
          {/foreach}
        </tbody>
      </table>
      <div class="hidden-sm-up base_list_line medium_list">
        {foreach from=$order.history item=state}
          <div class="pb-3">
            <div class="date pb-2">{$state.history_date}</div>
            <div class="state">
              <span class="badge badge-default {$state.contrast}" style="background-color:{$state.color}">
                {$state.ostate_name}
              </span>
            </div>
          </div>
        {/foreach}
      </div>
    </section>
  {/block}

  {if $order.follow_up}
    <div class="box">
      <p>{l s='Click the following link to track the delivery of your order' d='Shop.Theme.Customeraccount'}</p>
      <a href="{$order.follow_up}">{$order.follow_up}</a>
    </div>
  {/if}

  {block name='addresses'}
    <div class="addresses row">
      {if $order.addresses.delivery}
        <div class="col-lg-6 col-md-6">
          <article id="delivery-address" class="pad_10 general_border mb-4">
            <div class="heading_color">{l s='Delivery address %alias%' d='Shop.Theme.Checkout' sprintf=['%alias%' => $order.addresses.delivery.alias]}</div>
            <address>{$order.addresses.delivery.formatted nofilter}</address>
          </article>
        </div>
      {/if}

      <div class="col-lg-6 col-md-6">
        <article id="invoice-address" class="pad_10 general_border mb-4">
          <div class="heading_color">{l s='Invoice address %alias%' d='Shop.Theme.Checkout' sprintf=['%alias%' => $order.addresses.invoice.alias]}</div>
          <address>{$order.addresses.invoice.formatted nofilter}</address>
        </article>
      </div>
    </div>
  {/block}

  {$HOOK_DISPLAYORDERDETAIL nofilter}

  {block name='order_detail'}
    {if $order.details.is_returnable}
      {include file='customer/_partials/order-detail-return.tpl'}
    {else}
      {include file='customer/_partials/order-detail-no-return.tpl'}
    {/if}
  {/block}

  {block name='order_carriers'}
    {if $order.shipping}
      <div class="box">
        <table class="table  table-bordered hidden-sm-down">
          <thead>
            <tr>
              <th>{l s='Date' d='Shop.Theme.Global'}</th>
              <th>{l s='Carrier' d='Shop.Theme.Checkout'}</th>
              <th>{l s='Weight' d='Shop.Theme.Checkout'}</th>
              <th>{l s='Shipping cost' d='Shop.Theme.Checkout'}</th>
              <th>{l s='Tracking number' d='Shop.Theme.Checkout'}</th>
            </tr>
          </thead>
          <tbody>
            {foreach from=$order.shipping item=line}
              <tr>
                <td>{$line.shipping_date}</td>
                <td>{$line.carrier_name}</td>
                <td>{$line.shipping_weight}</td>
                <td>{$line.shipping_cost nofilter}</td>
                <td>{$line.tracking nofilter}</td>
              </tr>
            {/foreach}
          </tbody>
        </table>
        <div class="hidden-md-up shipping-lines base_list_line medium_list">
          {foreach from=$order.shipping item=line}
              <ul class="shipping-line line_item mb-0">
                <li>
                  <strong>{l s='Date' d='Shop.Theme.Global'}</strong> <span style="float:right">{$line.shipping_date}</span>
                </li>
                <li>
                  <strong>{l s='Carrier' d='Shop.Theme.Checkout'}</strong> <span style="float:right">{$line.carrier_name}</span>
                </li>
                <li>
                  <strong>{l s='Weight' d='Shop.Theme.Checkout'}</strong> <span style="float:right">{$line.shipping_weight}</span>
                </li>
                <li>
                  <strong>{l s='Shipping cost' d='Shop.Theme.Checkout'}</strong> <span style="float:right">{$line.shipping_cost nofilter}</span>
                </li>
                <li>
                  <strong>{l s='Tracking number' d='Shop.Theme.Checkout'}</strong> <span style="float:right">{$line.tracking nofilter}</span>
                </li>
              </ul>
          {/foreach}
        </div>
      </div>
    {/if}
  {/block}

  {block name='order_messages'}
    {include file='customer/_partials/order-messages.tpl'}
  {/block}
 </div> 
  
{/block}
