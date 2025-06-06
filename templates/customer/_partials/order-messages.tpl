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
{block name='order_messages_table'}
{if $order.messages}
<div class="box messages">
  <h6 class="page_heading">{l s='Messages' d='Shop.Theme.Customeraccount'}</h6>
  {foreach from=$order.messages item=message}
    <div class="message">
      <div class="shipping-lines">
      <div class="col-sm-4">
        {$message.name}<br/>
        {$message.message_date}
      </div>
      <div class="col-sm-8">
        {$message.message nofilter}
      </div>
      </div>
    </div>
  {/foreach}
</div>
{/if}
{/block}
{block name='order_message_form'}
<section class="order-message-form card card_trans">
  <div class="card-block">
  <form action="{$urls.pages.order_detail}" method="post">

    <h6 class="page_heading">{l s='Add a message' d='Shop.Theme.Customeraccount'}</h6>
    <p>{l s='If you would like to add a comment about your order, please write it in the field below.' d='Shop.Theme.Customeraccount'}</p>

    <section class="form-fields">

      <div class="form-group">
        <label class="form-control-label">{l s='Product' d='Shop.Forms.Labels'}</label>
        <div class="">
          <select name="id_product" class="form-control form-control-select">
            <option value="0">{l s='-- please choose --' d='Shop.Forms.Labels'}</option>
            {foreach from=$order.products item=product}
              <option value="{$product.id_product}">{$product.name}</option>
            {/foreach}
          </select>
        </div>
      </div>
      <div class="form-group">
          <textarea rows="3" name="msgText" class="form-control"></textarea>
      </div>
    </section>

    <footer class="form-footer">
      <input type="hidden" name="id_order" value="{$order.details.id}">
      <button type="submit" name="submitMessage" class="btn btn-main form-control-submit">
        {l s='Send' d='Shop.Theme.Actions'}
      </button>
    </footer>

  </form>
  </div>
</section>
{/block}