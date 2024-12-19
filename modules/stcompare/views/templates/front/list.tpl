{*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{assign var="has_add_to_cart" value=0}
{if $sttheme.display_add_to_cart!=3 && !$sttheme.is_catalog && $product.add_to_cart_url && ($product.quantity>0 || $product.allow_oosp)}{$has_add_to_cart=1}{/if}{*hao xiang quantity_wanted is not set in homepage and category page, so using add_to_cart_url only is not correct, have to use quantity and allow_oosp*}


{if isset($for_w) && $for_w == 'category'}
  {if $sttheme.cate_pro_image_type_name}
    {assign var="pro_image_type" value=$sttheme.cate_pro_image_type_name}
  {/if}
{elseif isset($image_type) && $image_type}
  {assign var="pro_image_type" value=$image_type}
{/if}
{if !isset($pro_image_type) || !$pro_image_type}
  {assign var="pro_image_type" value='home_default'}
{/if}
{if $sttheme.retina}{$pro_image_type_retina=$pro_image_type|cat:"_2x"}{/if}


{extends file='page.tpl'}

{block name="page_content"}
    <h1 class="page_heading">{l s='Product comparison' d='Shop.Theme.Transformer'}</h1>
    {if isset($stcompare_products) && count($stcompare_products)}
    <div class="stcompare_table">
      <table class="table table-bordered table-striped text-2">
        <tbody>
            <tr>
                <th scope="row"><a href="javascript:;" class="stcompare_remove_all"><i class="fto-cancel-3"></i>{l s='Remove All' d='Shop.Theme.Transformer'}</a></th>
                {foreach $stcompare_products as $product}
                    <td class="stcompare_td_{$product.id_product}">
                        <a href="javascript:;" title="{l s='Remove' d='Shop.Theme.Transformer'}" class="remove_compare_product" data-id-product="{$product.id_product}"><i class="fto-cancel-3"></i>{l s='Remove' d='Shop.Theme.Transformer'}</a>
                    </td>
                {/foreach}
            </tr>
            {if $stcompare_items&1}
            <tr>
                <th scope="row"></th>
                {foreach $stcompare_products as $product}
                    <td class="stcompare_td_{$product.id_product} ajax_block_product">
                    <div class="pro_outer_box clearfix {$pro_image_type}">
                    <div class="pro_first_box {if $sttheme.flyout_buttons==3}hover_fly_vertical{/if} {if $sttheme.flyout_buttons==1}hover_fly_static{/if}{if $sttheme.flyout_buttons_on_mobile==1} moblie_flyout_buttons_show{/if}">
                        <a class="product_img_link" href="{$product.url}" title="{$product.name}">
                        <img src="{$product.cover.bySize.home_default.url}" {if $sttheme.retina && isset($product.cover.bySize.home_default_2x.url)} srcset="{$product.cover.bySize.home_default_2x.url} 2x" {/if} width="{$product.cover.bySize.home_default.width}" height="{$product.cover.bySize.home_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" />
                        </a>
             {if $stcompare_items&512}      
             {block name='product_flags'}
             {if !isset($product.ststickers)}{$product.ststickers=false}{/if}
             {include file='catalog/_partials/miniatures/sticker.tpl' stickers=$product.ststickers sticker_position=array(0,1,2,3,4,5,6,7,8,9,12) sticker_quantity=$product.quantity sticker_allow_oosp=$product.allow_oosp sticker_quantity_all_versions=$product.quantity_all_versions sticker_stock_text=$product.availability_message}
             {/block}
             {/if}
             
             {if $stcompare_items&2048}
             {if isset($wishlist_position) && $wishlist_position && $wishlist_position!=10}
             {include file='module:stwishlist/views/templates/hook/icon.tpl'}
             {/if}
             {/if}
             
             {if $stcompare_items&1024}  
             {if isset($loved_position) && $loved_position && $loved_position!=10 && $loved_position!=11}
             {include file='module:stlovedproduct/views/templates/hook/icon.tpl' id_source=$product.id_product}
             {/if}
             {/if}
     
             {if $stcompare_items&256}
             {if $sttheme.flyout_buttons==0 || $sttheme.flyout_buttons==1 || $sttheme.flyout_buttons==3}
             {include file='catalog/_partials/miniatures/hover_fly.tpl'}
             {/if}
             {/if}
             
             {if $stcompare_items&4096}
             {if isset($countdown_v_alignment) && $countdown_v_alignment!=2}{include file='catalog/_partials/miniatures/countdown.tpl'}{/if}
              {/if}
        
                        
                        </div>
                    </div>
                    </td>
                {/foreach}
            </tr>
            {/if}
            {if $stcompare_items&2}
            <tr>
                <th scope="row">{l s='Product' d='Shop.Theme.Transformer'}</th>
                {foreach $stcompare_products as $product}
                    <td class="stcompare_td_{$product.id_product}">
                        <h3 class="s_title_block"><a href="{$product.url}" title="{$product.name}">{$product.name}</a></h3>
                    </td>
                {/foreach}
            </tr>
            {/if}
            {if $stcompare_items&4}
            <tr>
                <th scope="row">{l s='Price' d='Shop.Theme.Transformer'}</th>
                {foreach $stcompare_products as $product}
                    <td class="stcompare_td_{$product.id_product}">
                        {*<span class="price">{$product.price}</span>
                        {if $product.has_discount}
                            <span class="regular-price">{$product.regular_price}</span>
                            {if $product.discount_type === 'percentage'}
                              <span class="discount-percentage">{$product.discount_percentage}</span>
                            {/if}
                        {/if}*}
                    
               
                <div class="product-price-and-shipping pad_b6" {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="offers" itemscope itemtype="http://schema.org/Offer" {/if}>
             {if $sttheme.google_rich_snippets}<link itemprop="availability" href="{if isset($product.seo_availability)}{$product.seo_availability}{else}https://schema.org/{if $product.availability=='unavailable'}OutOfStock{else}InStock{/if}{/if}"/>{/if}
             {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)}<meta  itemprop="url" content="{$product.url}" />
             <meta  itemprop="priceValidUntil" content="{if $product.specific_prices.to}{$product.specific_prices.to|date_format:'%d-%m-%Y'}{else}2029-07-09{/if}" />
             {/if}
  
            
            {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)}<meta itemprop="priceCurrency" content="{$sttheme.currency_iso_code}">{/if}

            {hook h='displayProductPriceBlock' product=$product type="before_price"}


            <span {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="price" content="{$product.price_amount}" {/if} class="price {if $product.has_discount}new_price_color{/if}">{if $prices_tag_from == 0}<span class="price_from">{if !empty($product.id_product_attribute)}{l s='Price from:' d='Shop.Theme.Transformer'}{else}{l s='Price:' d='Shop.Theme.Transformer'}{/if}</span>{elseif $prices_tag_from == 1}{l s='Price:' d='Shop.Theme.Transformer'}{elseif $prices_tag_from == 2 && !empty($product.id_product_attribute)}{l s='Price from:' d='Shop.Theme.Transformer'}{/if} {$product.price nofilter} {if $price_tax  == 0}<span class="name_price big">{$product.labels.tax_long}</span>{/if}</span>
 
            {hook h='displayProductPriceBlock' product=$product type="price"}
            {hook h='displayProductPriceBlock' product=$product type="after_price"}

            {if $product.has_discount}
              {hook h='displayProductPriceBlock' product=$product type="old_price"}

              <span class="regular-price">{$product.regular_price nofilter}</span>
            {/if}
            {block name='product_flags_price'}
                {if !isset($product.ststickers)}{$product.ststickers=false}{/if}
                {include file='catalog/_partials/miniatures/sticker.tpl' stickers=$product.ststickers sticker_position=array(13) sticker_quantity=$product.quantity sticker_allow_oosp=$product.allow_oosp sticker_quantity_all_versions=$product.quantity_all_versions sticker_stock_text=$product.availability_message}
            {/block}

            {hook h='displayProductPriceBlock' product=$product type='unit_price'}

            {hook h='displayProductPriceBlock' product=$product type='weight'}
            
             {if $two_prices == 0}<div>{$product.price_other nofilter} {if $price_tax  == 0}<span class="name_price small">{$product.labels.tax_long_other}</span>{/if}</div>{/if}
          
         
            {/foreach}
           
           
          </div>
          
          </td>
            </tr>
            {/if}
            {if $stcompare_items&8}
            <tr>
                <th scope="row">{l s='Rating' d='Shop.Theme.Transformer'}</th>
                {foreach $stcompare_products as $product}
                    <td class="stcompare_td_{$product.id_product}">
                        {if isset($product.stproductcomments) && $product.stproductcomments && !$product.stproductcomments.pro_posi}
                            {include file='catalog/_partials/miniatures/rating-box.tpl'}
                        {/if}
                        {*{hook h='displayProductListReviews' product=$product}*}
                    </td>
                {/foreach}
            </tr>
            {/if}
            {if $stcompare_items&16}
            <tr>
                <th scope="row">{l s='Short description' d='Shop.Theme.Transformer'}</th>
                {foreach $stcompare_products as $product}
                    <td class="stcompare_td_{$product.id_product}">
                        {$product.description_short nofilter}
                    </td>
                {/foreach}
            </tr>
            {/if}
            {if $stcompare_items&32}
            <tr>
                <th scope="row">{l s='Stock' d='Shop.Theme.Transformer'}</th>
                {foreach $stcompare_products as $product}
                    <td class="stcompare_td_{$product.id_product}">
                        {if $product.show_availability && $product.availability_message}{$product.availability_message}{/if}
                    </td>
                {/foreach}
            </tr>
            {/if}
            {if $stcompare_items&64}
            <tr>
                <th scope="row">{l s='Color' d='Shop.Theme.Transformer'}</th>
                {foreach $stcompare_products as $product}
                    <td class="stcompare_td_{$product.id_product}">
                        {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
                    </td>
                {/foreach}
            </tr>
            {/if}

            {if $stcompare_ordered_features}
                {foreach $stcompare_ordered_features as $feature}
                    <tr>
                        <th scope="row">
                            {$feature.name}
                        </th>
                        {foreach $stcompare_products as $product}
                            {assign var='product_id' value=$product.id_product}
                            {assign var='feature_id' value=$feature.id_feature}
                            {if isset($stcompare_product_features[$product_id])}
                                {assign var='tab' value=$stcompare_product_features[$product_id]}
                                <td class="stcompare_td_{$product.id_product}">{if (isset($tab[$feature_id]))}{implode(', ', $tab[$feature_id])}{/if}</td>
                            {else}
                                <td class="stcompare_td_{$product.id_product}"></td>
                            {/if}
                        {/foreach}
                    </tr>
                {/foreach}
            {else}
                <tr>
                    <th scope="row"></th>
                    <td colspan="{$stcompare_products|@count}" class="text-center">{l s='No features to compare' d='Shop.Theme.Transformer'}</td>
                </tr>
            {/if}
            {if $stcompare_items&128}
            <tr>
                <th scope="row"></th>
                {foreach $stcompare_products as $product}
                    <td class="stcompare_td_{$product.id_product}">
                        {if $sttheme.display_add_to_cart!=3 && !$sttheme.is_catalog && $product.add_to_cart_url && ($product.quantity>0 || $product.allow_oosp)}
                          {include file='catalog/_partials/miniatures/btn-add-to-cart.tpl' classname="btn btn-default"}
                        {else}
                          {include file='catalog/_partials/miniatures/btn-view-more.tpl' classname="btn btn-default"}
                        {/if}
                    </td>
                {/foreach}
            </tr>
            {/if}
        </tbody>
      </table>
    </div>
        <article class="alert alert-warning stcompare_no_products d-none" role="alert" data-alert="warning">
          {l s='There are no products selected for comparison.' d='Shop.Theme.Transformer'}
        </article>
    {else}
        <article class="alert alert-warning stcompare_no_products" role="alert" data-alert="warning">
          {l s='There are no products selected for comparison.' d='Shop.Theme.Transformer'}
        </article>
    {/if}
{/block}