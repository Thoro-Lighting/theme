<div class="product-manufacturer pro_extra_info flex_container">
 <span class="pro_extra_info_label">{l s='Collection' d='Shop.Theme.Transformer'}:</span>
          <div class="pro_extra_info_content flex_child">
            <a {if $sttheme.google_rich_snippets} itemprop="brand" itemscope="" itemtype="https://schema.org/Organization" {/if} href="{$product_brand_url}" title="{l s='Click here to see all products of collection' d='Shop.Theme.Transformer'}: {$product_manufacturer->name}" target="_top" class="pro_extra_info_brand">
                <meta itemprop="name" content="{$product_manufacturer->name}" />
                 {$product_manufacturer->name}
             </a>
          </div>
</div>