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
{block name='order_products_table'}
<form id="order-return-form" action="{$urls.pages.order_follow}" method="post">

<div class="box hidden-sm-down">
  <table id="order-products" class="table table-bordered return">
    <thead>
      <tr>
        <th class="head-checkbox"><input type="checkbox"/></th>
        <th colspan="2">{l s='Product' d='Shop.Theme.Catalog'}</th>
        <th class="text-center">{l s='Quantity' d='Shop.Theme.Catalog'}</th>
        <th class="text-center">{l s='Returned' d='Shop.Theme.Customeraccount'}</th>
        <th class="text-center">{l s='Price' d='ShopThemeTransformer'}</th>
        <th class="text-center">{l s='Value' d='ShopThemeTransformer'}</th>
      </tr>
    </thead>
    {foreach from=$order.products item=product name=products}
      <tr>
        <td>
          {if !$product.customizations}
            <span id="_desktop_product_line_{$product.id_order_detail}">
              <input type="checkbox" id="cb_{$product.id_order_detail}" name="ids_order_detail[{$product.id_order_detail}]" value="{$product.id_order_detail}">
            </span>
          {else}
            {foreach $product.customizations  as $customization}
              <span id="_desktop_product_customization_line_{$product.id_order_detail}_{$customization.id_customization}">
                <input type="checkbox" id="cb_{$product.id_order_detail}" name="customization_ids[{$product.id_order_detail}][]" value="{$customization.id_customization}">
              </span>
            {/foreach}
          {/if}
        </td>
        <td style="max-width: 60px">
          <a href="{$link->getProductLink($product)|escape:'html'}" title="{$product.name}"><img src="{$product.cover.bySize.small_default.url}" alt=""></a>
        </td>
        
        <td>
          <a {if isset($product.download_link)}href="{$product.download_link}"{else}href="{$link->getProductLink($product)|escape:'html'}"{/if}>
              {$product.name}
            </a><br/>
          {if $product.reference}
            {l s='Reference' d='Shop.Theme.Catalog'}: {$product.reference}<br/>
          {/if}
          {if $product.customizations}
            {foreach from=$product.customizations item="customization"}
              <div class="customization">
                <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization}" data-backdrop=false>{l s='Product customization' d='Shop.Theme.Catalog'}</a>
              </div>
              <div id="_desktop_product_customization_modal_wrapper_{$customization.id_customization}">
                <div class="modal fade customization-modal" id="product-customizations-modal-{$customization.id_customization}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <button type="button" class="st_modal_close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme'}">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <div class="modal-body base_list_line general_border">
                        <h6 class="fs_md mb-3">{l s='Product customization' d='Shop.Theme.Catalog'}</h6>
                        {foreach from=$customization.fields item="field"}
                          <div class="product-customization-line line_item row">
                            <div class="col-sm-3 col-4 label">
                              {$field.label}
                            </div>
                            <div class="col-sm-9 col-8 value">
                              {if $field.type == 'text'}
                                {if (int)$field.id_module}
                                  {$field.text nofilter}
                                {else}
                                  {$field.text}
                                {/if}
                              {elseif $field.type == 'image'}
                                <img src="{$field.image.small.url}" alt="{$field.label}" />
                              {/if}
                            </div>
                          </div>
                        {/foreach}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            {/foreach}
          {/if}
         {if Module::isEnabled('stproductcomments')}<a href="{url entity='module' name='stproductcomments' controller='mycomments'}" class="btn-line-under reviews_products" rel="nofollow" tittle="{l s='Add reviews' d='Shop.Theme.Transformer'}">{l s='Add reviews' d='Shop.Theme.Transformer'}</a>{/if}
         {if Module::isEnabled('stproductcommentspro')}<a href="{url entity='module' name='stproductcommentspro' controller='mycomments'}" class="btn-line-under reviews_products" rel="nofollow" tittle="{l s='Add reviews' d='Shop.Theme.Transformer'}">{l s='Add reviews' d='Shop.Theme.Transformer'}</a>{/if}
          
          
        </td>
        <td class="qty text-center">
          {if !$product.customizations}
            <div class="current">
              {$product.quantity}
            </div>
            {if $product.quantity > $product.qty_returned}
              <div class="select" id="_desktop_return_qty_{$product.id_order_detail}">
                <select name="order_qte_input[{$product.id_order_detail}]" class="form-control form-control-select">
                  {section name=quantity start=1 loop=$product.quantity+1-$product.qty_returned}
                    <option value="{$smarty.section.quantity.index}">{$smarty.section.quantity.index}</option>
                  {/section}
                </select>
              </div>
            {/if}
          {else}
            {foreach $product.customizations as $customization}
               <div class="current">
                {$customization.quantity}
              </div>
              <div class="select" id="_desktop_return_qty_{$product.id_order_detail}_{$customization.id_customization}">
                <select
                  name="customization_qty_input[{$customization.id_customization}]"
                  class="form-control form-control-select"
                >
                  {section name=quantity start=1 loop=$customization.quantity+1}
                    <option value="{$smarty.section.quantity.index}">{$smarty.section.quantity.index}</option>
                  {/section}
                </select>
              </div>
            {/foreach}
            <div class="clearfix"></div>
          {/if}
        </td>
        <td class="text-center">{$product.qty_returned}</td>
        <td class="text-center price">{$product.price nofilter}</td>
        <td class="text-center price">{$product.total nofilter}</td>
      </tr>
    {/foreach}
    <tfoot>
      {foreach $order.subtotals as $line}
        {if $line.value}
          <tr class="text-right line-{$line.type}">
            <td colspan="6">{$line.label} {if $price_tax_cart == 0 && $line.type != tax && $line.type != discount && $line.type != gift_wrapping}<span class="name_price_left">{$cart.labels.tax_long}</span>{/if}</td>
            <td colspan="2" class="price text-center">{$line.value nofilter}</td>
          </tr>
        {/if}
      {/foreach}
      <tr class="text-right line-{$order.totals.total.type}">
        <td colspan="6"><strong>{$order.totals.total.label}{if $price_tax_cart == 0}<span class="name_price_left">{$cart.labels.tax_long}</span>{/if}</strong></td>
        <td colspan="2" class="price text-center"><strong>{$order.totals.total.value nofilter}</strong></td>
      </tr>
    </tfoot>
  </table>
