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
	{if $id_customer|intval neq 0}
        {if !$id_st_wishlist}
    <h3 class="page_heading"><a class="backtoaccount" href="{$urls.pages.my_account}"><i class="fto-angle-double-left side_close_left"></i></a>{l s='My wishlists' d='Shop.Theme.Transformer'}</h3>
		<form method="post" class="m-b-1 form_wishlist">
            <div class="form-group form-group-small ">
                <label>{l s='Create a wishlist' d='Shop.Theme.Transformer'}</label>
                <div class="input-group">
                  <input
                          class="form-control wishlist_widget"
                          name="name"
                          type="text"
                          value="" />
                  <span class="input-group-btn">
                    <button
                      class="btn_send btn btn-default js-submit-active"
                      type="submit"
                      name="submitWishlist" 
                      id="submitWishlist"
                    >
                      <i class="fto-plus-2"></i>{l s='Create' d='Shop.Theme.Transformer'}
                    </button>
                  </span>
                </div>
            </div>
		</form>

        {if isset($wishlists) && count($wishlists)}
        <ul class="wishlist_list products product_list row grid mb-5">
        {foreach $wishlists AS $wishlist}
            <li class="wishlist_item product_list_item col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="wishlist_cover mar_b1">
                  <a href="{$link->getModuleLink('stwishlist', 'mywishlist', ['id_st_wishlist'=>$wishlist['id_st_wishlist']], true)}" title="{$wishlist['name']}">
                  {if isset($wishlist['cover']) && $wishlist['cover']}
                  <img src="{$wishlist['cover']['url']}" width="{$wishlist['cover']['width']}" height="{$wishlist['cover']['height']}" alt="{$wishlist['name']}" />
                  {else}
                  <img src="{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-home_default.jpg" width="{$sttheme.home_default.width}" height="{$sttheme.home_default.height}" alt="{$wishlist['name']}" />
                  {/if}
                 </a>
                 
                   <p class="remove_favorites"><a href="{$link->getModuleLink('stwishlist', 'mywishlist', ['delete'=>true,'id_st_wishlist'=>$wishlist['id_st_wishlist']], true)}" title="{l s='Delete wishlist' d='Shop.Theme.Transformer'}"><i class="fto-cancel"></i></a></p>{*use url function*}
             
                </div>
                <div class="wishlist_title_box flex_container">
                    <div class="wishlist_title mar_r6"><a href="{$link->getModuleLink('stwishlist', 'mywishlist', ['id_st_wishlist'=>$wishlist['id_st_wishlist']], true)}" title="{$wishlist['name']}">{$wishlist['name']}</a></div>
                    {*<div class="flex_child">({count($wishlist['products'])} {l s='pcs.' d='ShopThemeTransformer'})</div>*}
                     </div>
                     <p><a class="btn-line-under" href="{$link->getModuleLink('stwishlist', 'mywishlist', ['id_st_wishlist'=>$wishlist['id_st_wishlist']], true)}" title="{l s='See products' d='Shop.Theme.Transformer'}">{l s='See products' d='Shop.Theme.Transformer'}</a> <span>({count($wishlist['products'])})</span></p>
            </li>
        {/foreach}
        </ul>
        {/if}
        {else}
        {if isset($wishlists) && count($wishlists)}
		{foreach $wishlists AS $wishlist}
   	    <h3 class="page_heading">{l s='My wishlists' d='Shop.Theme.Transformer'}</h3>
        <!-- <p><a class="btn btn-default" href="{$link->getModuleLink('stwishlist', 'mywishlist', array(), true)}" title="{l s='Back to wishlists' d='Shop.Theme.Transformer'}">{l s='Back to wishlists' d='Shop.Theme.Transformer'}</a></p> -->
        <div class="account_box_bg">
        <div class="hello_info px-0 pb-3"> {l s='You are in the wish list' d='Shop.Theme.Transformer'}: <span>{$wishlist['name']}</span></div>
        <div class="article">
        <div class="flex_container m-b-1">
            <input type="text" name="wishlist_{$wishlist['id_st_wishlist']}" class="form-control flex_child wishlist_widget" size="60" value="{$link->getModuleLink('stwishlist', 'view', ['token'=>$wishlist['token']], true)}" />
            <a href="javascript:;" class="btn_send btn btn-default btn-spin copy_wishlist_link" title="{l s='Copy link' d='Shop.Theme.Transformer'}">{l s='Copy wish list link' d='Shop.Theme.Transformer'}</a>
        </div>
        <div class="form-group form-group-small ">
            <div class="mb-2 sendto"><b>{l s='Share with a friend' d='Shop.Theme.Transformer'}</b></div>
            <div class="input-group">
              <input class="form-control wishlist_widget" type="text" name="email" id="email_{$wishlist['id_st_wishlist']}" value="" size="40" placeholder="{l s='Email address' d='Shop.Theme.Transformer'}" />
              <span class="input-group-btn">
                <button
                  class="btn_send btn btn-default btn-spin wishlist_share_email"
                  type="button"
                  data-id-wishlist="{$wishlist['id_st_wishlist']}"
                >
                    <i class="fto-mail-alt mar_r4"></i>
                    {l s='Send' d='Shop.Theme.Transformer'}
                </button>
              </span>
            </div>
        </div>
        </div>
        </div>
        
        
        <h3 class="page_heading mt-4">{l s='Products' d='Shop.Theme.Transformer'}</h3>
        <ul class="products product_list row grid mb-5">
            {foreach $wishlist['products'] as $product}
            <div class="wishlist_product_item product_list_item ajax_block_product p-b-1 col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-4 col-6 {if !($product@index%2)} first-item-of-large-line  first-item-of-desktop-line first-item-of-line first-item-of-tablet-line {/if}" data-id_wishlist="{$product['wl_id_st_wishlist']}" data-id_product="{$product['wl_id_product']}" data-id_product_attribute="{if isset($product['wl_id_product_attribute']) && $product['wl_id_product_attribute']}{$product['wl_id_product_attribute']}{/if}">
            <div class="pro_outer_box clearfix home_default">
            
            
                <div class="pro_first_box">
                    <a class="product_image" href="{$product.url}" title="{$product.name}"><img src="{$product.cover.bySize.home_default.url}" {if $sttheme.retina && isset($product.cover.bySize.home_default_2x.url)} srcset="{$product.cover.bySize.home_default_2x.url} 2x" {/if} width="{$product.cover.bySize.home_default.width}" height="{$product.cover.bySize.home_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" /></a>
                {block name='product_flags'}
            {if !isset($product.ststickers)}{$product.ststickers=false}{/if}
            {include file='catalog/_partials/miniatures/sticker.tpl' stickers=$product.ststickers sticker_position=array(0,1,2,3,4,5,6,7,8,9,12) sticker_quantity=$product.quantity sticker_allow_oosp=$product.allow_oosp sticker_quantity_all_versions=$product.quantity_all_versions sticker_stock_text=$product.availability_message}
            {/block}
                 <p class="remove_favorites"><a href="javascript:;" title="{l s='Delete' d='Shop.Theme.Transformer'}" class="btn-spin wishlist_remove_product" rel="nofollow"><i class="fto-cancel mar_r4"></i></a></p>
                </div>
                <div class="pro_second_box pro_block_align_{$sttheme.pro_block_align}">
                
                 <div class="{if $sttheme.pro_block_align} flex_box flex_space_between {/if}">
      {block name='product_price_and_shipping'}
        {if (!isset($st_display_price) || $st_display_price) && $product.show_price}
          <div class="product-price-and-shipping pad_b6" {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="offers" itemscope itemtype="https://schema.org/Offer" {/if}>
            {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)}<meta itemprop="priceCurrency" content="{$sttheme.currency_iso_code}">{/if}

            {hook h='displayProductPriceBlock' product=$product type="before_price"}


            <span {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="price" content="{$product.price_amount}" {/if} class="price">{if $prices_tag_from == 0}<span class="price_from">{if !empty($product.id_product_attribute)}{l s='Price from:' d='Shop.Theme.Transformer'}{else}{l s='Price:' d='Shop.Theme.Transformer'}{/if}</span>{elseif $prices_tag_from == 1}{l s='Price:' d='Shop.Theme.Transformer'}{elseif $prices_tag_from == 2 && !empty($product.id_product_attribute)}{l s='Price from:' d='Shop.Theme.Transformer'}{/if} {$product.price nofilter} {if $price_tax  == 0}<span class="name_price big">{$product.labels.tax_long}</span>{/if}</span>
 
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
            
             {if $two_prices == 0}<p>{$product.price_other nofilter} {if $price_tax  == 0}<span class="name_price small">{$product.labels.tax_long_other}</span>{/if}</p>{/if}
          </div>
        {/if}
      {/block}
      
      </div>
                
                 {if $sttheme.pro_list_display_brand_name && $product.id_manufacturer && isset($product.manufacturer_name)}
        <div class="pro_list_manufacturer pad_b6"><a {if $sttheme.google_rich_snippets} itemprop="brand" itemscope="" itemtype="https://schema.org/Organization" {/if} class="btn-line-under" href="{$link->getManufacturerLink($product.id_manufacturer)}" title="{l s='Click here to see all products of this brand' d='Shop.Theme.Transformer'}: {$product.manufacturer_name|truncate:60:'...'}">{if $sttheme.pro_list_display_brand_name == 1}{$product.manufacturer_name|truncate:60:'...'}{elseif $sttheme.pro_list_display_brand_name == 2}<img src="{$link->getManufacturerImageLink($product.id_manufacturer, 'small_default')}" alt="{$product.manufacturer_name|escape:html:'UTF-8'}">{/if}</a></div>
       {/if}
                
                
                    <h3 class="s_title_block"><a href="{$product.url}" title="{$product.name}">{$product.name}</a></h3>
                    
                    {if isset($product['wl_attribute'])}
                   
                    {foreach $product['wl_attribute'] AS $attr}
                    <div class="small_cart_attr">
                          <li><span class="small_cart_attr_k">{$attr['group']}</span>:<span>{$attr['name']}</span></li>
                    </div>
                    {/foreach}
					
                    {/if}
                 
                    {if $sttheme.pro_display_category_name}<a href="{url entity='category' id=$product.id_category_default params=['alias' => $product.category]}" title="{$product.category_name}" class="mar_b6">{$product.category_name}</a>{/if}
      {if isset($product.stproductcomments) && $product.stproductcomments && !$product.stproductcomments.pro_posi}
        {include file='catalog/_partials/miniatures/rating-box.tpl'}
      {/if}
                    
                   {* <div class="mar_t1 mar_b1">
                        <div class="s_quantity_wanted qty_wrap">
                            <input
                                class="pro_quantity"
                                type="text"
                                value="{$product['wl_quantity']}"
                                name="quantity"
                              />
                        </div>
                        <a href="javascript:;" class="btn btn-default btn-spin wishlist_update_quantity" title="{l s='Save' d='Shop.Theme.Transformer'}"><i class="fto-ok-1 hidden mar_r4"></i>{l s='Save' d='Shop.Theme.Transformer'}</a>   
                    </div>*}
                    {*<a href="javascript:;" title="{l s='Delete' d='Shop.Theme.Transformer'}" class="btn-spin wishlist_remove_product" rel="nofollow"><i class="fto-cancel mar_r4"></i>{l s='Delete' d='Shop.Theme.Transformer'}</a>*}
                </div>
            
            </div>
            </div>
            {/foreach}
        </ul>
        {/foreach}
            <p><a class="btn btn-default" href="{$link->getModuleLink('stwishlist', 'mywishlist', array(), true)}" title="{l s='Back to wishlists' d='Shop.Theme.Transformer'}">{l s='Back to wishlists' d='Shop.Theme.Transformer'}</a></p>
        {/if}
      {/if}
	{/if}
{/block}