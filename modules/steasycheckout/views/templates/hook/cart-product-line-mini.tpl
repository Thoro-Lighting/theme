{block name='small_cart_info'}
    <div class="small_cart_info steco_flex_child">
       <div class="steco_flex_container steco_flex_start">
       <div class=" steco_flex_child  flex_container flex_start">     
       <div class="col-lg-3 col-md-3 prod_img"><img decoding="async" class="steco_mr_r6" src="{$product.cover.bySize.modal_default.url}" width="{$product.cover.bySize.modal_default.width}" height="{$product.cover.bySize.modal_default.height}" alt="{$product.cover.legend}" title="{$product.cover.legend}" itemprop="image"></div>
       <div class="col-lg-9 col-md-9 right_zone_mobile">
       <div class="row">
       <div class="col-lg-12 col-md-12 line_left prod_name">
       <div title="{$product.name}" class="product-name">{$product.name}</div>
       {if count($product.attributes)}
       <div class="steco_pro_attr_box">
       {foreach from=$product.attributes item="property_value" key="property"}
       <div class="small_cart_attr_attr">
       <span class="small_cart_attr_k">{if $property}{$property}:{/if}</span> <span>{$property_value nofilter}</span>
       </div>
       {/foreach}
       </div>
       {/if}
       <div class="line_left quantity">
       {l s='Quantity' d='Shop.Theme.Transformer'}: {$product.quantity}
       </div>
       <div class="col-lg-12 col-md-12 cart_align_center line_left big_price">
       <div class="price steco_mr_r4">{if isset($product.is_gift) && $product.is_gift}{l s='Gift' d='Shop.Theme.Transformer'}{else}{$product.total nofilter} {if $price_tax_cart_products > 0}<span class="name_price">{$product.labels.tax_long}</span>{/if}{/if}</div>
       </div>
       </div>
       </div>
       </div>
       </div>
    </div>
{/block}