</div>

<div class="order-items hidden-md-up box base_list_line medium_list {if $order.products}{else}order-detail-hide{/if}">
  {foreach from=$order.products item=product}
    <div class="order-item line_item">
      <div class="row">
        <div class="checkbox">
          {if !$product.customizations}
            <span id="_mobile_product_line_{$product.id_order_detail}"></span>
          {else}
            {foreach $product.customizations  as $customization}
              <span id="_mobile_product_customization_line_{$product.id_order_detail}_{$customization.id_customization}"></span>
            {/foreach}
          {/if}
        </div>
        <div class="content">
          <div class="row">
            <div class="col-sm-5 desc">
              <div class="name"><a href="{$link->getProductLink($product)|escape:'html'}" title="{$product.name}">{$product.name}</a></div>
              {if $product.reference}
                <div class="ref">{l s='Reference' d='Shop.Theme.Catalog'}: {$product.reference}</div>
              {/if}
              {if $product.customizations}
                {foreach $product.customizations as $customization}
                  <div class="customization">
                    <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
                  </div>
                  <div id="_mobile_product_customization_modal_wrapper_{$customization.id_customization}">
                  </div>
                {/foreach}
              {/if}
              {if Module::isEnabled('stproductcomments')}<a href="{url entity='module' name='stproductcomments' controller='mycomments'}" class="btn-line-under reviews_products" rel="nofollow" tittle="{l s='Add reviews' d='Shop.Theme.Transformer'}">{l s='Add reviews' d='Shop.Theme.Transformer'}</a>{/if}
           
            </div>
            <div class="col-sm-7 qty">
              <div class="row">
                <div class="col-4 text-sm-left text-1">
                  {$product.price nofilter}
                </div>
                <div class="col-4">
                  {if $product.customizations}
                    {foreach $product.customizations as $customization}
                      <div class="q">{*{l s='Quantity' d='Shop.Theme.Catalog'}:*}{$customization.quantity} {l s='pcs.' d='Shop.Theme.Transformer'}</div>
                      <div class="s" id="_mobile_return_qty_{$product.id_order_detail}_{$customization.id_customization}"></div>
                    {/foreach}
                  {else}
                    <div class="q">{*{l s='Quantity' d='Shop.Theme.Catalog'}:*}{$product.quantity} {l s='pcs.' d='Shop.Theme.Transformer'}</div>
                    {if $product.quantity > $product.qty_returned}
                      <div class="s" id="_mobile_return_qty_{$product.id_order_detail}"></div>
                    {/if}
                  {/if}
                  {if $product.qty_returned > 0}
                    <div>{l s='Returned' d='Shop.Theme.Customeraccount'}: {$product.qty_returned}</div>
                  {/if}
                </div>
                <div class="col-4 text-right">
                  {$product.total nofilter}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  {/foreach}
</div>
<div class="order-totals hidden-md-up box">
  {foreach $order.subtotals as $line}
    {if $line.value}
      <div class="order-total row">
        <div class="col-8"><strong>{$line.label}{if $price_tax_cart == 0 && $line.type != tax && $line.type != discount && $line.type != gift_wrapping}<span class="name_price_left">{$cart.labels.tax_long}</span>{/if}</strong>:</div>
        <div class="col-4 text-right">{$line.value nofilter}</div>
      </div>
    {/if}
  {/foreach}
  <div class="order-total row">
    <div class="col-8"><strong>{$order.totals.total.label}{if $price_tax_cart == 0}<span class="name_price_left">{$cart.labels.tax_long}</span>{/if}</strong>:</div>
    <div class="col-4 text-right">{$order.totals.total.value}</div>
  </div>
</div>

<div class="box">
  <h6 class="hello_info">{l s='Merchandise return' d='Shop.Theme.Customeraccount'}</h6>
  <p>{l s='If you wish to return one or more products, please mark the corresponding boxes and provide an explanation for the return. When complete, click the button below.' d='Shop.Theme.Customeraccount'}</p>
  <section class="form-fields">
    <div class="form-group">
      <textarea cols="67" rows="3" name="returnText" class="form-control"></textarea>
    </div>
  </section>
  <footer class="form-footer">
    <input type="hidden" name="id_order" value="{$order.details.id}">
    <button class="form-control-submit btn btn-default" type="submit" name="submitReturnMerchandise">
      {l s='Request a return' d='Shop.Theme.Customeraccount'}
    </button>
  </footer>
</div>

</form>
{/block}