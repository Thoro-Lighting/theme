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
{extends file='customer/page.tpl'}
{block name="page_content"}
{foreach $errors AS $error}
<div class="alert">
{$error}
</div>
{/foreach}
	{if $id_customer|intval neq 0}
        {if isset($products) && count($products)}
        <h3 class="page_heading">{l s='My loved products' d='Shop.Theme.Transformer'}</h3>
        <div class="products product_list row grid mb-5">
            {foreach $products as $product}
            <div class="product_list_item loved_product_item p-b-1 col-xxl-4 col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12  {if !$sttheme.is_mobile_device}{if (((!isset($for_w) || (isset($for_w) && $for_w != 'category')) && $sttheme.pro_tm_slider==3) || (isset($for_w) && $for_w == 'category' && $sttheme.pro_tm_slider_cate==3)) && isset($product.stthemeeditor.images) OR ((!isset($for_w) || (isset($for_w) && $for_w != 'category')) && $sttheme.att_presentation==1 && $product.id_product_attribute > 0) || (isset($for_w) && $for_w == 'category' && $sttheme.att_presentation_cat==1 && $product.id_product_attribute > 0)}show_data_1{/if}{/if}" data-id_source="{$product['id_product']}" data-type="1">
            <article class="{if !isset($for_w)} swiper-slide {/if} ajax_block_product js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" data-minimal-quantity="{$product.minimal_quantity}" {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} {if isset($from_product_page) && $from_product_page} itemprop="{$from_product_page}" {/if} itemscope itemtype="http://schema.org/Product" {/if}>
           
            <div class="pro_outer_box clearfix medium_default">
            <div class="pro_first_box {if $sttheme.flyout_buttons==3}hover_fly_vertical{/if} {if $sttheme.flyout_buttons==1}hover_fly_static{/if}{if $sttheme.flyout_buttons_on_mobile==1} moblie_flyout_buttons_show{/if}">
             <a class="product_image" href="{$product.url}" title="{$product.name}"><img src="{$product.cover.bySize.medium_default.url}" {if $sttheme.retina && isset($product.cover.bySize.home_default_2x.url)} srcset="{$product.cover.bySize.home_default_2x.url} 2x" {/if} width="{$product.cover.bySize.medium_default.width}" height="{$product.cover.bySize.medium_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" />
             {block name='product_flags'}
            {if !isset($product.ststickers)}{$product.ststickers=false}{/if}
            {include file='catalog/_partials/miniatures/sticker-frame.tpl' stickers=$product.ststickers sticker_position=array(0,1,2,3,4,5,6,7,8,9,12) sticker_quantity=$product.quantity sticker_allow_oosp=$product.allow_oosp sticker_quantity_all_versions=$product.quantity_all_versions sticker_stock_text=$product.availability_message}
          {/block}</a>
                
         <p class="remove_favorites"><a href="javascript:;" title="{l s='Remove from favorites' d='Shop.Theme.Transformer'}" class="btn-spin loved_remove_product" rel="nofollow"><i class="fto-cancel mar_r4"></i></a></p>
        </div>
           <div class="pro_second_box pro_block_align_1">
       <div class="flex_box flex_start mini_name">
      {block name='product_name'}
      <h3 {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="name" {/if} class="s_title_block flex_child two_rows"><a href="{$product.url}" title="{$product.name}" >{$product.name}</a></h3>
      {/block}
      
      {block name='product_price_and_shipping'}
       {assign var='prices_tag_from' value=Configuration::get('STSN_PRICES_TAG_FROM')}
       {assign var='price_tax' value=Configuration::get('STSN_PRICE_TAX')}
       {assign var='two_prices' value=Configuration::get('STSN_TWO_PRICES')}
        {if (!isset($st_display_price) || $st_display_price) && $product.show_price}
          <div class="product-price-and-shipping" {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="offers" itemscope itemtype="http://schema.org/Offer" {/if}>
             {if $sttheme.google_rich_snippets}<link itemprop="availability" href="{if isset($product.seo_availability)}{$product.seo_availability}{else}https://schema.org/{if $product.availability=='unavailable'}OutOfStock{else}InStock{/if}{/if}"/>{/if}
             {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)}<meta  itemprop="url" content="{$product.url}" />
             <meta  itemprop="priceValidUntil" content="{if $product.specific_prices.to}{$product.specific_prices.to|date_format:'%d-%m-%Y'}{else}2029-07-09{/if}" />
             {/if}
  
            {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)}<meta itemprop="priceCurrency" content="{$sttheme.currency_iso_code}">{/if}
            {hook h='displayProductPriceBlock' product=$product type="before_price"}
            <span {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="price" content="{$product.price_amount}" {/if} class="price {if $product.has_discount}new_price_color{/if}">{$product.price nofilter}</span>
            {hook h='displayProductPriceBlock' product=$product type="price"}
            {hook h='displayProductPriceBlock' product=$product type="after_price"}
            {if $product.has_discount}
            {hook h='displayProductPriceBlock' product=$product type="old_price"}
            <p class="discount discount-percentage"><span class="regular-price">{$product.regular_price nofilter}</span></p>
            {/if}
            {hook h='displayProductPriceBlock' product=$product type='unit_price'}
            {hook h='displayProductPriceBlock' product=$product type='weight'}
            </div>
        {/if}
      {/block}
     
     </div> 

     <div class="act_box_cart flex_container flex_center display_when_hover add_hide_on_mobile">
           <div class="pro_list_manufacturer flex_child"><a {if $sttheme.google_rich_snippets} itemprop="brand" itemscope="" itemtype="https://schema.org/Organization" {/if} href="{$link->getManufacturerLink($product.id_manufacturer)}" title="{l s='Collection' d='Shop.Theme.Transformer'}: {$product.manufacturer_name|truncate:60:'...'}">{l s='Collection' d='Shop.Theme.Transformer'}: {$product.manufacturer_name|escape:html:'UTF-8'}</a></div>
            {include file='catalog/_partials/miniatures/btn-view-more-bottom.tpl' classname=$add_to_cart_class}
       </div>
       </div>

    </div>
                

</article>
</div>
            {/foreach}
        </div>
        {/if}
        {if isset($blogs) && count($blogs)}
        <h3 class="page_heading">{l s='My loved articles' d='Shop.Theme.Transformer'}</h3>
        <ul class="com_grid_view row best_articles">
            {foreach $blogs as $blog}
            <li class="loved_product_item m-b-2 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 {if !($blog@index%2)} first-item-of-large-line  first-item-of-desktop-line first-item-of-line first-item-of-tablet-line {/if}" data-id_source="{$blog['id_st_blog']}" data-type="2">
            <div class="pro_simple_box clearfix row">
                <div class="col-sm-5 col-md-4 img_article px-0">
                    <a class="product_image" href="{$blog.link}" title="{$blog.name}"><img src="{$blog.cover.links.home.image}" width="{$blog.cover.links.home.width}" height="{$blog.cover.links.home.height}" alt="{$blog.name}" /></a>
                	<p class="remove_favorites"><a href="javascript:;" title="{l s='Delete' d='Shop.Theme.Transformer'}" class="btn-spin loved_remove_product" rel="nofollow"><i class="fto-cancel"></i><!--{l s='Remove from favorites' d='Shop.Theme.Transformer'} --></a></p>
                </div>
                <div class="col-sm-7 col-md-8 block_blog">
					<span class="date-add">{dateFormat date=$blog.date_add full=0}</span>
                    <h3 class="s_title_block"><a href="{$blog.link}" title="{$blog.name}">{$blog.name|escape:'htmlall':'UTF-8'|truncate:70:'...'}</a></h3>   
                    <div class="blok_blog_short_content fs_md pad_b6">{$blog.content_short|strip_tags:'UTF-8'|truncate:160:'...'}</div>
                    <a class="btn-line-under" href="{$blog.link}" title="{l s='more' d='Shop.Theme.Transformer'}" >{l s='more' d='Shop.Theme.Transformer'}</a>
                    <!-- <span><i class="icon-eye-2 icon-mar-lr2"></i>{$blog.counter}</span> --> 
                </div>
            </div>
            </li>
            {/foreach}
        </ul>
        {/if}
        {if !isset($blogs) && !isset($products)}
        <h3 class="page_heading">{l s='My loved products and articles' d='Shop.Theme.Transformer'}</h3>
        <article class="alert alert-warning" role="alert" data-alert="warning">
        {l s='You haven\'t loved yet.' d='Shop.Theme.Transformer'}</article>
        {/if}
	{/if}
{/block}