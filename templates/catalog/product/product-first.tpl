<div class="product_page_container">
      <div class="product_left_column col-lg-7 mb-2 {foreach $product.images as $index => $image name=foo}{if $smarty.foreach.foo.last && $smarty.foreach.foo.iteration == 1}one-photo{/if}{/foreach}">
        <div class="left-sticky">        
        {block name='page_content_container'}
          <section class="product_left_content mb-2">
            {block name='page_content'}
                 {block name='product_cover_thumbnails'}
                {if $product.images && count($product.images)}
                  {include file='catalog/_partials/product-cover-thumbnails.tpl'}
                {else}
                  <img
                      src="{if isset($urls.no_picture_image)}{$urls.no_picture_image.bySize.{$sttheme.gallery_image_type}.url}{else}{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-{$sttheme.gallery_image_type}.jpg{/if}"
                      alt="{$product.name}"
                    />
                {/if}
              {/block}
           {/block}
          </section>
          {hook h='displayAfterProductThumbs'}
          {hook h='displayProductLeftColumn'}
          {foreach $product.extraContent as $extra}
          {if $extra.moduleName=='stvideo'}
          {include file="module:stvideo/views/templates/hook/stvideo.tpl" stvideos=$extra.content.videos video_position=array(13)}
          {/if}
          {/foreach}
        {/block}
        </div>
        </div>
        <div class="product_middle_column box-right col-lg-5 mb-3">
  

          {hook h='displayWeboProductButtons' productId=$product.id}
        <div class="product-above-heading">
          <div>
          </div>
          {hook h="displayStars" id_product=$product.id_product}
        </div>

        <h1 {if $sttheme.google_rich_snippets} itemprop="name" {/if} class="product_name">{block name='page_title'}{$product.name}{/block}</h1>

         <div class="product-top-price flex_container flex_center">
          <div class="flex_child">
          <div class="mar_b1 pro_price_block">
             {block name='product_prices'}
                {include file='catalog/_partials/product-prices.tpl'}
             {/block}
            </div>
            </div>
            </div>

            {block name='product_flags_under'}
            {foreach $product.extraContent as $extra}
            {if $extra.moduleName=='ststickers'}
                {include file='catalog/_partials/miniatures/sticker-product.tpl' stickers=$extra.content sticker_position=array(10,11,13) is_from_product_page=1}
            {/if}
            {/foreach}
           {hook h='displayUnderProductName'}
            {/block}
            
         <div class="product-information">

            {if $smarty.capture.feature_list_top}
              {*<p class="mb-2 label-text">{l s='Product features' d='Shop.Theme.Transformer'}</p>*}
              {$smarty.capture.feature_list_top nofilter}
            {/if}


            <div class="steasy_divider between_short_and_price"><div class="steasy_divider_item"></div></div>
             
            {if $product.is_customizable && count($product.customizations.fields)}
              {block name='product_customization'}
                {include file="catalog/_partials/product-customization.tpl" customizations=$product.customizations}
              {/block}
            {/if}
            
            {if !$sttheme.product_buy}{include file='catalog/_partials/product-buy.tpl'}{/if}
    
            {hook h='displayAskAboutProductCustom'}
            {hook h='displayReassurance'}
            {hook h='displayProductCenterColumn'}
            
            {block name='product_attachments'}
            {if $product.attachments}
            <section class="product-attachments">
            {foreach from=$product.attachments item=attachment}
             <div class="attachment">
               <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}" title="{l s='Download' d='Shop.Theme.Actions'} {$attachment.name}" rel="nofollow" class="mar_r6 font-weight-bold">{$attachment.name} - <span>{l s='Download' d='Shop.Theme.Actions'}</span> <i class="fto-angle-right"></i></a>
               {*<div class="flex_child mar_r6">{$attachment.description}</div>
               <a href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}" title="{l s='Download' d='Shop.Theme.Actions'}" rel="nofollow">
                 {l s='Download' d='Shop.Theme.Actions'} ({$attachment.file_size_formatted})
               </a>*}
             </div>
           {/foreach}
		          {hook h='DisplayWeboProductArchitectZone' productId=$product.id}
           </section>
           {/if}
           {/block}
            
            
            {foreach $product.extraContent as $extra}
              {if $extra.moduleName=='stvideo'}
                  {include file="module:stvideo/views/templates/hook/stvideo_link.tpl" stvideos=$extra.content video_position=array(14)}
              {/if}
            {/foreach}

           </div>
      </div>
</div>