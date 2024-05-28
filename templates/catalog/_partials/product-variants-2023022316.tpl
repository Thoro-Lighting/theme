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
 
 {assign var='ma_customer_qty' value=Configuration::get('MA_CUSTOMER_QTY')}
{assign var='order_out_stock' value=Configuration::get('PS_ORDER_OUT_OF_STOCK')}
{assign var='last_qties' value=Configuration::get('PS_LAST_QTIES')}
 
 
<div class="product-variants sticky_mobile_off">{*important refresh*}
  {foreach from=$groups key=id_attribute_group item=group}
    {if !empty($group.attributes)}
    <div class="clearfix product-variants-item variants_{$group.group_type}">
      <span class="control-label">{l s='Choose' d='Shop.Theme.Transformer'} <span class="name_att">{$group.name}:</span></span>
      {if $group.group_type == 'select'}
        <select
          class="form-control form-control-select"
          id="group_{$id_attribute_group}"
          data-product-attribute="{$id_attribute_group}"
          name="group[{$id_attribute_group}]">
          {foreach from=$group.attributes key=id_attribute item=group_attribute}
            <option value="{$id_attribute}" title="{$group_attribute.name}"{if $group_attribute.selected} selected="selected"{/if}>{$group_attribute.name}</option>
          {/foreach}
        </select>
      {elseif $group.group_type == 'color'}
        <ul id="group_{$id_attribute_group}" class="clearfix li_fl">
          {foreach from=$group.attributes key=id_attribute item=group_attribute}
            <li class="input-container" title="{$group_attribute.name}">
              <input class="input-color" type="radio" data-product-attribute="{$id_attribute_group}" name="group[{$id_attribute_group}]" aria-label="{$group_attribute.name}" value="{$id_attribute}"{if $group_attribute.selected} checked="checked"{/if}/>
              <span class="color {if $group_attribute.texture}texture{/if}"
                {if $group_attribute.html_color_code} style="background-color: {$group_attribute.html_color_code}" {/if}
                {if $group_attribute.texture} style="background-image: url({$group_attribute.texture})" {/if}
              ><span class="sr-only">{$group_attribute.name}</span></span>
              <span class="st-input-loading"><i class="fto-spin5 animate-spin"></i></span>
            </li>
          {/foreach}
        </ul>
      {elseif $group.group_type == 'radio'}
        <ul id="group_{$id_attribute_group}" class="clearfix li_fl">
          {foreach from=$group.attributes key=id_attribute item=group_attribute}
            <li class="input-container {if (Module::isEnabled('ps_emailalerts') && $ma_customer_qty == 1) && $group.attributes_quantity[$id_attribute] < 1 && (($product.out_of_stock == 0 && $order_out_stock == 0) || ($product.out_of_stock == 2 && $order_out_stock == 0) || ($product.out_of_stock == 0 && $order_out_stock == 1))}size-notify{/if}" title="{$group_attribute.name}">
              <input class="input-radio" type="radio" data-product-attribute="{$id_attribute_group}" name="group[{$id_attribute_group}]" aria-label="{$group_attribute.name}" value="{$id_attribute}"{if $group_attribute.selected} checked="checked"{/if}/>
              <span class="radio-label">{$group_attribute.name} {if (Module::isEnabled('ps_emailalerts') && $ma_customer_qty == 1) && $group.attributes_quantity[$id_attribute] < 1 && (($product.out_of_stock == 0 && $order_out_stock == 0) || ($product.out_of_stock == 2 && $order_out_stock == 0) || ($product.out_of_stock == 0 && $order_out_stock == 1))}<div></div>{/if}</span>
              <span class="st-input-loading"><i class="fto-spin5 animate-spin"></i></span>
            </li>
          {/foreach}
        </ul>
      {/if}
    </div>
    {/if}
  {/foreach}
</div>
