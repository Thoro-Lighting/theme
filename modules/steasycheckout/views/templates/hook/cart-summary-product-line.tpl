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
{block name='cart_summary_product_line'}
  <div class="steco_flex_container steco_flex_start">
  {if $steco.cart_pro_image}
  <a href="{$product.url}" title="{$product.name}" class="steco_mr_r6">
    <img decoding="async" class="img-fluid" src="{$product.cover.small.url}" alt="{$product.name}" />
  </a>
  {/if}
  <div class="product-quantity steco_mr_r4">{$product.quantity}x</div>
  {if $steco.cart_pro_name}
  <div class="product-name flex_child steco_mr_r4">
  	{$product.name}
  	{if count($product.attributes)}
    <div class="steco_cart_attribute_small">
    {foreach from=$product.attributes item="property_value" key="property"}
      <div class="small_cart_attr_attr">
          <span class="small_cart_attr_k">{$property}:</span><span>{$property_value}</span>
      </div>
    {/foreach}
    </div>
    {/if}
  </div>
  {/if}
  <div class="summary-product-price">
    <span class="product-price price">{$product.price nofilter}</span>
    {hook h='displayProductPriceBlock' product=$product type="unit_price"}
  </div>
  </div>
  {if $product.customizations|count}
    <div class="customizations">
        <ul class="steco_base_list_line">
            {foreach from=$product.customizations item="customization"}
                <li class="line_item">
                    <ul>
                        {foreach from=$customization.fields item="field"}
                            <li>
                                <span class="steco_mr_r6 font-weight-bold">{$field.label}</span>
                                {if $field.type == 'text'}
                                    <span>{$field.text nofilter}</span>
                                {elseif $field.type == 'image'}
                                    <img decoding="async" src="{$field.image.small.url}" alt="{$field.label}" class="img-fluid" />
                                {/if}
                            </li>
                        {/foreach}
                    </ul>
                </li>
            {/foreach}
        </ul>
    </div>
{/if}
{/block}
