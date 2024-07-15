{assign var='recomended_producer' value=Configuration::get('ST_BRANDS_RECOMENDED_PRODUCER')}
{assign var='name_brand_featured' value=Configuration::get('ST_BRANDS_NAME_BRAND_FEATURED')}
{assign var='desc_brand_featured' value=Configuration::get('ST_BRANDS_DESC_BRAND_FEATURED')}
{assign var='position_buttons' value=Configuration::get('ST_BRANDS_POSITION_BUTTONS')}

{assign var='pro_per_rec_fw' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_FW')}
{assign var='pro_per_rec_xxl' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_XXL')}
{assign var='pro_per_rec_xl' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_XL')}
{assign var='pro_per_rec_lg' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_LG')}
{assign var='pro_per_rec_md' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_MD')}
{assign var='pro_per_rec_sm' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_SM')}
{assign var='pro_per_rec_xs' value=Configuration::get('STSN_BRANDS_PRO_PER_REC_XS')}

{if isset($brands) && count($brands)}
<div id="brands_slider_container_{$hook_hash}" class="brands_slider_container_page block products_container">
<section id="brands_slider_{$hook_hash}" class="brands_slider">
   <div class="row flex_lg_container flex_stretch ">
        <div class="col-lg-{if isset($custom_content) && $custom_content}{12-$custom_content.10.width-$custom_content.30.width}{else}12{/if} products_slider">
         <div class="block_content">
        <div class="swiper-container" {if $sttheme.is_rtl} dir="rtl" {/if}>
            <div class="row">
                {assign var='is_lazy' value=(isset($lazy_load) && $lazy_load)}
            	{foreach $brands as $brand}
                <div class="brands_static  col-fw-{(12/$pro_per_rec_fw)|replace:'.':'-'}  col-xxl-{(12/$pro_per_rec_xxl)|replace:'.':'-'}  col-xl-{(12/$pro_per_rec_xl)|replace:'.':'-'}   col-lg-{(12/$pro_per_rec_lg)|replace:'.':'-'}   col-md-{(12/$pro_per_rec_md)|replace:'.':'-'}   col-sm-{(12/$pro_per_rec_sm)|replace:'.':'-'}   col-{(12/$pro_per_rec_xs)|replace:'.':'-'}">
                    <div class="pro_outer_box">
                	<a href="{$brand.url}" title="{$brand.name}" class="brands_slider_item product_img_link {if $is_lazy} is_lazy {/if}">
                        <img 
                        {if $is_lazy}data-src{else}src{/if}="{$brand.image}"
                        {if $sttheme.retina && $brand.image_2x}
                          {if $is_lazy}data-srcset{else}srcset{/if}="{$brand.image_2x} 2x"
                        {/if}
                         alt="{$brand.name}" width="{$manufacturerSize.width}" height="{$manufacturerSize.height}" class="{if $is_lazy} swiper-lazy {/if} front-image" />
                    </a>
                      <div class="pro_second_box">
                        <h3 class="s_title_block "><a class="" href="{$brand.url}" title="{$brand.name}"><span class="btn-line">{l s='Collection' d='Shop.Theme.Transformer'} {$brand.name}</span></a></h3>
                        <div class="product-desc-brand">{$brand.description|strip_tags:'UTF-8'|truncate:10000:'...'}</div>
                         <a href="{$brand.url}" class="go" title="{l s='View products' d='Shop.Theme.Actions'}">{l s='View products' d='Shop.Theme.Actions'}</a>
    
                        </div>
                    </div>
                </div>
                {/foreach}
            </div>
           </div>
    </div>
</div>
</div>
</section>
</div>
{/if}