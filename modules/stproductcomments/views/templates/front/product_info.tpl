{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 17677 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="mb-lg-4 mb-4 row">

  
        <div class="col-md-8">
		<div class="account_box_bg pb-sm-0 pb-md-4 pb-xs-0">
        <div class="article mb-sm-0 mb-0">
        <div class="flex_container flex_start">
            <div class="mr-4">
              <img src="{$product.cover.bySize.small_default.url}" {if $sttheme.google_rich_snippets} itemprop="image" {/if} width="{$product.cover.bySize.small_default.width}" height="{$product.cover.bySize.small_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" class="" />
            </div>
            <div class="flex_child">
              <div>
                <p {if $sttheme.google_rich_snippets} itemprop="name" {/if} class="font-weight-bold nohidden mb-1"><a href="{$product.url}" title="{$product.name}" {if $sttheme.google_rich_snippets} itemprop="url" {/if}>{$product.name}</a></p>
                
                 {if $product.reference_to_display}
      <div class="product-reference mb-1">
        <label class="label mb-0">{l s='Reference' d='Shop.Theme.Transformer'}: </label>
        <span>{$product.reference_to_display}</span>
      </div>
    {/if}
    
     {block name='product_description_short'}
              <div id="product-description-short-{$product.id}" class="product-description-short mb-1 " {if $sttheme.google_rich_snippets} itemprop="description" {/if}>{$product.description_short nofilter}</div>
            {/block}
                
             
                
                {if $product.attributes}
                <div class="mb-1">
                {foreach $product.attributes as $attribute}
                    {$attribute.group}: {$attribute.name}{if !$attribute@last}, {/if}
                {/foreach}
                </div>
                {/if}



             {*{if $comment_price == 1}
                
                  <div class="mb-1" {if $sttheme.google_rich_snippets} itemprop="offers" itemscope itemtype="https://schema.org/Offer" {/if}>
                    {if $sttheme.google_rich_snippets}<meta itemprop="priceCurrency" content="{$sttheme.currency_iso_code}">{/if}
                    <span {if $sttheme.google_rich_snippets} itemprop="price" {/if} class="price" content="{$product.price_amount}">{if $prices_tag_from == 0}<span class="price_from">{l s='Price:' d='Shop.Theme.Transformer'}</span>{elseif $prices_tag_from == 1}{l s='Price:' d='Shop.Theme.Transformer'}{elseif $prices_tag_from == 2 && !empty($product.id_product_attribute)}{l s='Price from:' d='Shop.Theme.Transformer'}{/if} {$product.price} {if $price_tax  == 0}<span class="name_price big">{$product.labels.tax_long}</span>{/if}</span>
                    {if $two_prices == 0}<p>{$product.price_other} {if $price_tax == 0}<span class="name_price small">{$product.labels.tax_long_other}</span>{/if}</p>{/if}
               
                    {if $product.has_discount}
                      <span class="regular-price">{$product.regular_price}</span>
                      {if !$sttheme.hide_discount}
                      {if $product.discount_type === 'percentage'}
                        <span class="discount discount-percentage">{$product.discount_percentage}</span>
                      {else}
                        <span class="discount discount-amount">-{$product.discount_to_display}</span>
                      {/if}
                      {/if}
                    {/if}
                  </div> 
                {/if}*}
                {*  {assign var='product_weight' value=Configuration::get('STSN_PRODUCT_WEIGHT')}
                  {if $product_weight == 1 &&($product.real_weight > 0 OR $product.weight_unit >0)}<p class="prod_weight">{if $product.id_product_attribute}{l s='Weight of the selected item' d='Shop.Theme.Transformer'}{else}{l s='Product weight' d='Shop.Theme.Transformer'}{/if}: <span>{$product.real_weight}</span> {$product.weight_unit}</p>{/if}*}
      
              </div>
            </div>
        </div>
        </div>
        </div>

    </div>
    
        <div class="col-md-4">
        <div class="review_deatils">
    	<div class="article">
        <div class="mb-2 flex_box flex_left">
            <span class="overall col-12 px-0"><p class="mb-0">{l s='Overall rating' d='Shop.Theme.Transformer'}</p></span>
            <div class="fs_lg general_right_border my-2 mr-3">{$averageTotal}</div>
            <div class="general_left_border my-md-2">
            {include file='module:stproductcomments/views/templates/hook/rating_box.tpl' g_rich_snippets=$pcomments.g_rich_snippets is_aggregate=1 classname="mr-2"}
            
            
            <a href="{url entity='module' name='stproductcomments' controller='list' params=['id_product' => $product.id_product]}" title="{l s='View all reviews' d='Shop.Theme.Transformer'}" class="mr-2 ammount">{$nbComments} {if $nbComments==1}{l s='Review' d='Shop.Theme.Transformer'}{else}{l s='Reviews' d='Shop.Theme.Transformer'}{/if} <i class="fto-commenting-o fs_md mr-1"></i></a>
        	</div>
        </div>

        {include file='module:stproductcomments/views/templates/hook/averages.tpl'}
 		</div>
 		</div>
    </div>
    
    </div>
 