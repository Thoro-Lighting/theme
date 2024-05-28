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
<div class="box hidden-sm-down">
  <table id="order-products" class="table table-bordered">
    <thead>
      <tr>
        <th colspan="2">{l s='Product' d='Shop.Theme.Catalog'}</th>
        <th class="text-center">{l s='Quantity' d='Shop.Theme.Catalog'}</th>
        <th class="text-center">{l s='Price' d='ShopThemeTransformer'}</th>
        <th class="text-center">{l s='Value' d='ShopThemeTransformer'}</th>
      </tr>
    </thead>
    {foreach from=$order.products item=product}
      <tr>
       <td style="max-width: 60px">
          <a href="{$link->getProductLink($product)|escape:'html'}" title="{$product.name}"><img src="{$product.cover.bySize.small_default.url}" alt=""></a>
        </td>
        <td>
          <strong>
           <a {if isset($product.download_link)}href="{$product.download_link}"{else}href="{$link->getProductLink($product)|escape:'html'}"{/if}>
              {$product.name}
            </a>
          </strong><br/>
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
        <td class="text-center">
          {if $product.customizations}
            {foreach $product.customizations as $customization}
              {$customization.quantity}
            {/foreach}
          {else}
            {$product.quantity}
          {/if}
        </td>
        <td class="text-center price">{$product.price nofilter}</td>
        <td class="text-center price">{$product.total nofilter}</td>
      </tr>
    {/foreach}
    <tfoot>
      {foreach $order.subtotals as $line}
        {if $line.value}
          <tr class="text-right line-{$line.type}">
            <td colspan="4">{$line.label} {if $price_tax_cart == 0 && $line.type != tax && $line.type != discount && $line.type != gift_wrapping}<span class="name_price_left">{$cart.labels.tax_long}</span>{/if}</td>
            <td class="price text-center">{$line.value nofilter}</td>
          </tr>
        {/if}
      {/foreach}
      <tr class="text-right line-{$order.totals.total.type}">
        <td colspan="4"><strong>{$order.totals.total.label nofilter}{if $price_tax_cart == 0}<span class="name_price_left">{$cart.labels.tax_long}</span>{/if}</strong></td>
        <td class="price text-center"><strong>{$order.totals.total.value nofilter}</strong></td>
      </tr>
    </tfoot>
  </table>
</div>

<div class="order-items hidden-md-up box base_list_line medium_list">
  {foreach from=$order.products item=product}
    <div class="order-item line_item">
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
                  {$customization.quantity}
                {/foreach}
              {else}
                {$product.quantity} {l s='pcs.' d='Shop.Theme.Transformer'}
              {/if}
            </div>
            <div class="col-4 text-right">
              {$product.total nofilter}
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
    <div class="col-4 text-right">{$order.totals.total.value nofilter}</div>
  </div>
</div>
{/block}