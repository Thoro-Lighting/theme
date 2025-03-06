{block name='product_miniature_item'}
{*shouldEnableAddToCartButton Also in catalog\_partials\miniatures\product-simple.tpl*}
{assign var="has_add_to_cart" value=0}
{if $sttheme.display_add_to_cart!=3 && !$sttheme.is_catalog && $product.add_to_cart_url && ($product.quantity>0 || $product.allow_oosp)}{$has_add_to_cart=1}{/if}{*hao xiang quantity_wanted is not set in homepage and category page, so using add_to_cart_url only is not correct, have to use quantity and allow_oosp*}

{assign var='list_display_sd' value=0}
{if isset($display_sd) && $display_sd}{$list_display_sd=$display_sd}{elseif !isset($display_sd) && $sttheme.show_short_desc_on_grid}{$list_display_sd=$sttheme.show_short_desc_on_grid}{/if}

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

{assign var='is_lazy' value=(!isset($for_w) && isset($lazy_load) && $lazy_load) || (isset($for_w) && $for_w == 'category' && $sttheme.cate_pro_lazy)}

{*use for_w to check if this file is loaded by product sliders, only products in sliders do not have for_w.*}
<article class="{if !isset($for_w)} swiper-slide {/if} ajax_block_product js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" data-minimal-quantity="{$product.minimal_quantity}" {*{if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} {if isset($from_product_page) && $from_product_page} itemprop="{$from_product_page}" {/if} itemscope itemtype="http://schema.org/Product" {/if}*}>
  
 {if ($sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)) && $product.reference}<meta itemprop="sku" content = "{$product.reference}">{/if}
  
 <div class="pro_outer_box clearfix {$pro_image_type}">
    <div class="pro_first_box {if $sttheme.flyout_buttons==3}hover_fly_vertical{/if} {if $sttheme.flyout_buttons==1}hover_fly_static{/if}{if $sttheme.flyout_buttons_on_mobile==1} moblie_flyout_buttons_show{/if}">
      {block name='product_thumbnail'}
        {if !isset($for_w) && !$sttheme.pro_tm_slider && isset($lazy_load) && $lazy_load}<i class="swiper-lazy-preloader fto-spin5 animate-spin"></i>{/if}
        {if (((!isset($for_w) || (isset($for_w) && $for_w != 'category')) && $sttheme.pro_tm_slider) || (isset($for_w) && $for_w == 'category' && $sttheme.pro_tm_slider_cate)) && isset($product.stthemeeditor.images)}
            {include file='catalog/_partials/miniatures/tm-slider.tpl' tm_thumbs=0 tm_lazyload=$is_lazy tm_cover=$product.cover.id_image}
        {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)}<meta  itemprop="image" content="{if isset($product.cover.bySize.{$pro_image_type}.url) && $product.cover.bySize.{$pro_image_type}.url}{$product.cover.bySize.{$pro_image_type}.url}{elseif isset($urls.no_picture_image)}{$urls.no_picture_image.bySize.{$pro_image_type}.url}{else}{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-{$pro_image_type}.jpg{/if}" />{/if}
            
        
        {else}
          
          <a href="{$product.url}" title="{$product.name}" class="product_img_link {if $is_lazy} is_lazy {/if} {if $sttheme.pro_img_hover_scale} pro_img_hover_scale {/if}">
            <img 
            {if $is_lazy}data-src{else}src{/if}="{if isset($product.cover.bySize.{$pro_image_type}.url) && $product.cover.bySize.{$pro_image_type}.url}{$product.cover.bySize.{$pro_image_type}.url}{elseif isset($urls.no_picture_image)}{$urls.no_picture_image.bySize.{$pro_image_type}.url}{else}{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-{$pro_image_type}.jpg{/if}"
            {if $sttheme.retina && isset($product.cover.bySize.{$pro_image_type_retina}.url)}
              {if $is_lazy}data-srcset{else}srcset{/if}="{$product.cover.bySize.{$pro_image_type_retina}.url} 2x"
            {/if}
            width="{$product.cover.bySize.{$pro_image_type}.width}" height="{$product.cover.bySize.{$pro_image_type}.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" class="front-image {if !isset($for_w) && isset($lazy_load) && $lazy_load} swiper-lazy {/if} {if isset($for_w) && $for_w == 'category' && $sttheme.cate_pro_lazy} cate_pro_lazy {/if}" {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="image" {/if} />
            {if $is_lazy && ({$sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} )}<meta  itemprop="image" content="{if isset($product.cover.bySize.{$pro_image_type}.url) && $product.cover.bySize.{$pro_image_type}.url}{$product.cover.bySize.{$pro_image_type}.url}{elseif isset($urls.no_picture_image)}{$urls.no_picture_image.bySize.{$pro_image_type}.url}{else}{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-{$pro_image_type}.jpg{/if}" />{/if}
            {if isset($product.sthoverimage.hover)}
              {*to do lazy load this*}
              <img 
                {if $is_lazy}data-src{else}src{/if}="{$product.sthoverimage.bySize.{$pro_image_type}.url}"
                {if $sttheme.retina && isset($product.sthoverimage.bySize.{$pro_image_type_retina}.url)}
                  {if $is_lazy}data-srcset{else}srcset{/if}="{$product.sthoverimage.bySize.{$pro_image_type_retina}.url} 2x"
                {/if}
                
               alt="{if !empty($product.sthoverimage.legend)}{$product.sthoverimage.legend}{else}{$product.name}{/if}" width="{$product.sthoverimage.bySize.{$pro_image_type}.width}" height="{$product.sthoverimage.bySize.{$pro_image_type}.height}"  class="back-image {if !isset($for_w) && isset($lazy_load) && $lazy_load} swiper-lazy {/if} {if isset($for_w) && $for_w == 'category' && $sttheme.cate_pro_lazy} cate_pro_lazy {/if}" />
            {/if}
            {if $is_lazy}<img src="{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-{$pro_image_type}.jpg" class="holder" width="{$product.cover.bySize.{$pro_image_type}.width}" height="{$product.cover.bySize.{$pro_image_type}.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" />{/if}
          {block name='product_flags'}
            {if !isset($product.ststickers)}{$product.ststickers=false}{/if}
            {include file='catalog/_partials/miniatures/sticker-frame.tpl' stickers=$product.ststickers sticker_position=array(0,1,2,3,4,5,6,7,8,9,12) sticker_quantity=$product.quantity sticker_allow_oosp=$product.allow_oosp sticker_quantity_all_versions=$product.quantity_all_versions sticker_stock_text=$product.availability_message}
          {/block}
          
          </a>
        {/if}
       
       
        {if isset($loved_position) && $loved_position && $loved_position!=10 && $loved_position!=11}
            {include file='module:stlovedproduct/views/templates/hook/icon.tpl' id_source=$product.id_product}
        {/if}
      {/block}
      {if $sttheme.flyout_buttons==0 || $sttheme.flyout_buttons==1 || $sttheme.flyout_buttons==3}
        {include file='catalog/_partials/miniatures/hover_fly.tpl'}
      {/if}
      
    </div>
    <div class="pro_second_box pro_block_align_1">
    
      <div class="act_box_cart flex_container flex_center">
        {if $product.id_manufacturer && isset($product.manufacturer_name)}
          <div class="pro_list_manufacturer flex_child">
            <a {if $sttheme.google_rich_snippets} itemprop="brand" itemscope=""
              itemtype="https://schema.org/Organization" {/if} href="{$link->getManufacturerLink($product.id_manufacturer)}"
              title="{l s='Collection' d='Shop.Theme.Transformer'}: {$product.manufacturer_name|truncate:60:'...'}">
              {$product.manufacturer_name|escape:html:'UTF-8'}
            </a>
          </div>

        {/if}
        {assign var="add_to_cart_class" value="btn btn-default"}
      </div>

       <div class="flex_box flex_start mini_name">
      {block name='product_name'}

      <h3 {if $sttheme.google_rich_snippets && (!isset($no_google_rich_snippets) || !$no_google_rich_snippets)} itemprop="name" {/if} class="s_title_block flex_child two_rows">
        <a href="{$product.url}" title="{$product.manufacturer_name|escape:html:'UTF-8'}" >
          {$product.manufacturer_name|escape:html:'UTF-8'}
        </a>
      </h3>
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
      {*{hook h="displayStars" id_product=$product.id_product}*}

    </div>
   </div>
</article>
{/block}